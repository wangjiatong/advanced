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
<div class="weui-cells__title">新密码</div>
<div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <?= $form->field($model, 'newPassword')->label('')->passwordInput(['class' => 'weui-input', 'placeholder' => '请输入新密码']) ?>
                </div>
            </div>
                <div class="weui-cell">
                <div class="weui-cell__bd">
                    <?= $form->field($model, '_newPassword')->label('')->passwordInput(['class' => 'weui-input', 'placeholder' => '请确认新密码']) ?>
                </div>
            </div>
</div>
<div class="weui-btn-area">
    <?= Html::submitButton('确定', ['class' => 'weui-btn weui-btn_primary']) ?>
</div>
<?php ActiveForm::end() ?>