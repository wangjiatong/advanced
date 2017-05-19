<?php
use yii\widgets\DetailView;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'access_name',
        'urls',
        'status',
        'created_time',
        'updated_time',
    ],
]); ?>
