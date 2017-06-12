<?php
namespace backend\controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Yii;
use backend\controllers\common\BaseController;
//发布新闻表单
use common\models\PostNewsForm;
//添加新闻分类表单
use common\models\NewsColumnForm;
//新闻分类实体
use common\models\NewsColumn;
//数据提供器
use yii\data\ActiveDataProvider;
//新闻模型
use common\models\News;

class NewsController extends BaseController
{
    //富文本编辑器
    public function actions()
    {
    return [
        'upload' => [
            'class' => 'kucha\ueditor\UEditorAction',
            'config' => [
                "imageUrlPrefix"  => constant('FRONTEND_UPLOADS'),//图片访问路径前缀
                "imagePathFormat" => "/uploads/news/{yyyy}{mm}{dd}/{time}{rand:6}", //上传保存路径
                'autoHeightEnabled' => false,
            ],
        ]
    ];
    }
    //管理新闻
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find()->orderBy('created_at desc'),
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
            return $this->redirect(['index']);
        }else{    
            return $this->render('post', ['model' => $model,]);
        }
    }
    //添加新闻分类
    public function actionAddColumn()
    {
        $model = new NewsColumnForm();
        
        if($model->load(Yii::$app->request->post()) && $model->postNewsColumn())
        {
            return $this->redirect(['manage-news-columns']);
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
    //修改新闻分类
    public function actionNewsColumnUpdate($id)
    {
        $model = $this->findColumnModel($id);
        
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['manage-news-columns']);
        }else{
            return $this->render('newsColumnUpdate', [
                'model' => $model,
            ]);
        }
    }
    //删除新闻分类
    public function actionNewsColumnDelete($id)
    {
        $this->findColumnModel($id)->delete();

        return $this->redirect(['manage-news-columns']);
    }
    //后台单篇新闻视图控制器
    public function actionNewsView($id)
    {
        return $this->render('newsView', [
            'model' => $this->findNewsModel($id),
        ]);
    }
    //后台单篇新闻修改控制器
    public function actionNewsUpdate($id)
    {
        $model = $this->findNewsModel($id);
        
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['news-view', 'id' => $model->id]);
        }else{
            return $this->render('newsUpdate', [
                'model' => $model,
            ]);
        }
    }
    //删除单篇新闻控制器
    public function actionNewsDelete($id)
    {
        $this->findNewsModel($id)->delete();

        return $this->redirect(['index']);
    }
    //查询新闻分类模型方法
    protected function findColumnModel($id)
   {
       if (($model = NewsColumn::findOne($id)) !== null) {
           return $model;
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
   }
    //查询新闻模型方法
    protected function findNewsModel($id)
   {
       if (($model = News::findOne($id)) !== null) {
           return $model;
       } else {
           throw new NotFoundHttpException('The requested page does not exist.');
       }
   }
}
