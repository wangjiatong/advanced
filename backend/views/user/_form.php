<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use light\widgets\LockBsFormAsset;

/* @var $this yii\web\View */
/* @var $model common\models\UserModel */
/* @var $form yii\widgets\ActiveForm */
?>

<h3 class="blank1"><?= $this->title ?></h3>
<div class="tab-content">
    <div class="tab-pane active" id="horizontal-form">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "<div class='form-group'>{label}<div class='col-sm-2'>{input}</div><div class='col-sm-2'>{error}</div></div>",
                'labelOptions' => ['class' => 'col-sm-2 control-label'],
                'inputOptions' => ['class' => 'form-control1'],
            ],
        ]); ?>
    
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'password')->passwordInput() ?>
    
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'sex')->dropDownList([
            'prompt' => '请选择性别',
            '0' => '男',
            '1' => '女',
        ]) ?>
    
        <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
    
        <div class="form-group">
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?= Html::submitButton('确定', [
                            'class' => 'btn btn-success',
                            'data-loading-text' => '客户创建中...',
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    
        <?php ActiveForm::end(); ?>
    
    </div>
</div>
<?php LockBsFormAsset::register($this) ?>
