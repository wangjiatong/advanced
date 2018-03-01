<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Alert;
$this->title = '修改密码';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3>修改密码</h3>
<p>输入您的密码，并确认新的密码。</p>
<?php 
    if(Yii::$app->getSession()->hasFlash('wrong_old_passwd'))
    {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-danger',
            ],
            'body' => Yii::$app->getSession()->getFlash('wrong_old_passwd'),
        ]);
    }
?>
<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'oldPasswd')->passwordInput()?>

<?= $form->field($model, 'newPasswd')->passwordInput()?>

<?= $form->field($model, 'confirmNewPasswd')->passwordInput()?>

<?= Html::submitButton('确定', ['class' => 'btn btn-primary']); ?>

<?php $form::end() ?>