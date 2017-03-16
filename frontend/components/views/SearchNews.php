<?php

/* @var $this yii\web\View */
//分页页码
use yii\widgets\LinkPager;
?>
<div class="widget">
    	<div class="blog-page main grid-wrap">

            <header class="grid col-full">
                    <p class="fleft">新闻搜索结果</p>
            </header>


            <section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
                <?php 
                foreach($models as $model)
                {?>
                        <article class="post">
                            <h2><a href="/site/article/<?=$model['id']?>" class="post-title"><?=$model['title']?></a></h2>
                            <div class="meta">
                                <p>发布时间： <span class="time"><?=$model['created_at']?></span> &nbsp;新闻栏目： <a href="<?=\Yii::$app->urlManager->createUrl(['site/news-column', 'id' => $model['column_id']])?>"class="cat"><?php if($model['column_id']==27){echo "公司动态";}else if($model['column_id']==28){echo "研究报告";}else{echo "媒体报道";}?></a> </p>
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
                        'hideOnSinglePage' => true, 
//                        'firstPageLabel' => '首页',
//                        'lastPageLabel' => '尾页',
//                        'prevPageLabel' => false,
//                        'nextPageLabel' => false,
//                        'options' => ['class' => 'page-numbers'],
//                        'disabledPageCssClass' => '',
                        'maxButtonCount' => 5,
                    ]);?>


            </section>



		
		
		
	</div> <!--main-->
</div>
