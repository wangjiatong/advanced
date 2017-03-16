<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Contract */

$this->title = '修改合同 ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('__form', [
        'model' => $model,
    ]) ?>

</div>