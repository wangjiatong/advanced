<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ContractSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'contract_number') ?>

    <?= $form->field($model, 'capital') ?>

    <?= $form->field($model, 'transfered_time') ?>

    <?= $form->field($model, 'found_time') ?>

    <?php // echo $form->field($model, 'raise_day') ?>

    <?php // echo $form->field($model, 'raise_interest') ?>

    <?php // echo $form->field($model, 'cash_time') ?>

    <?php // echo $form->field($model, 'term_month') ?>

    <?php // echo $form->field($model, 'interest') ?>

    <?php // echo $form->field($model, 'term') ?>

    <?php // echo $form->field($model, 'every_time') ?>

    <?php // echo $form->field($model, 'every_interest') ?>

    <?php // echo $form->field($model, 'total_interest') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'bank') ?>

    <?php // echo $form->field($model, 'bank_number') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'product_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
