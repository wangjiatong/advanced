<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class NewsColumn extends ActiveRecord
{
    //返回栏目表名
    public static function tableName() 
    {
        return 'news_column';
    }
    public function rules()
    {
        return [
                    [['news_column'], 'required'],
               ];
    }
    public function attributeLabels() {
        return [
            'id' => '新闻分类ID',
            'news_column' => '新闻分类',
        ];
    }
    //与新闻的对应关系
    public function getNews()
    {
        return $this->hasMany(News::className(), ['column_id' => 'id']);
    }
    
}
