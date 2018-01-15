<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserModel */

$this->title = '新增客户';
//$this->params['breadcrumbs'][] = ['label' => 'User Models', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

