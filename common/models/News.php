<?php
namespace common\models;

use yii;
use yii\db\ActiveRecord;
//use yii\behaviors\TimestampBehavior;

class News extends ActiveRecord
{
    public static function tableName()
    {
        return 'news';
    }
    public function rules()
    {
        return [
            [['title', 'summary', 'content', 'column_id'], 'required'],
        ];
    }
    //与新闻栏目的对应关系
    public function getNewsColumn()
    {
        return $this->hasOne(NewsColumn::className(), ['id' => 'column_id']);
    }
}