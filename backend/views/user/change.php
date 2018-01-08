<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
$this->title = '客户修改';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>客户修改</h1>
<?php $form = ActiveForm::begin()?>

<?=$form->field($model, 'username')->textInput(['value' => $old->username, 'disabled' => true])?>

<?=$form->field($model, 'email')->textInput(['value' => $old->email])?>

<?=$form->field($model, 'name')->textInput(['value' => $old->name]) ?>

<?= $form->field($model, 'sex')->dropDownList([
        '0' => '男',
        '1' => '女',
]) ?>

<?=$form->field($model, 'birthday')->textInput(['value' => $old->birthday]) ?>

<?=$form->field($model, 'phone_number')->textInput(['value' => $old->phone_number]) ?>

<?= Html::submitButton('确定', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end()?>