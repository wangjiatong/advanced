<?php
namespace common\models;

use yii;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%news}}';
    }
}