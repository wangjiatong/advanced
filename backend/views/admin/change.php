<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
$this->title = '修改信息'
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1><?= $this->title ?></h1>

<?php $form = ActiveForm::begin()?>

<?=$form->field($model, 'username')->textInput(['value' => $old->username, 'readonly' => true])?>

<?=$form->field($model, 'email')->textInput(['value' => $old->email]) ?>

<?=$form->field($model, 'name')->textInput(['value' => $old->name]) ?>

<?= Html::submitButton('确定', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end()?>