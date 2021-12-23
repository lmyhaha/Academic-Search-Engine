<?php 
    $data=[];
    foreach ($result1['response']['docs'] as $value) {
            foreach ($value['ReferenceConference'] as $year) {
            if(@$data[$year])
                ++$data[$year];
            else
                $data[$year]=1;
            }
    }

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
    }
    $data2=json_encode($data2);
?>


<script src="echarts.min.js"></script>
<script> var myChartB = echarts.init(document.getElementById('main2'),'light');

var option={
            //backgroundColor: '#ccccff',    //RGB
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
   