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
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <p>
                The above error occurred while the Web server was processing your request.
                </p>
                <p>
                Please contact us if you think this is a server error. Thank you.
                </p>
            </section>

    </div> <!--main-->

</div>
