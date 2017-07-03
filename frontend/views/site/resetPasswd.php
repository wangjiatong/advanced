<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = '修改密码';
$id = Yii::$app->user->id;
?>

<div class="about-page main grid-wrap">

		<header class="grid col-full">
		<hr>
			<p class="fleft">修改密码</p>
		</header>

		
		
		<aside class="grid col-one-quarter mq2-col-full">
                    <p class="mbottom">欢迎，<?= common\models\UserModel::getName($id)?><?=common\models\UserModel::getSex($id)?>。
			</p>
			<menu>
				<ul>
					<li><a href="/member" class="arrow">我的合同</a></li>
					<li><a href="/site/reset-passwd" class="arrow">修改密码</a></li>
<!--					<li><a href="#navplace" class="arrow">Our place</a></li>
					<li><a href="#navother" class="arrow">Our lorem</a></li>-->
				</ul>
			</menu>
		</aside>
		
		<section class="grid col-three-quarters mq2-col-full">
			<h2></h2>
                        <div class="row">
                            <div class="col-lg-5 col-lg-offset-2">
                                <?php $form = ActiveForm::begin() ?>

                                <?= $form->field($model, 'newPasswd')->passwordInput() ?>

                                <?= $form->field($model, 'confirmNewPasswd')->passwordInput() ?>

                                <?= Html::submitButton('确定', ['class' => 'btn btn-primary']) ?>

                                <?php ActiveForm::end() ?>
                            </div>
                        </div>
			</article>
		
		</section>
		
	</div> <!--main-->
