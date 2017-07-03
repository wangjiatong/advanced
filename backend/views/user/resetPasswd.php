<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\UserModel;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>修改密码：<?=UserModel::findOne($id)->name ?></h1>

<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'newPasswd')->passwordInput() ?>

<?= $form->field($model, 'confirmNewPasswd')->passwordInput() ?>

<?= Html::submitButton('确定', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
