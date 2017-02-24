<?php
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\Html;
?>
<!--<div class="span9">-->
          <div class="row-fluid">
                <div class="page-header">
                    <h1><?='标题：'.Html::encode($model->title)?></h1>
                    <h2><?='分类：'.Html::encode($model->column_id)?></h2>
                    <h3><small><?='发布于'.Html::encode($model->created_at)?></small></h3>
                </div>
                        <fieldset>
                                <?=$model->content?>
                        </fieldset>
          </div>
<!--</div>-->