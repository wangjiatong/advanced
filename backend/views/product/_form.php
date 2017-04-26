<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//产品分类表
use common\models\ProductColumn;
use kucha\ueditor\UEditor;
/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(UEditor::className(), []) ?>

    <?= $form->field($model, 'product_column_id')->dropDownList(ProductColumn::find()->select(['product_column'])->indexBy('id')->column(), ['prompt' => '请选择产品分类']) ?>
    
    <?= $form->field($model, 'img')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('创建', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
