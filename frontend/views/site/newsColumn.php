<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
//分页页码
use yii\widgets\LinkPager;
use frontend\components\NewsColumnNav;

$this->title = '新闻栏目';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('$(document).ready(function(){$("#news").addClass("navactive");});');
?>
<div class="site-news">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    	<div class="blog-page main grid-wrap">

            <header class="grid col-full">
                    <hr>
                    <p class="fleft"><?=$this->title?></p>
            </header>


            <section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
                <?php 
                foreach($models as $model)
                {?>
                        <article class="post">
                            <h2><a href="/site/article/<?=$model['id']?>" class="post-title"><?=$model['title']?></a></h2>
                            <div class="meta">
                                <p>发布时间： <span class="time"><?=$model['created_at']?></span> &nbsp;新闻栏目： <a href="<?=\Yii::$app->urlManager->createUrl(['site/news-column', 'id' => $model['column_id']])?>"class="cat"><?= $model->newsColumn['news_column']?></a> </p>
                            </div>
                            <div class="entry">
                                <?=$model['summary']?>
                            </div>
                            <footer>
                                    <a href="/site/article/<?=$model['id']?>" class="more-link">阅读全文</a>
                            </footer>
                    </article>
<?php
}
?>
                    <?= LinkPager::widget([
                        'pagination' => $pages,
                        'hideOnSinglePage' => false, 
//                        'firstPageLabel' => '首页',
//                        'lastPageLabel' => '尾页',
//                        'prevPageLabel' => false,
//                        'nextPageLabel' => false,
//                        'options' => ['class' => 'page-numbers'],
//                        'disabledPageCssClass' => '',
                        'maxButtonCount' => 5,
                    ]);?>
<!--                    <article class="post">
                            <h2><a href="#" class="post-title">2016翌银玖德高净值客户年终交流会-七彩云南昆明之行集锦2</a></h2>
                            <div class="meta">
                                    <p>发布于 <span class="time">12月 15日, 2016</span></p>
                            </div>
                            <div class="entry">
                                <p>由于客户较多，公司本次年终交流会分为2批，我们又于12月8日至12月11日与公司45位高净值客户前往昆明中信嘉丽泽度假村，参加一年一度的年终交流会，相互学习，共同成长。<br />DAY1  当天由于飞机晚点2个多小时，到达酒店时间已经将近5点，虽然很疲惫，但大家还是被眼前的美景所吸引。</p>
                            </div>
                            <footer>
                                    <a href="#" class="more-link">阅读全文</a>
                            </footer>
                    </article>-->

<!--                    <article class="post">
                            <h2><a href="#" class="post-title">Blog post</a></h2>
                            <div class="meta">
                                    <p>Posted on <span class="time">November 15, 2011</span> by <a href="#" class="fn">Sylvain Lafitte</a> in <a href="#"class="cat">Other</a> with <a href="#" class="comments-link">42 comments</a>.</p>
                            </div>
                            <div class="entry">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
                            </div>
                            <footer>
                                    <a href="#" class="more-link">Continue reading…</a>
                            </footer>
                    </article>

                    <article class="post">
                            <h2><a href="#" class="post-title">Blog post</a></h2>
                            <div class="meta">
                                    <p>Posted on <span class="time">November 15, 2011</span> by <a href="#" class="fn">Sylvain Lafitte</a> in <a href="#"class="cat">Other</a> with <a href="#" class="comments-link">42 comments</a>.</p>
                            </div>
                            <div class="entry">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
                            </div>
                            <footer>
                                    <a href="#" class="more-link">Continue reading…</a>
                            </footer>
                    </article>

                    <article class="post">
                            <h2><a href="#" class="post-title">Blog post</a></h2>
                            <div class="meta">
                                    <p>Posted on <span class="time">November 15, 2011</span> by <a href="#" class="fn">Sylvain Lafitte</a> in <a href="#"class="cat">Other</a> with <a href="#" class="comments-link">42 comments</a>.</p>
                            </div>
                            <div class="entry">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
                            </div>
                            <footer>
                                    <a href="#" class="more-link">Continue reading…</a>
                            </footer>
                    </article>

                    <article class="post">
                            <h2><a href="#" class="post-title">Blog post</a></h2>
                            <div class="meta">
                                    <p>Posted on <span class="time">November 15, 2011</span> by <a href="#" class="fn">Sylvain Lafitte</a> in <a href="#"class="cat">Other</a> with <a href="#" class="comments-link">42 comments</a>.</p>
                            </div>
                            <div class="entry">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit. Nulla facilisi. Nulla libero. Vivamus pharetra posuere sapien. Nam consectetuer. Sed aliquam, nunc eget euismod ullamcorper, lectus nunc ullamcorper orci, fermentum bibendum enim nibh eget ipsum. Donec porttitor ligula eu dolor. Maecenas vitae nulla consequat libero cursus venenatis. Nam magna enim, accumsan eu, blandit sed, blandit a, eros.</p>
                            </div>
                            <footer>
                                    <a href="#" class="more-link">Continue reading…</a>
                            </footer>
                    </article>			-->

<!--                    <ul class="page-numbers">
                            <li><a href="#">前一页</a></li>
                            <li><a href="#" class="current">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">后一页</a></li>
                    </ul>-->

            </section>

            <aside class="grid col-one-quarter mq2-col-one-third mq3-col-full blog-sidebar">

                    <div class="widget">
                            <input id="search" type="search" name="search" value="点击输入您要搜索的内容" >
                    </div>

<!--                    <div class="widget">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
                    </div>-->

<!--                    <div class="widget">
                    <h2>Popular Posts</h2>
                    <ul>
                            <li><a href="#" title="">Nullam porttitor elementum ligula</a></li>
                            <li><a href="#" title="">Vestibulum interdum</a></li>	
                            <li><a href="#" title="">Quisque venenatis ante sit amet dolor</a></li>		
                            <li><a href="#" title="">Aliquam adipiscing libero vitae leo</a></li>		
                            <li><a href="#" title="">Sed accumsan quam ac tellus</a></li>	
                    </ul>
                    </div>-->

<!--                    <div class="widget">
                    <h2>新闻栏目</h2>
                    <ul>
                            <li><a href="">公司动态</a></li>
                            <li><a href="">研究报告</a></li>
                            <li><a href="">媒体报道</a></li>
                            <li><a href=""></a></li>
                    </ul>
                    </div>-->
                    <?=NewsColumnNav::widget()?>
<!--                    <div class="widget">
                    <h2>Meta</h2>
                    <ul>
                            <li><a href="">Entries (RSS)</a></li>
                            <li><a href="">Comments (RSS)</a></li>
                    </ul>
                    </div>-->
            </aside>

		
		
		
	</div> <!--main-->
</div>
