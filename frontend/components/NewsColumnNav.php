<?php
namespace frontend\components;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use common\models\NewsColumn;
use yii\base\Widget;

class NewsColumnNav extends Widget
{
    public $id;
    
    public function run()
    {
        
        $newsColumnNav = NewsColumn::find()->all();
        

        return $this->render('_newsColumnNav',
                [
                    'data' => $newsColumnNav,
                ]);
    }
}