<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '业务介绍';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJs('$(document).ready(function(){$("#business").addClass("navactive");});');
?>
<div class="site-business">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <div class="services-page main grid-wrap">

        <header class="grid col-full">
                <hr>
                <p class="fleft">业务介绍</p>
        </header>


        <aside class="grid col-one-quarter mq2-col-full">
                <p class="mbottom">我们的项目主要来源于金融同业（VC/PE、券商投行、信托等）之间的合作，项目规模适中，兼具安全性和成长性。我们也会主动寻找一些优质项目，与产业资本一起，结合我们的投资理念，为投资人提供最佳的投融资解决方案，实现财富增值和社会效益的共同成长。
                </p>
                <menu>
                        <ul>
                                <!--<li><a href="#navbutton" class="arrow">Buttons</a></li>-->
                                <li><a href="#navtogg" class="arrow">运营流程</a></li>
                                <li><a href="#navtabs" class="arrow">资金投向</a></li>
                        </ul>
                </menu>
        </aside>

        <section class="grid col-three-quarters mq2-col-full">



                <div class="grid-wrap">

<!--                <article id="navbutton" class="grid col-full">
                        <h2>Buttons</h2>
                        <p>
                                <a href="#" class="button">First button</a>
                                <a href="#" class="button">Second button</a>
                        </p>
                </article>-->

                <article id="navtogg" class="grid col-full">
                        <h2>运营流程</h2>
                                        <ul class="toggle-view">
<!--                                                <li>
                                                        <h5 class="toggle-title">General <span class="toggle-title-detail">- Main features</span></h5>
                                                        <div class="toggle grid-wrap">                     
                                                                <ul class="grid col-one-half mq3-col-full">
                                                                        <li>Lorem ipsum</li>
                                                                        <li>Cras</li>
                                                                        <li>Dolor Euismod Cras</li>
                                                                        <li>Sit Amet</li>
                                                                        <li>Ornare Nullam Dolor</li> 
                                                                        <li>Consectetur</li>
                                                                </ul>
                                                                <ul class="grid col-one-half mq3-col-full">
                                                                        <li>Euismod Dapibus</li>
                                                                        <li>Magna</li>
                                                                        <li>Lorem Ligula Elit</li>
                                                                        <li>Dolor Vulputate</li>
                                                                        <li>Dapibus</li> 
                                                                        <li>Dolor Mattis Ipsum</li>
                                                                </ul>
                                                        </div>       
                                                </li>-->

                                                <li>
                                                        <h5 class="toggle-title">运营流程 <span class="toggle-title-detail">- 点击查看</span></h5>
                                                        <div class="toggle">                     
                                                                <p>我们的项目主要来源于金融同业（VC/PE、券商投行、信托等）之间的合作，项目规模适中，兼具安全性和成长性。我们也会主动寻找一些优质项目，与产业资本一起，结合我们的投资理念，为投资人提供最佳的投融资解决方案，实现财富增值和社会效益的共同成长。</p>
                                                                <p style="text-align: center"><img src="/img/yunyingliucheng.png"</p>
                                                        </div>       
                                                </li>
                                        </ul>
                </article>

                <article id="navtabs" class="grid col-full">
                        <h2>资金流向</h2>
                        <p style="text-align: center"><img src="/img/zijinliuxiang.png"></p>
                        <div class="">
                                <ul class="tabs clearfix">
                                    <li><a href="#tab1">私募股权投资</a></li>
                                    <li><a href="#tab2">股权质押融资</a></li>
                                    <li><a href="#tab3">上市公司再融资</a></li>                                   
                                    <li><a href="#tab4">金融机构股权质押融资</a></li>
                                    <li><a href="#tab5">企业流动资金贷款</a></li>
                                    <li><a href="#tab6">地方政府类项目融资</a></li>
                                    <li><a href="#tab7">房地产项目融资</a></li>
                                </ul>
                                <div class="tab_container">
                                    <article id="tab1" class="tab_content">
                                        <p><strong>一、投资类型</strong><br />
    VC（企业已有一定的发展规模）<br />
    PE（企业净利润不低于1000万）<br />
    Pre-IPO（拟报上市，且净利润不低于3000万）<br />
二、<strong>投资领域</strong><br />
    TMT<br />
    物流、节能环保<br />
    战略新兴行业、先进制造业<br />
    教育、医疗养老<br />
三、<strong>投资金额</strong><br />
    500万至1亿不等<br />
四、<strong>投资期限</strong><br />
    3+2年<br />
</p>
                                    </article>

                                        <article id="tab2" class="tab_content">
