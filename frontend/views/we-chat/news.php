<?php
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="weui-panel weui-panel_access">
    <div class="weui-panel__hd">新闻动态</div>
    <div class="weui-panel__bd">
        <?php foreach ($model as $m): ?>
        <div class="weui-media-box weui-media-box_text" onclick="window.open('<?= Url::to(['we-chat/article', 'id' => $m->id ]) ?>', '_self')">
            <h4 class="weui-media-box__title"><?= $m->title ?></h4>
            <p class="weui-media-box__desc"><?= $m->summary ?></p>
        </div>
        <?php endforeach; ?>
        <div class="weui-panel__ft">
            <a href="" class="weui-cell weui-cell_access weui-cell_link">
                <div class="weui-cell__bd">查看更多</div>
                <span class="weui-cell__ft"></span>
            </a>
        </div>
    </div>
</div>
