<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductColumnsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品分类管理';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-columns-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_searchProductColumns', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增产品分类', ['product-column-create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'product_column',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{product-column-view}{product-column-update}{product-column-delete}',
                'buttons' => [
                    'product-column-view' => function($url, $model, $key){
                    $options = [
                        'title' => Yii::t('yii', 'View'),
                        'aria-label' => Yii::t('yii', 'View'),
                        'data-pjax' => '0',
                    ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    },
                    'product-column-update' => function($url, $model, $key){
                    $options = [
                        'title' => Yii::t('yii', 'Update'),
                        'aria-label' => Yii::t('yii', 'Update'),
                        'data-pjax' => '0',
                    ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                    },
                    'product-column-delete' => function($url, $model, $key){
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
    ]); ?>
</div>
