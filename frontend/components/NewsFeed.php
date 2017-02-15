<?php
namespace frontend\components;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\base\Widget;
use common\models\NewsColumn;

class NewsFeed extends Widget
{
    public function run()
    {
        $news_column_1 = NewsColumn::findOne(27);
        
        $news_1 = $news_column_1->getNews()->orderBy('created_at desc')->one();
        
        $news_column_2 = NewsColumn::findOne(28);
        
        $news_2 = $news_column_2->getNews()->orderBy('created_at desc')->one();
        
        $news_column_3 = NewsColumn::findOne(29);
        
        $news_3 = $news_column_3->getNews()->orderBy('created_at desc')->one();
        
        return $this->render('_newsFeed', [
            'news1' => $news_1,
            'news2' => $news_2,
            'news3' => $news_3,
        ]);
        
        
    }
}

