<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\Admin;
use backend\models\Role;
$this->title = '角色设置';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="role-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin()?>
    <?= $form->field($model, 'user_id')->dropDownList(Admin::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => '请选择一个用户'])?>
    <?= $form->field($model, 'role_id')->inline()->checkboxList(Role::find()->select(['role_name', 'id'])->indexBy('id')->column())?>
    <?= Html::submitButton('确定') ?>
    <?php ActiveForm::end()?>
</div>
