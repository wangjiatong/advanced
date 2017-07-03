<?php
use yii\widgets\DetailView;
use common\models\UserModel;
use common\models\Product;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = '合同详情';
$id = Yii::$app->user->id;
?>
<div class="about-page main grid-wrap">

		<header class="grid col-full">
		<hr>
			<p class="fleft">合同详情</p>
		</header>

		
		
		<aside class="grid col-one-quarter mq2-col-full">
                    <p class="mbottom">欢迎，<?= common\models\UserModel::getName($id)?><?=common\models\UserModel::getSex($id)?>。
			</p>
			<menu>
				<ul>
                                        <li><a href="/member" class="arrow">我的合同</a></li>
                                        <li><a href="/site/reset-passwd" class="arrow">修改密码</a></li>
				</ul>
			</menu>
		</aside>
		
		<section class="grid col-three-quarters mq2-col-full">
			<!--<img src="img/team.jpg" alt="" >-->
			
			<!--<article id="navteam">-->
			<h2></h2>
                            <?=DetailView::widget([
                                'model' => $model,
                                'attributes' => [
//                                    'id',
//                                    'contract_number',
//                                    'capital',
//                                    'transfered_time',
//                                    'found_time',
//                                    'raise_day',
//                                    'raise_interest',
//                                    'cash_time',
//                                    'term_month',
//                                    'interest',
//                                    'term',
//                                    'every_time',
//                                    'every_interest',
//                                    'total_interest',
//                                    'total',
//                                    'bank',
//                                    'bank_number',
//                                    'source',
//                                    'created_at',
//                                    'updated_at',
//                                    'product_id',
//                                    'user_id',
//                                    'status',
//                                    'raise_interest_year',
//                                    'interest_year',
//                                    [
//                                        'label' => '客户姓名',
//                                        'value' => function($data){
//                                            return UserModel::findOne($data->user_id)->name;
//                                        }                                     
//                                    ],
                                    [
                                        'label' => '产品名称',
                                        'value' => function($data){
                                        return Product::findOne($data->product_id)->product_name;
                                        }
                                    ],
                                    [
                                        'label' => '认购金额(单位：元)',
                                        'attribute' => 'capital',
                                    ],
                                    [
                                        'label' => '成立时间',
                                        'format' => 'date',
                                        'attribute' => 'found_time',
                                    ],
                                    [
                                        'label' => '到期时间',
                                        'format' => 'date',
                                        'attribute' => 'cash_time',
                                    ],
                                    [
                                        'label' => '业绩比较基准（年化，单位：%）',
                                        'attribute' => 'interest_year',
                                    ],
                                    [
                                        'label' => '合同状态',
                                        'value' => function($data){
                                            switch ($data->status)
                                            {
                                                case 1: return '运作中'; break;
                                                case 0: return '已结束'; break;
                                            }
                                        }
                                    ],
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
