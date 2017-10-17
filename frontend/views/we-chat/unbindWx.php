<?php
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="weui-msg">
    <div class="weui-msg__icon-area"><i class="weui-icon-warn weui-icon_msg"></i></div>
    <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">取消绑定</h2>
        <p class="weui-msg__desc">该操作适用于当您需要更换所绑定的微信号时进行。取消绑定后，您将需要通过账号密码重新绑定。</p>
    </div>
    <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
            <a href="<?= Url::to(['we-chat/unbind-wx-relation', 'openid' => $openid]) ?>" class="weui-btn weui-btn_primary">确定</a>
            <a href="javascript:history.back();" class="weui-btn weui-btn_default">返回</a>
        </p>
    </div>
</div>
<script>
$(function(){ 
    pushHistory(); 
    window.addEventListener("popstate", function(e) { 
        pushHistory(); 
        var ua = navigator.userAgent.toLowerCase(); 
        if(ua.match(/MicroMessenger/i)=="micromessenger") 
        { 
            WeixinJSBridge.call('closeWindow'); 
        } else if(ua.indexOf("alipay")!=-1){ 
            AlipayJSBridge.call('closeWebview'); 
        }else if(ua.indexOf("baidu")!=-1){ 
            BLightApp.closeWindow(); 
        } 
        else{ 
            window.close(); 
        } 
    }, false); 
    function pushHistory() { 
        var state = { 
            title: "title", 
            url: "#" 
        }; 
        window.history.pushState(state, "title", "#"); 
    } 
});
</script>