<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $form = ActiveForm::begin()?>

<?=$form->field($model, 'username')?>

<?=$form->field($model, 'newPasswd')?>

<?=$form->field($model, 'email')?>

<?=$form->field($model, 'name') ?>

<?= Html::submitButton('确定') ?>

<?php ActiveForm::end()?>
