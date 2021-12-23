<?php 
    
  $data=[];
    foreach ($result1['response']['docs'] as $value) {
       // var_dump('$value['ConferenceName'][0]');echo "<br>";
        if(@$data[$value['ConferenceName']])
                ++$data[$value['ConferenceName']];
            else
                $data[$value['ConferenceName']]=1;  //由于该字段支持多值，所以还要一个下标0
        
        }
    // var_dump($data);echo "<br>";
    $maxvalue=0;
    $data2=[];
    class doc
    {
    	public $value;
    	public $name;
    }
    foreach ($data as $key => $value) {
    	$gz=new doc();
    	$gz->value=$value;
    	$gz->name=$key;
    	$data2[]=$gz;
        if($value>$maxvalue)
            $maxvalue=$value;
    }
    $data2=json_encode($data2);


    $data3=[];  //用于雷达图的indicator,由于雷达图的数据封装格式为[{ value:[1,2,3],name:'xxx' }],类似于柱状图，不能这样用
    class doc3
    {
        public $test;
        public $max;
    }
    foreach ($data as $key => $value) {
        $gz=new doc3();
        $gz->max=$maxvalue;
        $gz->text=$key;
        $data3[]=$gz;
    }
    $data3=json_encode($data3);
?>

<script src="echarts.min.js"></script>
<script> var myChartB = echarts.init(document.getElementById('main2'),'light');
var option={
          //  backgroundColor: '#ccccff',    //RGB
            textStyle: {
                        color: 'rgba(0, 0, 0, 0.3)'
                    },
            tooltip: {
            trigger: 'item'},
            title:{
        text: 'Conference - number of papers pie gram',
        subtext: ''
        },
            //color: ['#0a00dd','#2f00ff', '#ffa0a8', '#04ffe2', '#f0c7ae','#74ef0f',  '#ca86ff', '#bda2ff','#6e70ff', '#54ff70', '#c4ccd3'],//全局调色盘

            series : [
                {
                    name: "",
                    type: 'pie',           //图表类型
                    radius: ['45%','70%'], //这里设置环状图的形状
                    data:<?php echo "$data2"?>,
                    center:["45%","60%"],
                    //roseType: 'angle',
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 200,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    },
                    label: {
                        normal: {
                            textStyle: {
                                color: 'rgba(255, 0, 0, 0.3)'   //标签颜色在此处
                            },
                        },
                        emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '30',
                        fontWeight: 'bold'
                        }
                        }
                    },


                    labelLine: {
                        normal: {
                            lineStyle: {
                                color: 'rgba(255, 255, 255, 0.3)' //标签线颜色
                            }
                        }
                    }

                }
            ]
        };
    myChartB.setOption(option);</script>
   