<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
//use yii\filters\VerbFilter;
//use yii\filters\AccessControl;
//发布新闻
use common\models\PostNewsForm;
//添加新闻分类
use common\models\NewsColumnForm;
use common\models\NewsColumn;

class NewsController extends Controller
{
    //富文本编辑器
    public function actions()
    {
    return [
        'upload' => [
            'class' => 'kucha\ueditor\UEditorAction',
        ]
    ];
    }
    //管理新闻
    public function actionIndex()
    {
        return $this->render('index');
    }
    //发布新闻
    public function actionPost()
    {
        $model = new PostNewsForm();

        if($model->load(Yii::$app->request->post()) && $model->postNews()){
            
            echo "post success";
            
        }       
            
        return $this->render('post', ['model' => $model]);
        
    }
    //添加新闻分类
    public function actionAddColumn()
    {
        $model = new NewsColumnForm();
        
        if($model->load(Yii::$app->request->post()) && $model->postNewsColumn())
        {
            echo "post success";
        }
        
        return $this->render('addColumn', ['model'=> $model]);
    }
    //管理新闻分类（查看所有分类）
    public function actionManageNewsColumns()
    {
        $model = new NewsColumnForm();
        
        $data = $model->getAllNewsColumns();
        
        return $this->render('manageColumns', ['data' => $data]);
    }
    
}
