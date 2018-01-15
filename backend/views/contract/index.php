<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Product;
use common\models\UserModel;
use backend\controllers\common\BaseController;
use backend\models\Admin;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ContractSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//通过用户访问的uri确定用户可搜索的客户范围
$uri = Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
switch ($uri)
{
    case 'contract/index': 
        $user_list = UserModel::find()->select('name')->indexBy('name')->column(); 
        $this->title = '合同管理';
        break;
    case 'contract/my-contract': 
        $user_list = UserModel::find()->select('name')->where(['source' => Yii::$app->user->identity->id])->indexBy('name')->column(); 
        $this->title = '我的合同';
        break;     
}
?>
<div class="contract-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增合同', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php Pjax::begin(); ?>    
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                
                'contract_number',
                
                [
                    'attribute' => 'user_name',
                    'value' => 'user.name',
                    'label' => '客户姓名',
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'user_name',
                        'data' => $user_list,
                        'options' => [
                            'placeholder' => '',
                        ],
                    ]),
                ],
                
                [
                    'attribute' => 'product_name',
                    'value' => 'product.product_name',
                    'label' => '产品名称', 
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'product_name',
                        'data' => Product::find()->select('product_name')->indexBy('product_name')->column(),
                        'options' => [
                            'placeholder' => '',
                        ],
                    ]),
                ],
                
                [
                    'attribute' => 'admin_name',
                    'value' => 'admin.name',
                    'label' => '客户经理', 
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'admin_name',
                        'data' => Admin::find()->select('name')->indexBy('name')->column(),
                        'options' => [
                            'placeholder' => '',
                        ],
                    ]),
                    'visible' => $uri == 'contract/index',
                ],
                
                'found_time',
                
                [
                    'label' => '浮动利率',
                    'value' => function($data){
                        if($data->if_float == 0 && $data->float_interest == 0)
                        {
                            return "不含";
                        }elseif($data->if_float == 1 && $data->float_interest == 0)
                        {
                            return "尚未追加";
                        }else{
                            return $data->float_interest;
                        }
                    }    
                ],
                
                [
                    'label' => '状态',
                    'value' => function($data)
                    {
                        return $data->getStatus();
                    }    
                ],
                
                [
                    'label' => '操作',
                    'format' => 'raw',
                    'value' => function($data){
                        $url = BaseController::checkUrlAccess('contract/view', 'contract/my-view');
                        return Html::a('详情', $url."?id=".$data->id, ['class' => 'btn btn-info']);
                    },
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
    
</div>
