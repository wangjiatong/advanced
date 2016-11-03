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
                <p class="mbottom">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis.
                </p>
                <menu>
                        <ul>
                                <li><a href="#navbutton" class="arrow">Buttons</a></li>
                                <li><a href="#navtogg" class="arrow">Toggles</a></li>
                                <li><a href="#navtabs" class="arrow">Tabs</a></li>
                        </ul>
                </menu>
        </aside>

        <section class="grid col-three-quarters mq2-col-full">



                <div class="grid-wrap">

                <article id="navbutton" class="grid col-full">
                        <h2>Buttons</h2>
                        <p>
                                <a href="#" class="button">First button</a>
                                <a href="#" class="button">Second button</a>
                        </p>
                </article>

                <article id="navtogg" class="grid col-full">
                        <h2>Toggles</h2>
                                        <ul class="toggle-view">
                                                <li>
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
                                                </li>

                                                <li>
                                                        <h5 class="toggle-title">Lorem <span class="toggle-title-detail">- Ipsum dolor</span></h5>
                                                        <div class="toggle">                     
                                                                <p>Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Sed posuere consectetur est at lobortis. Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui.</p>
                                                        </div>       
                                                </li>
                                        </ul>
                </article>

                <article id="navtabs" class="grid col-full">
                        <h2>Tabs</h2>
                        <div class="">
                                <ul class="tabs clearfix">
                                    <li><a href="#tab1">First</a></li>
                                    <li><a href="#tab2">Second</a></li>
                                    <li><a href="#tab3">Third</a></li>
                                </ul>
                                <div class="tab_container">
                                    <article id="tab1" class="tab_content">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
                                    </article>

                                        <article id="tab2" class="tab_content">
                                                <h6>Heading</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
                                    </article>

                                    <article id="tab3" class="tab_content">
                                        <h6>Heading</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi commodo, ipsum sed pharetra gravida, orci magna rhoncus neque, id pulvinar odio lorem non turpis. Nullam sit amet enim. Suspendisse id velit vitae ligula volutpat condimentum. Aliquam erat volutpat. Sed quis velit.</p>
                                    </article>
                                 </div>
                          </div>
                </article>

                </div> <!-- 100%articles-->

        </section>	



    </div> <!--main-->
</div>