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
					
<!--				<section class="section-comment">
				
					<header>
						<hr>
						<h5 class="fleft">42 Comments</h5> <p class="fright"><a href="#leavecomment" class="arrow">Leave your comment</a></p>
					</header>
				
					<ol class="comments">
						<li class="comment">
							<h6>John Doe <span class="meta"> on 18/02/12</span></h6>
							<p>Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
						</li>
						
						<li class="comment">
							<h6>John Doe <span class="meta"> on 18/02/12</span></h6>
							<p>Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
						</li>
						
						<li class="comment">
							<h6>John Doe <span class="meta"> on 18/02/12</span></h6>
							<p>Lorem ipsum dolor set amet.</p>
						</li>
						
						<li class="comment">
							<h6>John Doe <span class="meta"> on 18/02/12</span></h6>
							<p>Vivamus pharetra posuere sapien. Nam consectetuer.</p>
						</li>
						
						<li class="comment">
							<h6>John Doe <span class="meta"> on 18/02/12</span></h6>
							<p>Yep!</p>
						</li>
				
					</ol>
			
					
			<div class="leavecomment" id="leavecomment">
				<h3>Leave your comment</h3>
				<form id="#" class="#" action="#" method="post" name="#">
					<ul>
						<li>
							<label for="name">Your name:</label>
							<input type="text" name="name" id="name" required class="required" >
						</li>
						<li>
							<label for="email">Email:</label>
							<input type="email" name="email" id="email" required placeholder="JohnDoe@gmail.com" class="required email">
						</li>	
						<li>
							<label for="message">Message:</label>
							<textarea name="message" id="message" cols="100" rows="6" required  class="required" ></textarea>
						</li>
						<li>
							<button type="submit" id="submit" class="button fright">Send it</button>
						</li>	
					</ul>			
				</form>
			</div>
				
		</section>-->
			
		
		</section>

<!--		<aside class="grid col-one-quarter mq2-col-one-third mq3-col-full blog-sidebar">
				
			<div class="widget">
			<input id="search" type="search" name="search" value="Type and hit enter to search" >
			</div>
			
			<div class="widget">
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim.</p>
			</div>
			
			<div class="widget">
			<h2>Popular Posts</h2>
			<ul>
				<li><a href="#" title="">Nullam porttitor elementum ligula</a></li>
				<li><a href="#" title="">Vestibulum interdum</a></li>	
				<li><a href="#" title="">Quisque venenatis ante sit amet dolor</a></li>		
				<li><a href="#" title="">Aliquam adipiscing libero vitae leo</a></li>		
				<li><a href="#" title="">Sed accumsan quam ac tellus</a></li>	
			</ul>
			</div>
			
			<div class="widget">
			<h2>Categories</h2>
			<ul>
			 	<li><a href="http://">Design (99+)</a></li>
				<li><a href="http://">Web (53)</a></li>
				<li><a href="http://">Other (12)</a></li>
				<li><a href="http://">Weird (4)</a></li>
			</ul>
			</div>
		
			<div class="widget">
			<h2>Meta</h2>
			<ul>
				<li><a href="">Entries (RSS)</a></li>
				<li><a href="">Comments (RSS)</a></li>
			</ul>
			</div>
		</aside>-->
	
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