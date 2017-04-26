<?php
namespace frontend\components;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\base\Widget;
use yii\base\DynamicModel;
use Yii;
use common\models\News;
use yii\data\Pagination;

class SearchNews extends Widget
{
    public $search; 
    
//    public function init()
//    {
//        
//    }
    public function run()
    {
        $model = new DynamicModel(['search']);
        
        $model->addRule(['search'], 'required');
        
        if($model->load(Yii::$app->request->post()))
        {
            $search = $model->search;
            
            $searchNews = News::find()->andFilterWhere(['like', 'content', $search])->orderBy('created_at desc');
            
            $count = $searchNews->count();
            
            $pages = new Pagination([
                'totalCount' => $count,
                'defaultPageSize' => 4,
                ]);
            
            $models = $searchNews->offset($pages->offset)->limit($pages->limit)->all();          
            
            return $this->render('SearchNews', [
                'models' => $models,
                'pages' => $pages,
                ]);

        }
            return $this->render('_searchNews', ['model' => $model]);
        
    }
}
