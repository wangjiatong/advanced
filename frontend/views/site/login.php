<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('$(document).ready(function(){$("#login").addClass("navactive");});');
?>
<div class="site-login">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <div class="about-page main grid-wrap">

        <header class="grid col-full">
        <hr>
                <p class="fleft">登录</p>
        </header>

        <section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
        <!--<p>Please fill out the following fields to login:</p>-->
        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('用户名：') ?>

                    <?= $form->field($model, 'password')->passwordInput()->label('密码：') ?>

                    <?= $form->field($model, 'rememberMe')->checkbox()->label('保持登录') ?>

<!--                    <div style="color:#999;margin:1em 0">
                        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    </div>-->

                    <div class="form-group">
                        <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        </section>
    </div>
</div>
