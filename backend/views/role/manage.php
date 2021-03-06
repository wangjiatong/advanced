<?php
use backend\models\Role;
use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$this->title = '撤销角色';
?>

<h3><?= $this->title ?></h3>

<div>
    <?php foreach($model as $m): ?>
    <tr>
        <td><?= Role::find()->where(['id' => $m->role_id])->one()->role_name; ?></td>
        <td><?= Html::a('删除', ['role/unset', 'id' => $m->id], ['class' => 'btn btn-danger btn-xs']); ?></td>
        <br />
        <br />
    </tr>
    <?php endforeach; ?>
</div>

