<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\News;


class PostNewsForm extends Model
{
    public $id;
    public $title;
    public $summary;
    public $content;
    public $created_at;
    public $column_id;



    public function rules()
    {
        return [
            [['title', 'summary', 'content', 'column_id'], 'required'],
        ];
    }
    
    public function postNews()
    {     
        if(!$this->validate())
        {
            return null;
        }
        $news = new News();
        $news->id = $this->id;
        $news->title = $this->title;
        $news->summary = $this->summary;
        $news->content = $this->content;
        $news->column_id = $this->column_id;
        $news->created_at = date("Y-m-d");
//        $news->save();
        return $news->save() ? $news : null;
    }
}

