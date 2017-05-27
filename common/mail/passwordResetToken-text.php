<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
你好， <?= Yii::$app->user->identity->name ?>,

下面是修改密码的链接：

<?= $resetLink ?>
