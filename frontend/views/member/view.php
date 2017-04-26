<?php
use yii\widgets\DetailView;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = '合同详情';
?>
<div class="about-page main grid-wrap">

		<header class="grid col-full">
		<hr>
			<p class="fleft">合同详情</p>
		</header>

		
		
		<aside class="grid col-one-quarter mq2-col-full">
                    <p class="mbottom">
			</p>
			<menu>
				<ul>
<!--					<li><a href="/member" class="arrow">我的合同</a></li>
					<li><a href="/member/personal" class="arrow">个人信息</a></li>-->
<!--					<li><a href="#navplace" class="arrow">Our place</a></li>
					<li><a href="#navother" class="arrow">Our lorem</a></li>-->
				</ul>
			</menu>
		</aside>
		
		<section class="grid col-three-quarters mq2-col-full">
			<!--<img src="img/team.jpg" alt="" >-->
			
			<article id="navteam">
			<h2></h2>
                            <?=DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'id',
                                    'contract_number',
                                    'capital',
                                    'transfered_time',
                                    'found_time',
                                    'raise_day',
                                    'raise_interest',
                                    'cash_time',
                                    'term_month',
                                    'interest',
                                    'term',
                                    'every_time',
                                    'every_interest',
                                    'total_interest',
                                    'total',
                                    'bank',
                                    'bank_number',
                                    'source',
                                    'created_at',
                                    'updated_at',
                                    'product_id',
                                    'user_id',
                                    'status',
                                    'raise_interest_year',
                                    'interest_year',
                                ],
                            ])?>
			</article>
			
<!--			<article id="navphilo">
			<h2>Our philosophy</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
			</article>
			
			<article id="navplace">
			<h2>Our place</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
			</article>
					
			<article id="navother">
			<h2>Our lorem</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
			</article>-->
		
		</section>
		
	</div> <!--main-->
