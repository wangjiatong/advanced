<?php
use yii\grid\GridView;
use yii\helpers\Html;
$this->title = '新闻分类管理';
?>
<div class="row-fluid">
    <div class="page-header">
        <h1>新闻分类 <small>管理</small></h1>
    </div>
        <fieldset>
            <?=GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'news_column',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{news-column-update}{news-column-delete}',
                        'buttons' => [
                            'news-column-update' => function($url, $model, $key){
                            $options = [
                                'title' => Yii::t('yii', 'Update'),
                                'aria-label' => Yii::t('yii', 'Update'),
                                'data-pjax' => '0',
                            ];
                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                            },
                            'news-column-delete' => function($url, $model, $key){
                            $options = [
                                'title' => Yii::t('yii', 'Delete'),
                                'aria-label' => Yii::t('yii', 'Delete'),
                                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ];
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                            },
                        ],
                    ],
                ],
            ]);?>
        </fieldset>
</div>