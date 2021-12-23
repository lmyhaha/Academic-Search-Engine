<?php 
     $ch = curl_init();
    $timeout = 5;
    $url = "http://localhost:8983/solr/lab2/select?indent=on&q=PaperID:".$paper_id."&wt=json"."&rows=99999"."&start=0";
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $result1 = json_decode(curl_exec($ch), true);

    $data=[0,0,0,0,0,0,0];
    $value=$result1['response']['docs'][0];  //仅一篇

            $data[1]=$value['Year'];    //年份新
            $data[2]=count($value['AuthorID']); //作者数量
            if(@$value['ReferenceID'])
            {
                $data[0]=count($value['ReferenceID']); //参考文献多
                $data[3]=count(array_unique($value['ReferenceConference']));  //参考文献会议数
                $data[4]=array_sum($value['ReferenceYear'])/count($value['ReferenceYear']);  //参考文献平均年份
            }
        $url = "http://localhost:8983/solr/lab2/select?indent=on&q=ReferenceID:".$paper_id."&wt=json"."&rows=99999";
        curl_setopt ($ch, CURLOPT_URL, $url);
        $result2 = json_decode(curl_exec($ch), true);
        $j=0;foreach ($result2['response']['docs'] as $k)  ++$j;
        $data[5]=$j;//被引用数


     $url = "http://localhost:8983/solr/lab2/select?indent=on&q=AuthorID:".$value['AuthorID'][0]."&wt=json"."&rows=99999";
        curl_setopt ($ch, CURLOPT_URL, $url);
        $result3= json_decode(curl_exec($ch), true);
        
        $j=0;foreach ($result3['response']['docs'] as $k)  ++$j;
        $data[6]=$j;//第一作者产量
        
        
        curl_close($ch);

?>


<script src="echarts.min.js"></script>
<script> var myChartC = echarts.init(document.getElementById('main3'),'light');

<?php  
        $title=$result1['response']['docs'][0]['Title'];
        echo "var title ='Title:'+'$title';"; //js里面不能出现php数组中括号
       echo "var data=Array();";
    
        foreach ($data as $key => $value) 
           echo "data[$key]=$value;";
        
?>

option = {
    title: {
        text: 'Comprehensive Assessment'
    },
    tooltip: {trigger: 'axis'},
    legend: {
        x: 'center',
        y: 20,
        data:[title]
    },
    radar: [
        {
            
            startAngle: 90,  //坐标轴位置
            splitNumber: 5,  //雷达圈数
            shape: 'circle', //图的形状
            
            indicator: [
                {text: 'Number of References',max:100,min:0},
                {text: 'Year',max:2020,min:1950},
                {text: 'Number of Authors',max:5,min:0},
                {text: 'Confernces of References',max:5,min:0},
                {text: 'Average Year of References',max:2020,min:1990},
                {text: 'Citations',max:20,min:0},
                {text: 'Production of the 1st Author',max:15,min:0}
            ],
            center: ['50%','50%'],
            radius: 80,
            name: {
                //formatter:'[{value}]',
                textStyle: {
                    color:'#7200f1'
                }
            },
            splitArea: { //各圈颜色
                areaStyle: {
                    color: ['rgba(4, 102, 209, 0.2)',
                    'rgba(14, 222, 129, 0.4)', 'rgba(214, 222, 29, 0.5)',
                    'rgba(14, 222, 129, 0.6)', 'rgba(214, 222, 29, 0.7)'],
                    shadowColor: 'rgba(0, 0, 0, 0.3)',
                    shadowBlur: 10
                }
            }
        }
    ],
    series: [
        {
            type: 'radar',
             tooltip: {
                trigger: 'item'
            },
            itemStyle: {normal: {areaStyle: {type: 'default'}}},
            data: [
                {
                    value: data,
                    name: title
                }
            ]
        }
    ]
};

    myChartC.setOption(option);</script>
   