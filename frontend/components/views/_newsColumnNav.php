<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
            echo    "<div class='widget'>";
            echo        "<h2>新闻栏目</h2>";
            echo        "<ul>";
        foreach($data as $d)
        {
            $id = $d->id;
//            echo               "<li><a href='/site/news-column/".$id."'>".$d->news_column."</a></li>";
            echo               "<li><a href='".\Yii::$app->urlManager->createUrl(['site/news-column', 'id' => $id])."'>".$d->news_column."</a></li>";
//            echo \Yii::$app->urlManager->createUrl(['site/news-column', 'id' => $id]);
        }
            echo                "</ul>";
            echo    "</div>";
