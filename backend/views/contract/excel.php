<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Product;
use yii\jui\DatePicker;
use kartik\select2\Select2;
use common\models\UserModel;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = '导出Excel';
?>
<h3 class="blank1"><?= Html::encode($this->title) ?></h3>

<?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "<div class='form-group'>{label}<div class='col-sm-8'>{input}</div><div class='col-sm-2'>{error}</div></div>",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
            'inputOptions' => ['class' => 'form-control1'],
        ],
    ]) ?>

<?= $form->field($model, 'product_id')->widget(Select2::classname(), [
    'data' => Product::find()->select('product_name, id')->indexBy('id')->column(),
    'options' => [
        'multiple' => true,
       'placeholder' => '请选择',
    ],
]) ?>

<?= $form->field($model, 'user_id')->widget(Select2::classname(), [
    'data' => UserModel::find()->select('name, id')->indexBy('id')->column(),
    'options' => [
        'multiple' => true,
       'placeholder' => '请选择',
    ],
]) ?>

<?= $form->field($model, 'start_time')->widget(DatePicker::className(), [
    'options' => [
        'class' => 'form-control1',
    ],
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

<?= $form->field($model, 'end_time')->widget(DatePicker::className(), [
    'options' => [
        'class' => 'form-control1',
    ],
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

<div class="panel-footer">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <?= Html::submitButton('确定', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>





