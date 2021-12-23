<?php 
    
    $data=[];
    foreach ($result1['response']['docs'] as $val) {
        //var_dump($value1['AuthorName']);echo"<br>";   
        foreach ($val['AuthorName'] as $value) {
    
            if(@$data[$value])
                ++$data[$value];
            else
                $data[$value]=1;
        }
    }
    arsort($data);
    //foreach ($data as $key => $value)  echo "$key &nbsp $value <br>";
?>

<script src="echarts.min.js"></script>
<script>var myChartC = echarts.init(document.getElementById('main3'),'light');
<?php 
            //echo "console.log('555'); ";
            echo "var dataAxis =Array();";
            echo "var data=Array();";
            //echo "console.log(data);console.log(dataAxis);";

            $i=0;
            foreach ($data as $key => $value) {
               echo "dataAxis[$i]='$key';data[$i]=$value;"; //字符串$key要加单引号！
               $i++;
               if($i>9)
                    break;
            }
        ?>


option = {
    title:{
        text: 'Productive Authors Top 10',
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
 myChartC.setOption(option);</script>

