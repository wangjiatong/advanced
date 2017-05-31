<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Product;
use yii\jui\DatePicker;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = '导出Excel';
?>
<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'product_id')->dropDownList(Product::find()->select(['product_name', 'id'])->indexBy('id')->column(), ['prompt' => '请选择产品']) ?>

<?= $form->field($model, 'start_time')->widget(DatePicker::className(), [
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

<?= $form->field($model, 'end_time')->widget(DatePicker::className(), [
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

<?= Html::submitButton('确定') ?>

<?php ActiveForm::end() ?>





