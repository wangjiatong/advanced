<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Admin;
use common\models\Product;
use common\models\UserModel;
use common\models\Contract;

$pdfUrl = "<embed width='1000' height='750' src='/$model->pdf'></embed>";


/* @var $this yii\web\View */
/* @var $model common\models\Contract */

$this->title = '合同详情：'.$model->contract_number;

?>
<div class="contract-view">

    <h1><?= Html::encode($this->title) ?>        
        <?= Html::a('删除合同', ['my-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除该合同吗？',
                'method' => 'post',
            ],
        ]) ?>
    </h1>
    <p></p>
    <div class='table-responsive table-hover table-condensed'>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="info">本金</td>
                    <td><?= $model->capital ?></td>
                    <td class="info">到账时间</td>
                    <td><?= $model->transfered_time ?></td>
                    <td class="info">成立时间</td>
                    <td><?= $model->found_time ?></td>
                </tr>
                <tr>
                    <td>募集天数</td>
                    <td><?= $model->raise_day ?>天</td>
                    <td>募集期年利率</td>
                    <td><?= $model->raise_interest_year ?>%</td>
                    <td>募集期利息</td>
                    <td><?= $model->raise_interest ?>元</td>
                </tr>
                <tr>
                    <td class="info">兑付时间</td>
                    <td><?= $model->cash_time ?></td>
                    <td class="info">期限</td>
                    <td><?= $model->term_month ?>个月</td>
                    <td class="info">年利率</td>
                    <td><?= $model->interest_year ?>%</td>
                </tr>
                <tr>
                    <td>成立期利息</td>
                    <td><?= $model->interest ?></td>
                    <td>付息频率</td>
                    <td>
                        <?php
                        switch($model->term)
                        {
                            case 1: echo '按月';                            break;
                            case 3: echo '季度';                            break;
                            case 6: echo '半年';                            break;
                            case 0: echo '一次性';                          break;
                        }
                        ?>
                    </td>  
                    <td>是否含有浮动利率</td>
                    <td>
                    <?= $model->if_float == 0 ? "否" : "是" ?>
                    <?php
                        if($model->if_float == 0)
                        {
                            echo Html::a('改为浮动利率', ['contract/set-float', 'id' => $model->id, 'status' => 1], [
                                'class' => 'btn btn-success', 
                                'data' => [
                                    'confirm' => '你确定要改为含浮动利率吗？',
                                    'method' => 'post',
                                ],
                            ]);
                        }else{
                            echo Html::a('取消', ['contract/set-float', 'id' => $model->id, 'status' => 0], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => '你确定要取消浮动利率吗？',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    ?>
                    </td> 
                </tr>       
                <tr>
                    <td class="info">每期到期时间</td>
                    <?php
                        $eve_time = explode(', ', $model->every_time);
                        $eve_int = explode(', ', $model->every_interest);
                        $eve_time_int = array_combine($eve_time, $eve_int);
                        foreach($eve_time_int as $key => $val):
                    ?>
                    <td><?= $key ?></td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td>每期应付利息</td>
                    <?php
                        foreach($eve_time_int as $key => $val):
                    ?>
                    <td><?= $val ?></td>
                    <?php endforeach; ?>
                </tr>      
                <tr>
                    <td class="info">浮动利息</td>
                    <td colspan="5">
                    <?= $model->float_interest == 0 ? "尚未追加" : $model->float_interest ?>
                    <?php
                        if($model->if_float == 0)
                        {
                            echo Html::a('改为浮动利率', ['contract/set-float', 'id' => $model->id, 'status' => 1], [
                                'class' => 'btn btn-success',
                                'data' => [
                                    'confirm' => '你确定要改为含浮动利率吗？',
                                    'method' => 'post',
                                ],
                            ]);
                        }else{
                            if($model->float_interest == 0)
                            {
                                echo Html::a('追加', ['contract/set-float-interest', 'id' => $model->id], [
                                    'class' => 'btn btn-success',
                                    'data' => [
                                        'confirm' => '你确定要追加浮动利息吗？',
                                        'method' => 'post',
                                    ],
                                ]);
                            }else{
                                echo Html::a('修改', ['contract/set-float-interest', 'id' => $model->id], [
                                    'class' => 'btn btn-primary',
                                    'data' => [
                                        'confirm' => '你确定要修改浮动利息吗？',
                                        'method' => 'post',
                                    ],
                                ]);
                            }
                        }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>应付利息总额</td>
                    <td><?= $model->total_interest ?></td>
                    <td>兑付总额</td>
                    <td><?= $model->total ?></td>
                    <td>开户行</td>
                    <td><?= $model->bank ?></td>
                </tr>
                <tr>
                    <td class="info">开户名</td>
                    <td><?= $model->bank_user ?></td>
                    <td class="info">银行账号</td>
                    <td><?= $model->bank_number ?></td>
                    <td class="info">客户经理</td>
                    <td><?= Admin::findOne($model->source)->name ?></td>
                </tr>
                <tr>
                    <td>客户姓名</td>
                    <td><?= UserModel::findOne($model->user_id)->name ?></td>
                    <td>产品名称</td>
                    <td><?= Product::findOne($model->product_id)->product_name ?></td>
                    <td>创建时间</td>
                    <td><?= $model->created_at ?></td>
                </tr>
                <tr>
                    <td class="info">合同状态</td>
                    <td colspan="5">
                        <?php 
                            if($model->status)
                            {
                                echo Contract::contractValidation($model->status);
                            }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'contract_number',
//            'capital',
//            'transfered_time',
//            'found_time',
//            'raise_day',
//            'raise_interest_year',
//            'raise_interest',
//            'cash_time',
//            'term_month',
//            'interest_year',
//            'interest',
////            'term',
//            [
//                'label' => '付息频率',
//                'value' => function($data){
//                    switch($data->term)
//                    {
//                        case 1: return '按月';                            break;
//                        case 3: return '季度';                            break;
//                        case 6: return '半年';                            break;
//                        case 0: return '一次性';                          break;
//                    }
//                },
//            ],
//            'every_time',
//            'every_interest',
//            'total_interest',
//            'total',
//            'bank',
//            'bank_user',
//            'bank_number',
////            'source',
//            [
//                'label' => '客户经理',
//                'value' => function($data){
//                    if($data->source)
//                    {
//                        return Admin::findOne($data->source)->name;
//                    }else{
//                        return null;
//                    }
//                },
//            ],
//            'created_at',
////            'updated_at',
////            'product_id',
//            [
//                'label' => '产品名称',
////                'attribute' => 'product_id',
//                'value' => function($data){
//                    if($data->product_id)
//                    {
//                        return Product::findOne($data->product_id)->product_name;
//                    }else{
//                        return null;
//                    }
//                },
//            ],
////            'user_id',
//            [
//                'label' => '客户姓名',
////                'attribute' => 'user_id',
//                'value' => function($data){
//                    if($data->user_id)
//                    {
//                        return UserModel::findOne($data->user_id)->name;
//                    }else{
//                        return null;
//                    }
//                },
//            ],
////            'status',
//            [
//                'label' => '合同状态',
////                'attribute' => 'status',
//                'value' => function($data){
//                    if($data->status)
//                    {
//                        return Contract::contractValidation($data->status);
//                    }else{
//                        return null;
//                    }
//                },
//            ],
//            'pdf',
            [
                'label' => '删除确认函扫描件',
                'format' => 'raw',
                'value' => $model->pdf !== null ? Html::a('删除确认函', ['contract/delete-confirmation', 'id' => $model->id], [
                                'class' => 'btn btn-danger', 
                                'data' => [
                                        'confirm' => '您确定要删除该确认函吗？',
                                ],
                            ]) : '暂未上传，无法删除。',
            ],
            [
                'label' => '确认函扫描件',
                'format' => 'raw',
                'value' => $model->pdf == null ? Html::a('上传', ['contract/upload-confirmation', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']) : $pdfUrl,
            ],
        ],
    ]) ?>

</div>
