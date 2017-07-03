<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Contract;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品管理';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增产品', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'product_name',
//            'product_column_id',
            [
                'label' => '产品分类',
                'attribute' => 'product_column_id',
                'value' => function($data){
                    return common\models\ProductColumn::findOne($data->product_column_id)->product_column;
                }
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
    ]); ?>
<?php Pjax::end(); ?></div>
