<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="span9">
          <div class="row-fluid">
                <div class="page-header">
                        <h1>新闻分类 <small>添加</small></h1>
                </div>
                        <fieldset>
                            <?php $form = ActiveForm::begin();?>

                            <?= $form->field($model, 'news_column')->label('栏目名称');?>

                            <?= Html::submitButton('添加', ['class' => 'btn btn-primary']);?>

                            <?php $form->end();?>
                        </fieldset>
          </div>
</div>