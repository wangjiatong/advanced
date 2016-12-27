<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '加入我们';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('$(document).ready(function(){$("#join").addClass("navactive");});');
?>
<div class="site-join us">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    	<div class="about-page main grid-wrap">

            <header class="grid col-full">
            <hr>
                    <p class="fleft">加入我们</p>
            </header>



            <aside class="grid col-one-quarter mq2-col-full">
                    <p class="mbottom">诚邀有志之士与我们共同铸造辉煌。
                    </p>
                    <menu>
                            <ul>
                                    <li><a href="#navteam" class="arrow">销售</a></li>
<!--                                    <li><a href="#navphilo" class="arrow">Our philosophy</a></li>
                                    <li><a href="#navplace" class="arrow">Our place</a></li>
                                    <li><a href="#navother" class="arrow">Our lorem</a></li>-->
                            </ul>
                    </menu>
            </aside>

            <section class="grid col-three-quarters mq2-col-full">
                    <img src="/img/team.jpg" alt="" >

                    <article id="navteam">
                    <h2>销售</h2>
                    <p>岗位职责：<br />

1）35周岁（含）以下，原则上全日制本科及以上学历毕业； <br />

2）具有高度责任心与事业心，具备良好的金融、经济知识背景与学习能力；<br />

3）性格外向，吃苦耐劳，具有良好沟通能力、自律能力、团队协作能力、主动营销意识；<br />

4）银行/证券/保险等相关金融工作经验者优先。 </p>
                    <p>岗位要求： <br />

1）拓展和维护高净值客户； <br />

2）主动积极向潜在客户营销公司产品，为客户提供专业化咨询、建议与方案。</p>
                    </article>

<!--                    <article id="navphilo">
                    <h2>Our philosophy</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
                    </article>

                    <article id="navplace">
                    <h2>Our place</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
                    </article>

                    <article id="navother">
                    <h2>Our lorem</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
                    </article>-->

            </section>
		
	</div> <!--main-->
</div>