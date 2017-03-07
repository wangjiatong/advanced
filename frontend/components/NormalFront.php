<?php
namespace frontend\components;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\base\Widget;

class NormalFront extends Widget
{
    public function run()
    {
        return $this->render('_normalFront');  
    }
}