<?php
namespace backend\controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Yii;
use backend\controllers\common\BaseController;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use backend\models\Admin;
use backend\models\AdminSignupForm;
use yii\web\NotFoundHttpException;
use backend\models\UserRole;

class AdminController extends BaseController
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['*'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    //展示管理员用户列表
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Admin::find(),
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    //创建管理员用户
    public function actionCreate()
    {
        $model = new AdminSignupForm();

        if($model->load(Yii::$app->request->post()) && $model->signup())
        {
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model
        ]);
    }
    //管理员用户详情
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        return $this->render('view', [
            'model' => $model
        ]);
    }
    //更新管理员用户信息（不包括密码）
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect(['index']);
        }else{
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }
    //删除管理员用户
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
  
        if($model->delete())
        {
            $user_roles = UserRole::find()->select('id')->where(['user_id' => $id])->all();
            foreach($user_roles as $u_r)
            {
                UserRole::findOne($u_r)->delete();
            }
            return $this->redirect(['index']);
        }
    }
    //通过id查找某个管理员用户实例
    protected function findModel($id)
    {
        if(($model = Admin::findOne($id)) !== null)
        {
            return $model;
        }else{
            throw new NotFoundHttpException;
        }
    }
}
