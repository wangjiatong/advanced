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

<?=$form->field($model, 'username')->textInput(['value' => $old->username])?>

<?=$form->field($model, 'email')->textInput(['value' => $old->email])?>

<?=$form->field($model, 'name')->textInput(['value' => $old->name]) ?>

<?= Html::submitButton('确定') ?>

<?php ActiveForm::end()?>