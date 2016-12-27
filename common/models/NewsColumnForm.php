<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\NewsColumn;

class NewsColumnForm extends Model
{
    public $news_column;
    
    public function rules()
    {
        return [
                    [['news_column'], 'required'],
               ];
    }
    //添加新闻分类
    public function postNewsColumn()
    {
        $_news_column = new NewsColumn;
        $_news_column->news_column = $this->news_column;
        
        return $_news_column->save();
    }
    //管理新闻分类（显示所有）
    public function getAllNewsColumns()
    {
        $res = NewsColumn::find()->select('*')->asArray()->all();
        
        return $res;
    }
}