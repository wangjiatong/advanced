<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <div class="about-page main grid-wrap">

            <header class="grid col-full">
            <hr>
                    <p class="fleft">错误</p>
            </header>

            <section class="grid col-three-quarters mq2-col-full">
                <div class="alert alert-danger">
                    <?= nl2br(Html::encode('您所访问的页面不存在！')) ?>
                </div>

                <p>
                上述错误在您发出请求时产生。
                </p>
                <p>
                如果您认为是服务器问题请与我们取得联系，谢谢！
                </p>
                <a href="/">点击此处，返回首页。</a>
            </section>

    </div> <!--main-->

</div>
