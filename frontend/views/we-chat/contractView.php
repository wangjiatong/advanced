<?php
use common\models\Product;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="weui-form-preview">
    <div class="weui-form-preview__hd">
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">本金</label>
            <em class="weui-form-preview__value">¥<?= $model->capital ?></em>
        </div>
    </div>
    <div class="weui-form-preview__bd">
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">产品名称</label>
            <span class="weui-form-preview__value"><?= Product::findOne($model->product_id)->product_name ?></span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">成立时间</label>
            <span class="weui-form-preview__value"><?= $model->found_time ?></span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">到期时间</label>
            <span class="weui-form-preview__value"><?= $model->cash_time ?></span>
        </div>
        <div class="weui-form-preview__item">
            <label class="weui-form-preview__label">业绩比较基准</label>
            <span class="weui-form-preview__value">%<?= $model->interest_year ?></span>
        </div>
    </div>
    <div class="weui-form-preview__ft">
        <a class="weui-form-preview__btn weui-form-preview__btn_primary" href="javascript:history.back();">返回</a>
    </div>
</div>

