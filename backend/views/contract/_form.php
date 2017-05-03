<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use common\models\Product;
use common\models\UserModel;


/* @var $this yii\web\View */
/* @var $model common\models\Contract */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contract_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capital')->textInput() ?>
    
    <?= $form->field($model, 'transfered_time')->widget(DatePicker::className(), [
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'found_time')->widget(DatePicker::className(), [
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'cash_time')->widget(DatePicker::className(), [
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
    <?= $form->field($model, 'raise_interest_year')->textInput() ?>
    
    <?= $form->field($model, 'interest_year')->textInput() ?>
    
    <?= $form->field($model, 'term_month')->textInput() ?>

    <?= $form->field($model, 'term')->dropDownList([
        '3' => '季度',
        '6' => '半年',
        '1' => '一次性兑付',
    ]) ?>

    <?= $form->field($model, 'bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_id')->dropDownList(Product::find()->select('product_name')->indexBy('id')->column(), ['prompt' => '请选择产品名称']) ?>

    <?= $form->field($model, 'user_id')->dropDownList(UserModel::find()->select('name')->indexBy('id')->column(), ['prompt' => '请选择客户姓名']) ?>
    
    <?= $form->field($model, 'pdf')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('创建合同', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
