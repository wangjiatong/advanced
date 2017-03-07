<?php

/* @var $this yii\web\View */

$this->title = '上海翌银玖德资产管理有限公司——官方网站';
$this->registerJs('$(document).ready(function(){$("#index").addClass("navactive");});');
use frontend\components\NewsFeed;
?>
<div class="home-page main">
    
<?=frontend\components\SpecialFront::widget()?>
    

    <section class="services grid-wrap">
            <header class="grid col-full">
                    <hr>
                    <p class="fleft">新闻动态</p>
                    <a href="/site/news" class="arrow fright">see more news</a>
            </header>
            <?=NewsFeed::widget()?>

    </section>

    <section class="works grid-wrap">
            <header class="grid col-full">
                            <hr>
                            <p class="fleft">旗下产品</p>
                            <a href="/site/products" class="arrow fright">see more products</a>
                    </header>

                            <figure class="grid col-one-quarter mq2-col-one-half">
                                    <a href="/site/fixed-income">
                                    <img src="img/gdsy.jpg" alt="">
                                    <span class="zoom"></span>
                                    </a>
                                    <figcaption>
                                            <a href="/site/fixed-income" class="arrow">固定收益</a>
                                            <p>可以按照银行定期存款、国库券等金融产<br />品的特性来理解“固定收益”的含义。</p>
                                    </figcaption>
                            </figure>

                            <figure class="grid col-one-quarter mq2-col-one-half">
                                    <a href="/site/private-placement">
                                    <img src="img/dxzf.jpg" alt="">
                                    <span class="zoom"></span>
                                    </a>
                                    <figcaption>
                                            <a href="/site/private-placement" class="arrow">定向增发</a>
                                            <p>定向增发是指上市公司向符合条件的少数<br />特定投资者非公开发行股份的行为。</p>
                                    </figcaption>
                            </figure>

                            <figure class="grid col-one-quarter mq2-col-one-half">
                                    <a href="/site/equity-investment">
                                    <img src="img/gqtz.jpg" alt="">
                                    <span class="zoom"></span>
                                    </a>
                                    <figcaption>
                                            <a href="/site/equity-investment" class="arrow">股权投资</a>
                                            <p>股权投资通常是为长期(至少一年)持有一<br />个公司的股票或长期的投资一个公司。</p>
                                    </figcaption>
                            </figure>

                            <figure class="grid col-one-quarter mq2-col-one-half">
                                    <a href="#">
                                    <img src="img/zanwu.jpg" alt="">
                                    <span class="zoom"></span>
                                    </a>
                                    <figcaption>
                                            <a href="#" class="arrow">敬请期待</a>
                                            <p>To be continued...</p>
                                    </figcaption>
                            </figure>
            </section>
</div> <!--main-->