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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(UEditor::className(), []) ?>

    <?= $form->field($model, 'product_column_id')->dropDownList(ProductColumn::find()->select(['product_column'])->indexBy('id')->column(), ['prompt' => '请选择产品分类']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>