<!--                                                <h6>Heading</h6>-->
                                        <p> 上市板块： 一般要求为国内主板与中小板上市公司，上市公司  
                            业绩稳定；<br />
    流动要求：股票质押期内，所有质押股权必须解禁流通；<br />
    质押率：     35% - 45%；<br />
    质押价格：上市公司股票20日交易均价；<br />
    风险控制：预警线、平仓线，根据股权质量确定；<br />
    融资成本：年息为8%-10%（根据具体条件沟通确定）；<br />
    融资速度：一般2至3周左右（集合） ；<br />
    特殊业务：创业板、房地产、ST等特殊上市公司股权质押融资   
                            的年成本要高于普通主板股票质押，或者接受翌银 
                            基金的融资方案，可以降低融资成本。
</p>
                                    </article>

                                    <article id="tab3" class="tab_content">
                                        <!--<h6>Heading</h6>-->
                                    <p>优质上市公司定向增发认购或提供定向增发贷款；<br/>
    上市公司并购重组融资业务（提供贷款资金）；<br/>
    大宗交易；<br/>
    其它<br/>
</p>
                                    </article>
                                    <article id="tab4" class="tab_content">
                                        <p>融资主体主要为银行、证券、保险公司等主流金融机构股权质押融资；一般速度略长于上市公司股权质押融资，成本也略高，质押价值与融资规模以PB+PE综合评价，根据市场情况及时调整。</p>
                                    </article>

                                        <article id="tab5" class="tab_content">
                                                <!--<h6>Heading</h6>-->
                                        <p>融资主体：具有一定的资产规模，负债率较低，净资产规模大于融资规模，
                              有较好的现金流，行业龙头企业或区域龙头企业，非房地产企 
                              业（大中型建筑企业、商贸企业、文化产业、装备制造、农业
                              科技等，但资金用途可以用在建筑装修等方面）；<br />
    资金用途：主要用于企业生产经营或扩大生产规模后的流动资金补充（装
                              修款等） ；<br />
    抵押资产：有充足的抵押资产（应收账款、房地产或商业物业等不动产） ；<br />
    担保主体：现金流较好规模较大的企业。上市公司或金融机构担保最佳；<br />
    还款来源：有足可覆盖融资规模的还款来源；<br />
    借款期限：资金使用期限一般为1年，特殊情况可以为1-3年；<br />
    融资规模：单一项目融资额度一般不低于5000万（特殊情况另议）；<br />
    其他：         符合流动资金贷款办法规定的融资条件。
</p>
                                    </article>

                                    <article id="tab6" class="tab_content">
                                        <!--<h6>Heading</h6>-->
                                    <p>  地方政府概述
        本介绍资料所称地方政府是指中国大陆区域省级（自治区）或以下的区域行政机构（包括国家级、省级、特殊类开发区及工业园）；<br />
     地方政府主体选择
        要求地方政府有较强的财政实力，一般以省级、地市级为主，一般要求年度地方财政收入不低于50亿，总体负债率良性（包括地方政府融资平台的负债），对于财政实力较好的百强县、国家级或省级开发区也可以给与贷款资金；<br />特殊情况，可以根据地方政府的综合条件创设融资方案。
     融资标的与交易架构核心构建
        有真实的投资项目，项目有通过建设销售或经营还款能力。通过对应政府财政的应收账款或BT回购款等，进行债权确认与人大决议给与地方一般性财政列支预算。
</p>
                                    </article>
                                    <article id="tab7" class="tab_content">
                                        <!--<h6>Heading</h6>-->
                                    <p><strong>一、基本条件</strong><br />
     房地产二级或以上开发资质（项目所在区域最好为二级或以上城市）；<br />
     自有资金在项目总投资规模中占比不低于35%；<br />
     四证全（土地使用权证、建设用地规划许可证、建设工程规划许可证、建  
        设工程施工许可证）第五证为商品房销售<预售>许可证；<br />
<strong>二、融资主体选择</strong><br />
     上市房地产企业；上市企业担保的控股股东或实际控制人；<br />
     中国房地产开发100强企业；<br />
     知名企业，一级开发资质，省级以上龙头企业，大型非纯住宅项目；<br />
     区域知名龙头企业，二级以上开发资质，非住宅地产项目，较好的抵押担         
        保；<br /> 二级以上开发资质，项目规模大，已投资比例较大，可以承受较高的    
        融资成本，最好可以认购次级债权。<br />
     <strong>特殊项目贷款：项目有易见的亮点与价值，规模大，有充足的抵押担保与还款来源，可以接受较高的融资成本，三级开发资质与二证可以给予贷款。</strong>
</p>
                                    </article>
                                 </div>
                          </div>
                </article>

                </div> <!-- 100%articles-->

        </section>	



    </div> <!--main-->
</div>