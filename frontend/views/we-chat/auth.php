<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = '翌银玖德';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!--<div class="page__hd">
    <h1 class="page__title">绑定微信</h1>
    <p class="page__desc">翌银玖德</p>
</div>-->
<div class="page__bd">
    <div class="weui-cells__title">绑定微信</div>
    <div class="weui-cells weui-cells_form">
        <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => "<div class='weui-cell'><div class='weui-cell__hd'>{label}</div><div class='weui-cell__bd'>{input}</div>{error}</div>",
                'labelOptions' => ['class' => 'weui-label'],
                'inputOptions' => ['class' => 'weui-input'],
            ]
        ]) ?>
        <div class="weui-cells">
            <?= $form->field($model, 'username') ?>
        </div>
        <div class="weui-cells">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="weui-btn-area">
            <?= Html::submitButton('绑定微信', [
                'class' => 'weui-btn weui-btn_primary',
            ]) ?>
        </div>
         <?php ActiveForm::end() ?>
    </div>
</div>

