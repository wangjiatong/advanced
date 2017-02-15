<?php

/* @var $this yii\web\View */

$this->title = '上海翌银玖德资产管理有限公司——官方网站';
$this->registerJs('$(document).ready(function(){$("#index").addClass("navactive");});');
use frontend\components\NewsFeed;
?>
<div class="home-page main">
    
	<section class="grid-wrap" >
		<header class="grid col-full">
			<hr>
<!--			<p class="fleft">Home</p>
			<a href="about.html" class="arrow fright">see more infos</a>-->
		</header>
		
		<div class="grid col-one-half mq2-col-full">
			<h1>诚信 credibility<br />
                            合规 compliance <br />
			    创新 innovation<br />
                            稳健 solidity
                        </h1>
			<p>上海翌银玖德资产管理有限公司（翌银玖德），注册资本1亿元，并于2015年12月7日获得私募基金牌照。我们的首只股权投资基金产品——翌银玖德新兴成长壹号（基金编码为SL1400）已顺利完成基金业协会的备案，目前正在运作中。为了使业务规范化，将翌银基金旗下业务及销售团队全部转入翌银玖德，其中已有8名员工持有基金从业资格证书。
			</p>
			<p>翌银玖德累计管理资产规模超过55亿元，成功发行35个项目，截至目前，已完成兑付资金超过40亿元，无任何违约和损失，客户回报均达到预期收益，在行业内享有良好的声誉。
			</p>
		</div>
			
	
		 <div class="slider grid col-one-half mq2-col-full">
		   <div class="flexslider">
		     <div class="slides">
		       <div class="slide">
		           	<figure>
		                 <img src="/img/img2.jpg" alt="">
		                 <figcaption>
		                 	<div>
		                 	<h5>核心使命</h5>
		                 	<p>稳健投资，追求锁定风险下的客户收益最大化，或锁定收益下的风险最小化，与客户资产共同成长。</p>
		                 	</div>
		                 </figcaption>
		             	</figure>
		           </div>
		           
		           <div class="slide">
		               	<figure>
		                     <img src="/img/img.jpg" alt="">
		                     <figcaption>
		                     	<div>
		                     	<h5>经营宗旨</h5>
		                     	<p>坚持一切以客户为中心；坚持以市场为导向；稳健至上；精细致微。</p>
		                     	</div>
		                     </figcaption>
		                 	</figure>
		               </div>
		            </div>
		   </div>
		 </div>
		
        </section>
    

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
                                    <a href="#">
                                    <img src="img/img.jpg" alt="">
                                    <span class="zoom"></span>
                                    </a>
                                    <figcaption>
                                            <a href="#" class="arrow">固定收益</a>
                                            <p>可以按照银行定期存款、国库券等金融产<br />品的特性来理解“固定收益”的含义。</p>
                                    </figcaption>
                            </figure>

                            <figure class="grid col-one-quarter mq2-col-one-half">
                                    <a href="#">
                                    <img src="img/img.jpg" alt="">
                                    <span class="zoom"></span>
                                    </a>
                                    <figcaption>
                                            <a href="#" class="arrow">定向增发</a>
                                            <p>定向增发是指上市公司向符合条件的少数<br />特定投资者非公开发行股份的行为。</p>
                                    </figcaption>
                            </figure>

                            <figure class="grid col-one-quarter mq2-col-one-half">
                                    <a href="#">
                                    <img src="img/img.jpg" alt="">
                                    <span class="zoom"></span>
                                    </a>
                                    <figcaption>
                                            <a href="#" class="arrow">股权投资</a>
                                            <p>股权投资通常是为长期(至少一年)持有一<br />个公司的股票或长期的投资一个公司。</p>
                                    </figcaption>
                            </figure>

                            <figure class="grid col-one-quarter mq2-col-one-half">
                                    <a href="#">
                                    <img src="img/img.jpg" alt="">
                                    <span class="zoom"></span>
                                    </a>
                                    <figcaption>
<!--                                            <a href="#" class="arrow">Project x</a>
                                            <p>Lorem ipsum dolor set amet</p>-->
                                    </figcaption>
                            </figure>
            </section>
</div> <!--main-->