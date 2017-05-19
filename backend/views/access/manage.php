<?php
use backend\models\Access;
use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div>
    <?php foreach($model as $m): ?>
    <tr>
        <td><?= Access::find()->where(['id' => $m->access_id])->one()->access_name; ?></td>
        <td><?= Html::a('删除', ['access/unset', 'id' => $m->id]); ?></td>
    </tr>
    <?php endforeach; ?>
</div>