<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '追加浮动利息';
?>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'float_interest')->textInput()->label('浮动利息') ?>

<?= Html::submitButton('追加浮动利息', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>