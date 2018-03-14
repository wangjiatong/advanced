<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Product;
use common\models\UserModel;
use backend\controllers\common\BaseController;
use backend\models\Admin;
use kartik\select2\Select2;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use common\models\Contract;
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
    <div class="grid_3 grid_5">    
        <h3>
            <?= Html::encode($this->title) ?>
            <?= Html::a('创建合同', '#', [
                'id' => 'create',
                'data-toggle' => 'modal',
                'data-target' => '#create-modal',
                'class' => 'btn btn-success',
            ]) ?>
            <?php
                if(in_array('contract/index', Yii::$app->session['allowed_urls'])){
                    echo Html::a('导出当月数据', '/contract/generate-current-month-excel', [
                        'class' => 'btn btn-primary',
                    ]); 
                }
            ?>
        </h3>
    <div class="but-list">
	   <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
	       <ul id="myTab" class="nav nav-tabs" role="tablist">
    	       <li role="presentation" class="active"><a href="#fixed" id="fixed-tab" role="tab" data-toggle="tab" aria-controls="fixed" aria-expanded="true">固定收益</a></li>
    	       <li role="presentation"><a href="#equity" role="tab" id="equity-tab" data-toggle="tab" aria-controls="equity">股权投资</a></li>
	       </ul>
	       <div id="myTabContent" class="tab-content">
		        <div role="tabpanel" class="tab-pane fade in active" id="fixed" aria-labelledby="fixed-tab">
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
                                'attribute' => 'contract.status',
                                'label' => '状态',
                                'value' => function($data)
                                {
                                    return $data->getStatus();
                                },    
                                'filter' => Select2::widget([
                                    'model' => $searchModel,
                                    'attribute' => 'status',
                                    'data' => [1 => '运行中', 0 => '已兑付'],
                                    'options' => [
                                        'placeholder' => '',
                                    ],
                                ]),
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
                        'tableOptions' => [
                            'class' => 'table table-bordered table-condensed table-hover',
                            'style' => 'table-layout: fixed;',
                        ],
                        'options' => [
                            'class' => 'table',  
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="equity" aria-labelledby="equity-tab">
                <?php Pjax::begin(); ?>    
                <?= GridView::widget([
                        'dataProvider' => $dataProvider2,
                        'filterModel' => $searchModel2,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            
                            'contract_number',
                            
                            [
                                'attribute' => 'user_name',
                                'value' => 'user.name',
                                'label' => '客户姓名',
                                'filter' => Select2::widget([
                                    'model' => $searchModel2,
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
                                    'model' => $searchModel2,
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
                                    'model' => $searchModel2,
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
                                'attribute' => 'equity_contract.status',
                                'label' => '状态',
                                'value' => function($data)
                                {
                                    return $data->status;
                                },    
                                'filter' => Select2::widget([
                                    'model' => $searchModel2,
                                    'attribute' => 'status',
                                    'data' => [1 => '投资期', 2 => '延长期', 3 => '退出期', 0 => '已兑付'],
                                    'options' => [
                                        'placeholder' => '',
                                    ],
                                    'hideSearch' => true,
                                ]),
                            ],
                            
                            [
                                'label' => '操作',
                                'format' => 'raw',
                                'value' => function($data){
                                    $url = BaseController::checkUrlAccess('contract/equity-view', 'contract/my-equity-view');
                                    return Html::a('详情', $url."?id=".$data->id, ['class' => 'btn btn-info']);
                                },
                            ],
                        ],
                        'tableOptions' => [
                            'class' => 'table table-bordered table-condensed table-hover',
                            'style' => 'table-layout: fixed;',
                        ],
                        'options' => [
                            'class' => 'table',  
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
//选择创建合同类型弹窗
Modal::begin([
    'id' => 'create-modal',
    'header' => '<h4 class="modal-title">创建合同</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">关闭</a>',
]);
Modal::end();

$selectModalUrl = Url::to('select-modal');
$selectModalJs = <<<selectModalJs
$('#create').click(function(){
    $.get(
        '{$selectModalUrl}', 
        {},
        function (data) {
            $('.modal-body').html(data);
        }
    );
});
selectModalJs;
$this->registerJs($selectModalJs);
?>
<script>
// 保证选择tab后刷新不重新加载默认tab
$(document).ready(function() {
    if(location.hash) {
        $('a[href="' + location.hash + '"]').tab('show');
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
        location.hash = this.getAttribute("href");
    });
});
$(window).on('unload', function() {
    var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
    $('a[href=' + anchor + ']').tab('show');
});
</script>
