<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>你好， <?= Html::encode(Yii::$app->user->identity->name) ?>,</p>

    <p>下面是修改密码的链接：</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
