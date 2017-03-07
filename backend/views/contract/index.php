<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ContractSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '合同管理';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建合同', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'contract_number',
            'capital',
            'transfered_time',
            'found_time',
            // 'raise_day',
            // 'raise_interest',
            // 'cash_time',
            // 'term_month',
            // 'interest',
            // 'term',
            // 'every_time',
            // 'every_interest',
            // 'total_interest',
            // 'total',
            // 'bank',
            // 'bank_number',
            // 'source',
            // 'created_at',
            // 'updated_at',
            // 'product_id',
            // 'user_id',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
