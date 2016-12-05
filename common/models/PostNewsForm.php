<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\News;


class PostNewsForm extends Model
{
    public $title;
    public $content;
    public $column;
    
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
        $news->title = $this->title;
        $news->content = $this->content;
        $news->column = $this->column;
        
        return $news->save() ? $news : null;
    }
}

