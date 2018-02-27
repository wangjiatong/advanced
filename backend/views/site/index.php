<?php
$this->title = '管理后台-主页';
use yii\helpers\Json;
use backend\controllers\common\BaseController;
?>
<?php if(in_array('contract/index', Yii::$app->session['allowed_urls']) 
    || in_array('contract/my-contract', Yii::$app->session['allowed_urls'])): ?>
<div class="widgets_top">
    <div class="col_3">
    <!-- 	<div class="col-md-3 widget widget1"> -->
    <!-- 		<div class="r3_counter_box"> -->
    <!-- 			<i class="fa fa-mail-forward"></i> -->
    <!-- 			<div class="stats"> -->
    <!-- 			  <h5>0 <span></span></h5> -->
    <!-- 			  <div class="grow"> -->
    <!-- 				<p>增长</p> -->
    <!-- 			  </div> -->
    <!-- 			</div> -->
    <!-- 		</div> -->
    <!-- 	</div> -->
    	<div class="col-md-4 widget_middle_left">
    	<a href='<?= BaseController::checkUrlAccess('user/index', 'user/my-user') ?>'>
    		<div class="r3_counter_box">
    			<i class="fa fa-users"></i>
    			<div class="stats">
    			  <h5><?= $userNum ?> <span></span></h5>
    			  <div class="grow grow1">
    				<p>客户</p>
    			  </div>
    			</div>
    		</div>
    	</a>
    	</div>
    	<div class="col-md-4 widget_middle_left">
    	<a href='<?= BaseController::checkUrlAccess('contract/index', 'contract/my-contract') ?>'>
    		<div class="r3_counter_box">
    			<i class="fa fa-eye"></i>
    			<div class="stats">
    			  <h5><?= $contractNum ?> <span></span></h5>
    			  <div class="grow grow3">
    				<p>合同</p>
    			  </div>
    			</div>
    		</div>
    		</a>
    	 </div>
    	 <div class="col-md-4 widget_middle_left">
    	 <a href='statistic/overall'>
    		<div class="r3_counter_box">
    			<i class="fa fa-usd"></i>
    			<div class="stats">
    			  <h5><?= number_format($capitalSum) ?> <span></span></h5>
    			  <div class="grow grow2">
    				<p>销售量</p>
    			  </div>
    			</div>
    		</div>
    		</a>
    	</div>
    	<div class="clearfix"> </div>
    </div>
</div>

