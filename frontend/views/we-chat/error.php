<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="weui-msg">
    <div class="weui-msg__icon-area"><i class="weui-icon-warn weui-icon_msg"></i></div>
    <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">操作失败</h2>
        <p class="weui-msg__desc"><?= $msg ?></a></p>
    </div>
    <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
            <a href="<?= $url ?>" class="weui-btn weui-btn_primary">返回</a>
            <!--<a href="javascript:history.back();" class="weui-btn weui-btn_default">返回</a>-->
        </p>
    </div>
</div>

