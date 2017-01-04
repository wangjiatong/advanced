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
//数据提供器
use yii\data\ActiveDataProvider;
//新闻模型
use common\models\News;

class NewsController extends Controller
{
    //富文本编辑器
    public function actions()
    {
    return [
        'upload' => [
            'class' => 'kucha\ueditor\UEditorAction',
            'config' => [
                "imageUrlPrefix"  => "",//图片访问路径前缀
                "imagePathFormat" => "/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}", //上传保存路径
                "imageRoot" => Yii::getAlias("@webroot"),
    ],
        ]
    ];
    }
    //管理新闻
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find(),
            'pagination' =>[
                'pageSize' => 8,
                ],
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
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
        $dataProvider = new ActiveDataProvider([
            'query' => NewsColumn::find(),
        ]);
        
        return $this->render('manageColumns', [
            'dataProvider' => $dataProvider,
        ]);
        
    }
    
}
