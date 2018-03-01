<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Contract;
use kartik\select2\Select2;
use common\models\Product;
use common\models\ProductColumn;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品管理';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h3>
        <?= Html::encode($this->title) ?>
        <?= Html::a('新增产品', ['create'], ['class' => 'btn btn-success']) ?>
    </h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                
                [
                    'attribute' => 'product_name',
                    'value' => 'product_name',
                    'label' => '产品名称',
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'product_name',
                        'data' => Product::find()->select('product_name', 'id')->indexBy('product_name')->column(),
                        'options' => [
                            'placeholder' => '',
                        ],
                    ]),
                ],
                
                [
                    'label' => '产品分类',
                    'attribute' => 'product_column_id',
                    'value' => 'productColumn.product_column',
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'product_column_id',
                        'data' => ProductColumn::find()->select('product_column')->indexBy('id')->column(),
                        'options' => [
                            'placeholder' => '',
                            
                        ],
                        'hideSearch' => true,
                    ]),    
                ],
                [
                    'label' => '产品状态',
                    'value' => function($data){
                        return $data->getStatus();  
                    },
                ],
                
                ['class' => 'yii\grid\ActionColumn'],
                
                [
                    'label' => '查看合同',
                    'format' => 'raw',
                    'value' => function($data){
                        $count = Contract::find()->where(['product_id' => $data->id])->count();
                        return Html::a('查看', ['product/contract-by-product', 'id' => $data->id], ['class' => 'btn btn-info']).'(共'.$count.'条记录)';
                    },
                ],
            ],
            'tableOptions' => [
                'class' => 'table table-bordered table-condensed table-hover',
            ],
            'options' => [
                'class' => 'table',
            ],
        ]); ?>
    <?php Pjax::end(); ?>
    
</div>
