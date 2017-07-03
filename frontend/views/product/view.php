<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
//use Yii;

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('$(document).ready(function(){$("#products").addClass("navactive");});');
?>
<div class="site-products">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <div class="works-page main grid-wrap">

        <header class="grid col-full">
                <hr>
                <p class="fleft"><?=$model->product_name?></p>
        </header>


        <aside class="grid col-one-quarter mq2-col-full">
                <!--<p class="mbottom">Keep the same size ratio for thumbnails to avoid breaking the grid because of the margin-bottom.</p>-->
                <menu>
                        <!--<a  id="work_all" class="arrow buttonactive">所有</a><br>-->
                        <a  id="work_1" href="<?=$prevPageUrl?>" class="arrow">返回</a><br />
                        <a  id="work_1" href="/product" class="arrow">产品主页</a><br /><br />
<!--                        <a  id="work_2" class="arrow">定向增发</a><br>
                        <a  id="work_3" class="arrow">股权投资</a>-->
                </menu>
        </aside>

                    <section class="grid col-three-quarters mq2-col-full">
                    <!--<p style="text-align: center"><img src="/img/guanyuwomen.jpg" alt="" ></p>-->      
                    <article id="navteam">
                    <h2><?=$model->product_name?></h2>
                    <br />
                    <p><?=$model->content?></p>
                    </article>
<!--                    <article id="navphilo">
                    <h2>组织架构</h2>
                    <p style="text-align:center"><img src="/img/zuzhijiagou.png"></p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
                    </article>

                    <article id="navplace">
                    <h2>企业文化</h2>
                    <p>企业精神：诚信，合规，创新，稳健。</p>
                    <p>核心使命：稳健投资，追求锁定风险下的客户收益最大化，或锁定收益下的风险最小化，与客户资产共同成长。</p>
                    <p>经营宗旨：坚持一切以客户为中心，坚持以市场为导向。稳健至上，精细至微。</p>
                    <p>投资理念：在对国内资本市场深刻理解的基础上，着力构建完整的投资管理体系，在严格风险管理及主动投资的指引下，运用自上而下的行业分析方法，坚持价值与成长并重的投资理念，深入研究行业长期发展趋势、注重对投资项目内在价值和发展潜力的考量。</p>
                    </article>

                    <article id="navother">
                    <h2>企业优势</h2>
                    <p>最快捷的决策速度：翌银玖德项目的资金以自行募集为主，决策团队专业高效。项目初审答复期在一周之内，尽职调查也在两周左右完成。</p>
                    <p>运营机制与创设能力：翌银玖德通知项目立案并安排资金的，融资失败率目前为0%。项目资金不能解决的，会在一周内给予明确回复；可以解决资金的，会在最短的时间内给予资金安排并正式通知，无须到处询价与分销。</p>
                    <p>成本和效率：我们或许不是最低的报价者，但我们是最直接的资金方。我们成本构成透明，专业财务能力可以帮您最大限度地提升资金使用效率。我们不收取额外费用，您支付的成本是一次性打包成本，透明清晰，易于控制。</p>
                    <p style="text-align: center"><img src="/img/qiyeyoushi.png"</p>
                    </article>-->

            </section>


                </div> <!-- grid inside 3/4-->

        <!--</section>-->	
    </div> <!--main-->
<!--</div>-->