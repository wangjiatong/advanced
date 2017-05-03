<?php
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\Html;
use common\models\News;
$this->title = '新闻详情——'. $model->title;
?>
<!--<div class="span9">-->
          <div class="row-fluid">
                <div class="page-header">
                    <h1><?= Html::encode($model->title) ?></h1>
                    <h2><small><?= News::findOne($model->id)->newsColumn['news_column'] ?></small></h2>
                    <h3><small><?= '发布时间： '.Html::encode($model->created_at) ?></small></h3>
                </div>
                        <fieldset>
                                <?=$model->content?>
                        </fieldset>
          </div>
<!--</div>-->