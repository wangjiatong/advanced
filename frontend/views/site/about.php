<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '关于我们';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('$(document).ready(function(){$("#about").addClass("navactive");});');
?>
<div class="site-about">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->

<!--    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>-->
    <div class="about-page main grid-wrap">

            <header class="grid col-full">
            <hr>
                    <p class="fleft">关于我们</p>
            </header>



            <aside class="grid col-one-quarter mq2-col-full">
                    <p class="mbottom">上海翌银玖德资产管理有限公司系经中国证券投资基金业协会审核认定的私募投资基金管理人，注册资本人民币10000万元，于 2015 年 12 月 7 日获得私募基金牌照（P1028651）。位于上海浦东新区陆家嘴金融圈。
                    </p>
                    <menu>
                            <ul>
                                    <li><a href="#navteam" class="arrow">发展历程</a></li>
                                    <li><a href="#navphilo" class="arrow">组织架构</a></li>
                                    <li><a href="#navplace" class="arrow">企业文化</a></li>
                                    <li><a href="#navother" class="arrow">企业优势</a></li>
                            </ul>
                    </menu>
            </aside>

            <section class="grid col-three-quarters mq2-col-full">
                    <p style="text-align: center"><img src="/img/guanyuwomen.jpg" alt="" ></p>

                    <article id="navteam">
                    <h2>发展历程</h2>
                    <p>公司始建于2012年，经国家批准，上海翌银股权投资基金（翌银基金）正式成立，注册资本5000万元，随着业务的发展，我公司现已注册为上海翌银玖德资产管理有限公司。上海翌银玖德资产管理有限公司系经中国证券投资基金业协会审核认定的私募投资基金管理人，注册资本人民币10000万元，于2015年12月7日获得私募基金牌照（P1028651）。位于上海浦东新区陆家嘴金融圈。</p>
                    <p>公司管理团队均来自国内、国外知名银行并拥有10-20年的中高层管理经验。公司股东拥有在银行、信托、保险、PE(私募）机构等金融行业的资深背景。公司内部建立了清晰完整的组织架构，提供良好的职业培训和发展机会，让员工和公司共同成长。</p>
                    <p>自公司于2012年建立以来，累计管理资产规模超过55亿元，产品线覆盖了固定收益类、股权投资基金以及FOF（母基金）等产品。截至目前，无任何违约和损失，客户回报均达到预期收益，在行业内声誉良好。</p>
                    </article>

                    <article id="navphilo">
                    <h2>组织架构</h2>
                    <p style="text-align:center"><img src="/img/zzjg.png"></p>
                    <!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>-->
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
                    <p style="text-align: center"><img src="/img/qiyeyoushi.png"></p>
                    </article>

            </section>

    </div> <!--main-->
</div>
