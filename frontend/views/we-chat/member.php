<?php
use common\models\WxUser;
use common\models\UserModel;
use common\models\UserWx;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->registerCss("div.info{background: url(/img/wx/personal-bg.jpg) ; width: 100%; float:left; } div.info img{width: 70px; height: 70px; padding: 20px; float:left; }");
?>
<div class="info">
    <img src="<?= WxUser::findOne(['openid' => $openid])->headimgurl ?>" />
</div>
<div class="weui-cells__title" style="background: #F0EFF5; padding-top: 5px; padding-bottom: 5px; margin: 0px;">服务</div>
<div class="weui-grids">
    <a href="<?= Url::to(['we-chat/contract', 'openid' => $openid]) ?>" class="weui-grid">
        <div class="weui-grid__icon">
            <img src="/img/wx/hetong.png" alt>
        </div>
        <p class="weui-grid__label">我的合同</p>
    </a>
    <a href="<?= Url::to(['we-chat/product', 'openid' => $openid]) ?>" class="weui-grid">
        <div class="weui-grid__icon">
            <img src="/img/wx/liebiao.png" alt>
        </div>
        <p class="weui-grid__label">在售产品</p>
    </a>
    <a href="<?= Url::to(['we-chat/call', 'openid' => $openid]) ?>" class="weui-grid" id="showIOSActionSheet">
        <div class="weui-grid__icon">
            <img src="/img/wx/dianhua.png" alt>
        </div>
        <p class="weui-grid__label">预约财富</p>
    </a>
    <a href="<?= Url::to(['we-chat/advice', 'openid' => $openid]) ?>" class="weui-grid">
        <div class="weui-grid__icon">
            <img src="/img/wx/xinfeng.png" alt>
        </div>
        <p class="weui-grid__label">意见建议</p>
    </a>
</div>
<div class="weui-cells__title" style="background: #F0EFF5; padding-top: 5px; padding-bottom: 5px; margin: 0px;">账号</div>
<div class="weui-grids">
    <a href="<?= Url::to(['we-chat/change-password', 'openid' => $openid]) ?>" class="weui-grid">
        <div class="weui-grid__icon">
            <img src="/img/wx/yaoshi.png" alt>
        </div>
        <p class="weui-grid__label">修改密码</p>
    </a>
    <a href="<?= Url::to(['we-chat/unbind-wx', 'openid' => $openid]) ?>" class="weui-grid">
        <div class="weui-grid__icon">
            <img src="/img/wx/huixingzhen.png" alt>
        </div>
        <p class="weui-grid__label">取消绑定</p>
    </a>
</div>