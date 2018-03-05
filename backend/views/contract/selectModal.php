<?php 
use yii\bootstrap\Html;
echo Html::a('固定收益', ['create'], ['class' => 'btn btn-success']);
echo '&nbsp;';
echo Html::a('股权投资', ['create-equity'], ['class' => 'btn btn-success']);
?>