<?php 
use yii\helpers\Json;
$this->title = '全局统计';
?>
<h3 class="blank1">全局统计</h3>
<div class="graph_box">
	<div class="col-md-6 grid_2">
		<div class="grid_1">
			<h4>产品统计</h4>
			<div id="product" style="width: 100%; height: 500px;"></div>
			<?php $name_json = Json::encode(array_column($prodProp, 'name'))?>
			<script>
		    var myProduct = echarts.init(document.getElementById('product'));
		    
			option = {
				    title : {
				        text: '',
				        subtext: '',
				        x:'center'
				    },
				    tooltip : {
				        trigger: 'item',
				        formatter: "{a} <br/>{b} : {c} ({d}%)"
				    },
				    legend: {
				        orient: 'vertical',
				        left: 'left',
				        data: <?= $name_json ?>
				    },
				    series : [
				        {
				            name: '产品分布',
				            type: 'pie',
				            radius : '55%',
				            center: ['50%', '60%'],
				            data:<?= Json::encode($prodProp) ?>,
				            itemStyle: {
				                emphasis: {
				                    shadowBlur: 10,
				                    shadowOffsetX: 0,
				                    shadowColor: 'rgba(0, 0, 0, 0.5)'
				                }
				            }
				        }
				    ]
			    };

		    myProduct.setOption(option);
			</script>
		</div>
	</div>
	<div class="col-md-6 grid_2">
		<div class="grid_1">
			<h4></h4>
			
		</div>
	</div>
	<div class="clearfix"> </div>
</div>
<div class="graph_box1" style="height: 700px;">
	<div class="col-md-6 grid_2 grid_2_bot">
		<div class="grid_1">
			<h4>按月出入款统计</h4>
			<div id="everyInOut" style="width: 100%; height: 500px;"></div>
            <script>
            var everyInOut = echarts.init(document.getElementById('everyInOut'));
            
            option = {
            	    title : {
            	        text: '',
            	        subtext: ''
            	    },
            	    tooltip : {
            	        trigger: 'axis'
            	    },
            	    legend: {
            	        data:['兑付','进账']
            	    },
            	    toolbox: {
            	        show : true,
            	        feature : {
            	            dataView : {show: true, readOnly: false},
            	            magicType : {show: true, type: ['line', 'bar']},
            	            restore : {show: true},
            	            saveAsImage : {show: true}
            	        }
            	    },
            	    calculable : true,
            	    xAxis : [
            	        {
            	            type : 'category',
            	            data : <?= Json::encode(array_keys($paySumByMonth)) ?>
            	        }
            	    ],
            	    yAxis : [
            	        {
            	            type : 'value'
            	        }
            	    ],
            	    series : [
            	        {
            	            name:'兑付',
            	            type:'bar',
            	            data:<?= Json::encode(array_values($paySumByMonth)) ?>,
            	            markPoint : {
            	                data : [
            	                    {type : 'max', name: '最大值'},
            	                    {type : 'min', name: '最小值'}
            	                ]
            	            },
            	            markLine : {
            	                data : [
            	                    {type : 'average', name: '平均值'}
            	                ]
            	            }
            	        },
            	        {
            	            name:'进账',
            	            type:'bar',
            	            data:<?= Json::encode(array_values($capitalByMonth)) ?>,
            	            markPoint : {
            	                data : [
//             	                    {name : '年最高', value : 182.2, xAxis: 7, yAxis: 183},
//             	                    {name : '年最低', value : 2.3, xAxis: 11, yAxis: 3}
            	                    {type : 'max', name: '最大值'},
            	                    {type : 'min', name: '最小值'}
            	                ]
            	            },
            	            markLine : {
            	                data : [
            	                    {type : 'average', name : '平均值'}
            	                ]
            	            }
            	        }
            	    ]
            };
            
            everyInOut.setOption(option);
            </script>
		</div>
	</div>
	<div class="col-md-6 grid_2 grid_2_bot">
		<div class="grid_1">
			<h4>累积出入款统计</h4>
			<div id="overall" style="width: 100%; height: 500px;"></div>
			<script>
			var overall = echarts.init(document.getElementById('overall'));
			
			overall.title = '多 X 轴示例';

			var colors = ['#5793f3', '#d14a61', '#675bba'];

			option = {
			    color: colors,

			    tooltip: {
			        trigger: 'none',
			        axisPointer: {
			            type: 'cross'
			        }
			    },
			    legend: {
			        data:['累计进账', '累计兑付']
			    },
			    grid: {
			        top: 70,
			        bottom: 50
			    },
			    xAxis: [
			        {
			            type: 'category',
			            axisTick: {
			                alignWithLabel: true
			            },
			            axisLine: {
			                onZero: false,
			                lineStyle: {
			                    color: colors[1]
			                }
			            },
			            axisPointer: {
			                label: {
			                    formatter: function (params) {
			                        return '累计兑付  ' + params.value
			                            + (params.seriesData.length ? '：' + params.seriesData[0].data : '');
			                    }
			                }
			            },
			            data: <?= Json::encode(array_keys($paySumByDate)) ?>
			        },
			        {
			            type: 'category',
			            axisTick: {
			                alignWithLabel: true
			            },
			            axisLine: {
			                onZero: false,
			                lineStyle: {
			                    color: colors[0]
			                }
			            },
			            axisPointer: {
			                label: {
			                    formatter: function (params) {
			                        return '累计进账  ' + params.value
			                            + (params.seriesData.length ? '：' + params.seriesData[0].data : '');
			                    }
			                }
			            },
			            data: <?= Json::encode(array_keys($capitalSumByDate)) ?>
			        }
			    ],
			    yAxis: [
			        {
			            type: 'value'
			        }
			    ],
			    series: [
			        {
			            name:'累计进账',
			            type:'line',
			            xAxisIndex: 1,
			            smooth: true,
			            data: <?= Json::encode(array_values($capitalSumByDate)) ?>
			        },
			        {
			            name:'累计兑付',
			            type:'line',
			            smooth: true,
			            data: <?= Json::encode(array_values($paySumByDate)) ?>
			        }
			    ]
			};
				
		    overall.setOption(option);
			</script>
        </div>
	<div class="clearfix"> </div>
   </div>
</div>
