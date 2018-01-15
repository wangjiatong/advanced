<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '网站管理后台';
?>

<?php $form = ActiveForm::begin(['id' => 'login-form',
    'options' => ['class' => 'form-horizontal templatemo-login-form-2'],
    'fieldConfig' => [
        'template' => '<div class="form-group">
				          <div class="col-md-6 col-md-offset-3">		          	
				            {label}
				            <div class="templatemo-input-icon-container">
				            	{input}
				            </div>
                            {error}		            		            		            
				          </div>              
				        </div>',
        'labelOptions' => ['class' => 'control-label'],
        'inputOptions' => ['class' => 'form-control'],  
    ],
]); ?>

    <div class="row">
    	<div class="col-md-12">
    		<h1><?= $this->title ?></h1>
    	</div>
    </div>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('用户名') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('密码') ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => '<div class="form-group">
				          <div class="col-md-12 col-md-offset-3">
				            <div class="checkbox">
				                <label>
			                        <input type="checkbox"> 记住我
				                </label>
				            </div>
				          </div>
				        </div>',
    ]) ?>
    
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <?= Html::submitButton('登录', ['class' => 'btn btn-info', 'name' => 'login-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>

