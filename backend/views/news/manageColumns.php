<?php
use yii\grid\GridView;
?>
<div class="span9">
          <div class="row-fluid">
                <div class="page-header">
                        <h1>新闻分类 <small>管理</small></h1>
                </div>
                        <fieldset>
                            <?=GridView::widget([
                                'dataProvider' => $dataProvider,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'id',
                                    'news_column',

                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]);?>
                        </fieldset>
          </div>
</div>