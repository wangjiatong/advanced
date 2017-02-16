<?php
use frontend\components\NewsColumnNav;

$this->title = '新闻详情';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="blogpost-page main grid-wrap">

		<header class="grid col-full">
			<hr>
			<p class="fleft">新闻详情</p>
		</header>
		
				
		<section class="grid col-three-quarters mq2-col-two-thirds mq3-col-full">
			
				<article class="post post-single">
					<h2><?=$model->title?></h2>
					<div class="meta">
                                            <p>发布时间： <span class="time"><?=$model->created_at?></span> &nbsp;新闻栏目： <a href="<?=\Yii::$app->urlManager->createUrl(['site/news-column', 'id' => $model['column_id']])?>"class="cat"><?php if($model['column_id']==27){echo "公司动态";}else if($model['column_id']==28){echo "研究报告";}else{echo "媒体报道";}?></a> </p>
					</div>
					<div class="entry">
						<?=$model->content?>
					</div>
					
				</article>					
		</section>
	
		            <aside class="grid col-one-quarter mq2-col-one-third mq3-col-full blog-sidebar">

                    <div class="widget">
                            <input id="search" type="search" name="search" value="点击输入您要搜索的内容" >
                    </div>

                    <?=NewsColumnNav::widget()?>

            </aside>

		
		
		

	</div> <!--main-->