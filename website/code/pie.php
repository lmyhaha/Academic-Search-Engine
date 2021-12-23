<script>
    console.log("hahah"); 
   var option={
            backgroundColor: '#ccccff',    //RGB
            textStyle: {
                        color: 'rgba(0, 0, 0, 0.3)'
                    },
            tooltip: {
            trigger: 'item'},

            //color: ['#0a00dd','#2f00ff', '#ffa0a8', '#04ffe2', '#f0c7ae','#74ef0f',  '#ca86ff', '#bda2ff','#6e70ff', '#54ff70', '#c4ccd3'],//全局调色盘

            series : [
                {
                    name: "hh",
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
        }
</script>