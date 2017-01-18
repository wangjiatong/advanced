<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use common\models\NewsColumn;
use kucha\ueditor\UEditor;
?>
<div class="span9">
          <div class="row-fluid">
                <div class="page-header">
                        <h1>新闻 <small>发布</small></h1>
                </div>
                <!--<form class="form-horizontal">-->
                        <fieldset>
                            <?php $form = ActiveForm::begin();?>
                                <div class="control-group">
                                        <!--<label class="control-label" for="name">标题</label>-->
                                        <div class="controls">
                                                <?= $form->field($model, 'title')->label('标题'); ?>
                                        </div>
                                </div>
                                <div class="control-group">
                                        <!--<label class="control-label" for="email">正文</label>-->
                                        <div class="controls">                                              
                                                <?= $form->field($model, 'content')->widget('kucha\ueditor\UEditor',[]); ?>
                                        </div>
                                </div>
                                <div class="control-group">
                                        <!--<label class="control-label" for="role">栏目</label>-->
                                        <div class="controls">
                                                <?= $form->field($model, 'column')->label('新闻分类')->dropDownList(NewsColumn::find()->select(['news_column', 'id'])->indexBy('news_column')->column(), ['prompt' => '请选择新闻分类']); ?>
                                        </div>
                                </div>	
                                <div class="control-group">
                                        <!--<label class="control-label" for="active"></label>-->
                                        <div class="controls">
                                            <?= Html::submitButton('发布', ['class' => 'btn btn-primary']); ?>
                                        </div>
                                </div>
<!--                                <div class="form-actions">
                                        <input type="submit" class="btn btn-success btn-large" value="Save Changes" /> <a class="btn" href="#">取消发布</a>
                                </div>-->
                            <?php ActiveForm::end();?>
                        </fieldset>
                <!--</form>-->
          </div>
</div>
