<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$css = "div#container{background: url(/img/wx/article-bg.jpg); background-size: 100%; }";
$this->registerCss($css);
?>
<article class="weui-article">
    <h1><b><?= $model->title ?></b></h1>
    <section>
        <?= $model->content ?>
    </section>
</article>
