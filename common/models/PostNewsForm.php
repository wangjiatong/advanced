<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\News;


class PostNewsForm extends Model
{
    public $id;
    public $title;
    public $content;
    public $column;
    public $created_at;



    public function rules()
    {
        return [
            [['title', 'content', 'column'], 'required'],
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
        $news->content = $this->content;
        $news->column = $this->column;
        $news->created_at = date("Y-m-d");
//        $news->save();
        return $news->save() ? $news : null;
    }
}

