<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>新增管理员</h1>
<?php $form = ActiveForm::begin()?>

<?=$form->field($model, 'username') ?>

<?=$form->field($model, 'password')->passwordInput()?>

<?=$form->field($model, 'email')?>

<?=$form->field($model, 'name') ?>

<?= Html::submitButton('确定', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end()?>
