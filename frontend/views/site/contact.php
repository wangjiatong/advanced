<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '联系我们';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('$(document).ready(function(){$("#contact").addClass("navactive");});');
?>
<div class="site-contact">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->

<!--    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>-->
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
                        2号楼 7楼 <br >
                        A/B室<br >
                        <a href="http://map.baidu.com/?newmap=1&s=inf%26uid%3Dbf7aa829cad89da716a190fc%26wd%3D%E7%94%B1%E7%94%B1%E4%B8%96%E7%BA%AA%E5%B9%BF%E5%9C%BA%26all%3D1%26c%3D289&from=alamap&tpl=map_singlepoint">从地图中查看</a>
                </address>

                <p class="mbottom">
                        电话：021-50623509<br >
                        邮编：200127</p>
<!--                <p class="mbottom">
                        <a href="#">address@email.com</a><br >
                        <a href="#">Designa Studio on Facebook</a><br >
                        <a href="#">@designstudio on Twitter</a><br >
                        <a href="#">Designa Studio on Google+</a>
                </p>-->
                <p class="mbottom">
                        扫描下方二维码，<br />
                        关注我们的微信公众号<br />
                        <img src="#">
                </p>
                <p>
                        <h6>工作时间 </h6>
                        周一到周五 <br >
                        9:30 —— 17:30
                </p>

        </aside>

        <section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
                <h2>给我们留言</h2>
                <!--<p class="warning">Don't forget to put your own email address in the php file!</p>-->

                <form id="contact_form" class="contact_form" action="contact.php" method="post" name="contact_form">	
                        <ul>
                                <li>
                                        <label for="name">您的姓名:</label>
                                        <input type="text" name="name" id="name" required class="required" >
                                </li>
                                <li>
                                        <label for="email">邮箱:</label>
                                        <input type="email" name="email" id="email" required placeholder="YourName@163.com" class="required email">
                                </li>	
                                <li>
                                        <label for="message">留言:</label>
                                        <textarea name="message" id="message" cols="100" rows="6" required  class="required" ></textarea>
                                </li>
                                <li>
                                        <button type="submit" id="submit" name="submit" class="button fright">提交</button>
                                </li>	
                        </ul>			
                </form>
        </section>	
		
    </div> <!--main-->

</div>
