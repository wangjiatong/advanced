<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-products">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="works-page main grid-wrap">

        <header class="grid col-full">
                <hr>
                <p class="fleft">Works</p>
        </header>


        <aside class="grid col-one-quarter mq2-col-full">
                <p class="mbottom">Keep the same size ratio for thumbnails to avoid breaking the grid because of the margin-bottom.</p>
                <menu>
                        <a  id="work_all" class="arrow buttonactive">All</a><br>
                        <a  id="work_1" class="arrow">Web design</a><br>
                        <a  id="work_2" class="arrow">Web development</a><br>
                        <a  id="work_3" class="arrow">Graphic design</a>
                </menu>
        </aside>

        <section class="grid col-three-quarters mq2-col-full">

                                <div class="grid-wrap works">


                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_1">
                                <a href="work1.html" >
                                        <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="work1.html" class="arrow">Project page!</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>

                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_1">
                                <a href="#" >
                                <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="#" class="arrow">Project x</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>

                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_2">
                                <a href="#" >
                                <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="#" class="arrow">Project x</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>

                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_3">
                                <a href="#" >
                                <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="#" class="arrow">Project x</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>

                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_1">
                                <a href="#" >
                                <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="#" class="arrow">Project x</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>

                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_3">
                                <a href="#" >
                                <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="#" class="arrow">Project x</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>

                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_3">
                                <a href="#" >
                                <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="#" class="arrow">Project x</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>

                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_3">
                                <a href="#" >
                                <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="#" class="arrow">Project x</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>

                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_1">
                                <a href="#" >
                                <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="#" class="arrow">Project x</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>

                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_2">
                                <a href="#" >
                                <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="#" class="arrow">Project x</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>

                        <figure class="grid col-one-third mq1-col-one-half mq2-col-one-third mq3-col-full work_1">
                                <a href="#" >
                                <img src="img/img.jpg" alt="" >
                                <span class="zoom"></span>
                                </a>
                                <figcaption>
                                        <a href="#" class="arrow">Project x</a>
                                        <p>Lorem ipsum dolor set amet</p>
                                </figcaption>
                        </figure>


                </div> <!-- grid inside 3/4-->

        </section>	
    </div> <!--main-->
</div>