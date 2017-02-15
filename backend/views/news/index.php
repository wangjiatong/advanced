<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>
<div class="span9">
          <div class="row-fluid">
                <div class="page-header">
                        <h1>新闻 <small>管理</small></h1>
                </div>
                        <fieldset>
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'id',
                                    'title',
                                    'column_id',
                                    'created_at',
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
                            ]);?>
                        </fieldset>
          </div>
</div>