<!-- switches -->
<div class="switches">
	<div class="col-4">
		<div class="col-md-4 switch-right">
			<div class="switch-right-grid">
				<div class="switch-right-grid1">
					<h3>客户统计</h3>
					<p>最近六个月中每个月的客户增长数量</p>
					<ul>
                        <?php 
                            foreach (Json::decode($userNumByMonth) as $value)
                            {
                                $uNum[] = $value[1];
                            }
                        ?>
						<li>最高：<?= max($uNum) ?></li>
						<li>平均：<?= round(array_sum($uNum)/6, 2) ?></li>
		                <li>最低：<?= min($uNum) ?></li>
					</ul>
				</div>
			</div>
			<div class="sparkline">
				<div id="graph-wrapper">
					<div class="graph-container" style='height: 300px;'>
                        <div id='line' style='width: 100%; height: 600px;'></div>
					</div>
				</div>
                <script>
                    var myLine = echarts.init(document.getElementById('line'));   
                    
                    data = <?= $userNumByMonth ?>;
        
                    var dateList = data.map(function (item) {
                        return item[0];
                    });
                    var valueList = data.map(function (item) {
                        return item[1];
                    });
        
                    option = {
        
                        // Make gradient line here
                        visualMap: [{
                            show: false,
                            type: 'continuous',
                            seriesIndex: 0,
                            min: 0,
                            max: 400
                        }],
        
        
                        title: [{
                            left: 'center',
                            text: ''
                        }],
                        tooltip: {
                            trigger: 'axis'
                        },
                        xAxis: [{
                            data: dateList
                        }],
                        yAxis: [{
                            splitLine: {show: false}
                        }],
                        grid: [{
                            bottom: '60%'
                        }],
                        series: [{
                            type: 'line',
                            showSymbol: false,
                            data: valueList
                        }]
                    };
    
                    myLine.setOption(option);
                </script>
			</div>
		</div>
		<div class="col-md-4 switch-right">
			<div class="switch-right-grid">
				<div class="switch-right-grid1">
					<h3>合同统计</h3>
					<p>最近六个月中每个月的成立合同的数量</p>
					<ul>
						<li>最高：<?= max($conNumByMonth) ?></li>
						<li>平均：<?= round(array_sum($conNumByMonth)/6, 2) ?></li>
						<li>最低：<?= min($conNumByMonth) ?></li>
					</ul>
				</div>
			</div>
			<div class="sparkline">
				<div id="graph-wrapper">
					<div class="graph-container" style='height: 300px;'>
                        <div id='bar' style='width: 100%; height: 280px;'></div>
					</div>
				</div>
                <script>
                    var myBar = echarts.init(document.getElementById('bar'));   
                    
                    myBar.title = '';

                    option = {
                        color: ['#3398DB'],
                        tooltip : {
                            trigger: 'axis',
                            axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                                type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                            }
                        },
                        grid: {
                            left: '3%',
                            right: '4%',
                            bottom: '3%',
                            containLabel: true
                        },
                        xAxis : [
                            {
                                type : 'category',
                                data : <?= Json::encode(array_keys($conNumByMonth)) ?>,
                                axisTick: {
                                    alignWithLabel: true
                                }
                            }
                        ],
                        yAxis : [
                            {
                                type : 'value'
                            }
                        ],
                        series : [
                            {
                                name:'数量',
                                type:'bar',
                                barWidth: '60%',
                                data:<?= Json::encode(array_values($conNumByMonth)) ?>
                            }
                        ]
                    };
    
                    myBar.setOption(option);
                </script>
			 </div>
		  </div>
		  <div class="col-md-4 switch-right">
			<div class="switch-right-grid">
				<div class="switch-right-grid1">
					<h3>销售统计</h3>
					<p>最近六个月中每个月的销售额</p>
					<ul>
					   <?php $capitalByMonthArrVal = array_values($capitalByMonth) ?>
						<li>最高：<?= number_format(max($capitalByMonthArrVal)) ?></li>
						<li>平均：<?= number_format(array_sum($capitalByMonthArrVal)/6, 2) ?></li>
						<li>最低：<?= number_format(min($capitalByMonthArrVal)) ?></li>
					</ul>
				</div>
			</div>
			<div class="sparkline">
				<div id="graph-wrapper">
					<div class="graph-container" style='height: 300px;'>
                        <div id='weather' style='width: 100%; height: 310px;'></div>
					</div>
				</div>
				<script>
    			     var myWeather = echarts.init(document.getElementById('weather'));
    			     
    			     option = {
    			    		    title: {
    			    		        text: '',
    			    		        subtext: ''
    			    		    },
    			    		    tooltip: {
    			    		        trigger: 'axis'
    			    		    },
    			    		    legend: {
    			    		        data:['','']
    			    		    },
    			    		    toolbox: {
    			    		        show: false,
    			    		        feature: {
    			    		            dataZoom: {
    			    		                yAxisIndex: 'none'
    			    		            },
    			    		            dataView: {readOnly: false},
    			    		            magicType: {type: ['line', 'bar']},
    			    		            restore: {},
    			    		            saveAsImage: {}
    			    		        }
    			    		    },
    			    		    xAxis:  {
    			    		        type: 'category',
    			    		        boundaryGap: false,
    			    		        data: <?= Json_encode(array_keys($capitalByMonth)) ?>
    			    		    },
    			    		    yAxis: {
    			    		        type: 'value',
    			    		        axisLabel: {
    			    		            formatter: function(value)
    			    		            {
    			    		                return value/10000 + '万元';
    			    		            }
    			    		        }
    			    		    },
    			    		    series: [
    			    		        {
    			    		            name:'',
    			    		            type:'line',
    			    		            data: <?= Json::encode($capitalByMonthArrVal) ?>,
    			    		            markPoint: {
    			    		                data: [
    			    		                    {type: 'max', name: '最大值'},
    			    		                    {type: 'min', name: '最小值'}
    			    		                ]
    			    		            },
    			    		            markLine: {
    			    		                data: [
    			    		                    {type: 'average', name: '平均值'}
    			    		                ]
    			    		            }
    			    		        },
    			    		    ]
    			    		};
    		    		
    			     myWeather.setOption(option);
				</script>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php endif; ?>
<!-- //switches -->