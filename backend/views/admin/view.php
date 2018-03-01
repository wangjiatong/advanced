<?php
use yii\widgets\DetailView;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $this->title = '账户详情';
?>
<h3><?= $this->title ?></h3>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username',
        'name',
        'email',
        'status',
        'created_at:datetime',
        'updated_at:datetime',
    ],
]); ?>
