<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use backend\models\Role;
use backend\models\Access;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = '权限设置';
?>
<div class="access-setRole">
    
    <h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'role_id')->dropDownList(Role::find()->select(['role_name' , 'id'])->indexBy('id')->column(), ['prompt' => '请选择一个角色']) ?>

<?= $form->field($model, 'access_id')->inline()->checkboxList(Access::find()->select(['access_name', 'id'])->indexBy('id')->column()) ?>

<?= Html::submitButton('确定', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>

    </div>