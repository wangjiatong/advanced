<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '旗下产品';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('$(document).ready(function(){$("#products").addClass("navactive");});');
?>
<div class="site-products">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <div class="works-page main grid-wrap">

        <header class="grid col-full">
                <hr>
                <p class="fleft">旗下产品</p>
        </header>


        <aside class="grid col-one-quarter mq2-col-full">
                <!--<p class="mbottom">Keep the same size ratio for thumbnails to avoid breaking the grid because of the margin-bottom.</p>-->
                <menu>
                    <p>产品分类</p>
                    <a  id="work_all" class="arrow buttonactive" href="/product">所有</a><br>
                        <?php foreach ($column as $c){?>
                        <a  id="work_1" class="arrow" href="/product/product-column?id=<?=$c->id?>"><?= $c->product_column ?></a><br>
                        <?php } ?>
<!--                        <a  id="work_2" class="arrow">定向增发</a><br>
                        <a  id="work_3" class="arrow">股权投资</a>-->
                </menu>
        </aside>

        <section class="grid col-three-quarters mq2-col-full">

                                <div class="grid-wrap works">

                        <?php  foreach ($model as $m){?>
                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full">
                                <a href="/product/view?id=<?=$m->id?>&product_column_id=<?=$m->product_column_id?>" >
                                        <img src="<?=$m->img?>" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="/product/view/<?=$m->id?>" class="arrow"><?=$m->product_name?></a>
                                        <!--<p>Lorem ipsum dolor set amet</p>-->
                                </figcaption>
                        </figure>
                        <?php } ?>
                </div> <!-- grid inside 3/4-->

        </section>	
    </div> <!--main-->
</div>