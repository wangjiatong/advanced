<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'access_name')->textInput() ?>

<?= $form->field($model, 'urls')->textarea(['rows' => 5]) ?>
        
<?= Html::submitButton('确定') ?>

<?php ActiveForm::end() ?>
