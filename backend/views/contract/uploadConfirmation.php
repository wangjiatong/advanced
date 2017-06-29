<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\controllers\common\BaseController;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3>确认函上传  <?= Html::a('取消', [BaseController::checkUrlAccess('contract/view', 'contract/my-view'), 'id' => $model->id], ['class' => 'btn btn-primary']) ?></h3>
<br />
<?php $form = ActiveForm::begin()?>

<?= $form->field($model, 'pdf')->fileInput() ?>

<?= Html::submitButton('上传', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>
