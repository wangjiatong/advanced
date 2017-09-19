<?php
use common\models\Product;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="weui-panel weui-panel_access">
    <div class="weui-panel__hd">我的合同</div>
    <!-- 合同缩略 开始 -->
    <?php foreach($contract as $c): ?> 
    <div class="weui-panel__bd">
        <a href="<?= Url::to(['we-chat/contract-view', 'openid' => $openid, 'contract_id' => $c['id']]) ?>" class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="<?= FRONTEND . '/' . Product::findOne($c['product_id'])->img ?>" alt="">
            </div>
            <div class="weui-media-box__bd">
                <h4 class="weui-media-box__title"><?= Product::findOne($c['product_id'])->product_name ?></h4>
                <p class="weui-media-box__desc"><?= $c['capital'] . '元' ?></p>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
    <!-- 合同缩略 开始 -->
    <!-- 查看更多 开始 -->
    <div class="weui-panel__ft">
        <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
            <div class="weui-cell__bd">查看更多</div>
            <span class="weui-cell__ft"></span>
        </a>    
    </div>
    <!-- 查看更多 结束 -->
</div>

