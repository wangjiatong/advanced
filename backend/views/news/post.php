<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use common\models\NewsColumn;
use kucha\ueditor\UEditor;
$this->title = '发布新闻';
?>

<?php $form = ActiveForm::begin();?>
    <div class="control-group">
            <div class="controls">
                    <?= $form->field($model, 'title')->label('标题'); ?>
            </div>
    </div>
    <div class="control-group">
            <div class="controls">
                    <?= $form->field($model, 'summary')->label('摘要（首页及新闻页显示）'); ?>
            </div>
    </div>
    <div class="control-group">
            <div class="controls">                                              
                    <?= $form->field($model, 'content')->widget('kucha\ueditor\UEditor',[]); ?>
            </div>
    </div>
    <div class="control-group">
            <div class="controls">
                    <?= $form->field($model, 'column_id')->label('新闻分类')->dropDownList(NewsColumn::find()->select(['news_column'])->indexBy('id')->column(), ['prompt' => '请选择新闻分类']); ?>
            </div>
    </div>	
    <div class="control-group">
            <div class="controls">
                <?= Html::submitButton('确定', ['class' => 'btn btn-success']); ?>
            </div>
    </div>
<?php ActiveForm::end();?>
