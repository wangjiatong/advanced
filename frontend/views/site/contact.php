<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\Alert;

$this->title = '联系我们';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('$(document).ready(function(){$("#contact").addClass("navactive");});');
?>
<div class="site-contact">

    <div class="contact-page main grid-wrap">

        <header class="grid col-full">
                <hr>
                <p class="fleft">联系我们</p>
        </header>



        <aside class="grid col-one-quarter mq2-col-one-third mq3-col-full">

                <p class="mbottom">您可以通过以下联系方式直接联系我们，或者提交右侧表单信息，我们将尽快与您取得联系！</p>

                <address class="mbottom">
                        <h5>上海市 浦东新区 </h5>
                        杨高南路428号 由由世纪广场 <br >
                        2号楼 7楼 A/B室<br >
                        <a href="http://map.baidu.com/?newmap=1&s=inf%26uid%3Dbf7aa829cad89da716a190fc%26wd%3D%E7%94%B1%E7%94%B1%E4%B8%96%E7%BA%AA%E5%B9%BF%E5%9C%BA%26all%3D1%26c%3D289&from=alamap&tpl=map_singlepoint">从地图中查看</a>
                </address>

                <p class="mbottom">
                        电话：021-50623509<br >
                        邮编：200127</p>

                <p class="mbottom">
                        扫描下方二维码<br />
                        关注我们的微信公众号<br />
                <img src="/img/erweima.jpg">
                </p>
                <p>
                        <h6>工作时间 </h6>
                        周一到周五 <br >
                        9:30 —— 17:30
                </p>

        </aside>

        <section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
                <h2>给我们留言</h2>
                    <div>
                        <?php 
                        if(Yii::$app->getSession()->getFlash('success'))
                        {
                            echo Alert::widget([
                                'options' => [
                                        'class' => 'alert-success', //这里是提示框的class
                                ],
                                'body' => Yii::$app->getSession()->getFlash('success'), //消息体
                            ]);
                        }elseif(Yii::$app->getSession()->getFlash('success'))
                        {
                            echo Alert::widget([
                                'options' => [
                                        'class' => 'alert-error',
                                ],
                                'body' => Yii::$app->getSession()->getFlash('error'),
                            ]);
                        }
                        ?>
                    </div>   

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('您的姓名') ?>

                <?= $form->field($model, 'email')->label('您的邮箱') ?>

                <?= $form->field($model, 'subject')->label('主题') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('正文内容') ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-3">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </section>

		
    </div> <!--main-->

</div>
