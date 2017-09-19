<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $form = ActiveForm::begin() ?>
    <div class="weui-cells__title">投递对象</div>
    <div class="weui-cells">
        <div class="weui-cell weui-cell_select weui-cell_select-after">
            <div class="weui-cell__hd">
            </div>
            <div class="weui-cell__bd">
                <?= $form->field($model, 'to_whom')->label('')->dropDownList([$ceo_id => '总经理', $manager_id => '客户经理'], [
                    'class' => 'weui-select',
                    'prompt' => '请选择投递对象',
                ]) ?>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="weui-cells__title">是否匿名</div>
    <div class="weui-cells">
        <div class="weui-cell weui-cell_select weui-cell_select-after">
            <div class="weui-cell__hd">
            </div>
            <div class="weui-cell__bd">
                <?= $form->field($model, 'if_anonymous')->label('')->dropDownList(['1' => '是', '0' => '否'], [
                    'class' => 'weui-select',
                    'prompt' => '请选择是否匿名',
                ]) ?>
            </div>
        </div>
    </div>
    <!-- -->  
    <div class="weui-cells__title">意见建议</div>
    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <?= $form->field($model, 'advice')->label('')->textarea([
                    'class' => 'weui-textarea',
                    'rows' => 5,
                    'placeholder' => '请输入您的意见及建议',
                ]) ?>
            </div>
        </div>
    </div>
    <!-- -->
    <div class="weui-btn-area">
        <?= Html::submitButton('提交', [
            'class' => 'weui-btn weui-btn_primary',
        ]) ?>
    </div>
<?php ActiveForm::end() ?>