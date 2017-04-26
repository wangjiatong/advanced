<?php
//use Yii;
use yii\grid\GridView;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = '个人信息';
$id = Yii::$app->user->id;
?>

<div class="about-page main grid-wrap">

		<header class="grid col-full">
		<hr>
			<p class="fleft">个人中心</p>
		</header>

		
		
		<aside class="grid col-one-quarter mq2-col-full">
                    <p class="mbottom">欢迎，<?= common\models\UserModel::getName($id)?><?=common\models\UserModel::getSex($id)?>。
			</p>
			<menu>
				<ul>
					<li><a href="/member" class="arrow">我的合同</a></li>
					<li><a href="/member/personal" class="arrow">个人信息</a></li>
<!--					<li><a href="#navplace" class="arrow">Our place</a></li>
					<li><a href="#navother" class="arrow">Our lorem</a></li>-->
				</ul>
			</menu>
		</aside>
		
		<section class="grid col-three-quarters mq2-col-full">
			<!--<img src="img/team.jpg" alt="" >-->
			
			<article id="navteam">
			<h2></h2>
			</article>
		
		</section>
		
	</div> <!--main-->
