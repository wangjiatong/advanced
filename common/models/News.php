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
            [['title', 'content', 'column'], 'required'],
        ];
    }
}