<?php 
    $ch = curl_init();
    $timeout = 5;
    $url = "http://localhost:8983/solr/lab2/select?indent=on&q=AuthorName:".$author1."&wt=json"."&rows=99999"."&start=0";
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $result1 = json_decode(curl_exec($ch), true);
    curl_close($ch);

    $data=[];
    foreach ($result1['response']['docs'] as $value) {
            if(@$data[$value['Year']])
                ++$data[$value['Year']];
            else
                $data[$value['Year']]=1;
    }
    ksort($data);
?>
<script src="echarts.min.js"></script>
<script>var myChartA = echarts.init(document.getElementById('main1'),'light');
        <?php 
            echo "var dataAxis =Array();";
            echo "var data=Array();";
            $i=0;
            foreach ($data as $key => $value) {
               echo "dataAxis[$i]=$key;data[$i]=$value;";
               $i++;
            }
        ?>
                 for (var i =0; i<data.length; i++) 
                        console.log(data[i],"\n");
       var yMax = 500;
        var dataShadow = [];

for (var i = 0; i < data.length; i++) {
    dataShadow.push(yMax);
}
option = {
    
    title:{
        text: 'Publishyear - number of papers diagram',
        subtext: ''},    
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    xAxis: {
        data: dataAxis,
        axisLabel: {
            inside: false,
            textStyle: {
                color: '#00ff00'
            }
        },
        axisTick: {
            show: false,
            alignWithLabel: true
        },
        axisLine: {
            show: false
        },
        z: 10
    },
    yAxis: {
        axisLine: {
            show: false
        },
        axisTick: {
            show: false
        },
        axisLabel: {
            textStyle: {
                color: '#999'
            }
        }
    },
    dataZoom: [
        {
            type: 'inside'
        }
    ],
    
    series: [
        /*{ // For shadow
            type: 'bar',
            itemStyle: {
                normal: {color: 'rgba(0,0,0,0.05)'}
            },
            barGap:'-100%',
            barCategoryGap:'40%',
            data: dataShadow,
            animation: false
        },*/
        {
            type: 'bar',
            itemStyle: {
                normal: {
                    color: new echarts.graphic.LinearGradient(
                        0, 0, 0, 1,
                        [
                            {offset: 0, color: '#83bff6'},
                            {offset: 0.5, color: '#188df0'},
                            {offset: 1, color: '#188df0'}
                        ]
                    )
                },
                emphasis: {
                    color: new echarts.graphic.LinearGradient(
                        0, 0, 0, 1,
                        [
                            {offset: 0, color: '#2378f7'},
                            {offset: 0.7, color: '#2378f7'},
                            {offset: 1, color: '#83bff6'}
                        ]
                    )
                }
            },
            data: data
        }
    ]
};    
myChartA.setOption(option);</script>

