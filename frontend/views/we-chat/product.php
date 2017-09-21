<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Url;
?>
<div class="weui-panel">
    <div class="weui-panel__hd">在售产品</div>
    <div class="weui-panel__bd">
        <div class="weui-media-box weui-media-box_small-appmsg">
            <?php foreach($product as $p): ?>
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="<?= Url::to(['product-view', 'openid' => $openid, 'id' => $p['id']]) ?>">
                    <div class="weui-cell__hd"><img src="<?= FRONTEND. '/' . $p['img'] ?>" alt="" style="width:20px;margin-right:5px;display:block"></div>
                    <div class="weui-cell__bd weui-cell_primary">
                        <p><?= $p['product_name'] ?></p>
                    </div>
                    <span class="weui-cell__ft"></span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
