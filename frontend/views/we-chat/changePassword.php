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
<div class="weui-cells__title">旧密码</div>
<div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <?= $form->field($model, 'oldPassword')->label('')->passwordInput(['class' => 'weui-input', 'placeholder' => '请输入旧密码']) ?>
                </div>
            </div>
</div>
<div class="weui-btn-area">
    <?= Html::submitButton('确定', ['class' => 'weui-btn weui-btn_primary']) ?>
</div>
<?php ActiveForm::end() ?>