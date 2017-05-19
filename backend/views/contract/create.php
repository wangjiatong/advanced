<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Contract */

$this->title = '创建合同';
?>
<div class="contract-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
