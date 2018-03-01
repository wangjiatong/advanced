<?php
use yii\grid\GridView;
use yii\helpers\Html;
use common\models\News;

$this->title = '新闻管理';
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'title',
        [
            'label'=> '新闻分类',
            'attribute' => 'column_id',
            'value' => function($data){
                return News::findOne($data)->newsColumn['news_column'];
            },
        ],
        'created_at:date',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{news-view}{news-update}{news-delete}',
            'buttons' => [
                'news-view' => function($url, $model, $key){
                $options = [
                    'title' => Yii::t('yii', 'View'),
                    'aria-label' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                ];
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                },
                'news-update' => function($url, $model, $key){
                $options = [
                    'title' => Yii::t('yii', 'Update'),
                    'aria-label' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                ];
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                },
                'news-delete' => function($url, $model, $key){
                $options = [
                    'title' => Yii::t('yii', 'Delete'),
                    'aria-label' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ];
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                },
            ]
        ],
    ],
    'options' => [
        'class' => 'table',
    ],
    'tableOptions' => [
        'class' =>'table table-hover table-bordered',
    ],
]);?>
