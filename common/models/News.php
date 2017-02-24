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
    public function attributeLabels() {
        return [
            'id' => '新闻ID',
            'title' => '新闻标题',
            'summary' => '新闻摘要',
            'content' => '新闻内容',
            'column_id' => '新闻分类ID',
            'created_at' => '发布时间',
        ];
    }
    //与新闻栏目的对应关系
    public function getNewsColumn()
    {
        return $this->hasOne(NewsColumn::className(), ['id' => 'column_id']);
    }
}