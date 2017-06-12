<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'oldPasswd')?>

<?= $form->field($model, 'newPasswd')?>

<?= $form->field($model, 'confirmNewPasswd')?>

<?= Html::submitButton('提交'); ?>

<?php $form::end() ?>