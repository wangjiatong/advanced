<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Contract */

$this->title = '修改合同 ' . $model->id;
?>
<div class="contract-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
