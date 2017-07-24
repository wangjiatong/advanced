<?php
namespace backend\controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Yii;
use backend\controllers\common\BaseController;
use yii\data\ActiveDataProvider;
use backend\models\Admin;
use backend\models\AdminSignupForm;
use yii\web\NotFoundHttpException;
use backend\models\UserRole;
use backend\models\ChangeAdminInfo;//修改管理员账号、邮箱及姓名
use backend\models\ChangePasswd;//修改管理员密码

class AdminController extends BaseController
{
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
    //更新管理员个人用户信息（不包括密码）
    //缺陷是更新是不能检查唯一性
    public function actionMyUpdate()
    {
        $my_id = Yii::$app->user->identity->id;
        $model = new ChangeAdminInfo();
        $old = $this->findModel($my_id);
        if($model->load(Yii::$app->request->post()) && $model->change($my_id))
        {
            return $this->redirect(['view', 'id' => $my_id]);
        }
        return $this->render('change', [
            'model' => $model,
            'old' => $old,
        ]);
    }
    //更新管理员用户信息（不包括密码）
    //缺陷是更新是不能检查唯一性
     public function actionUpdate($id)
    {
        $model = new ChangeAdminInfo();
        $old = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->change($id))
        {
            return $this->redirect(['view', 'id' => $id]);
        }
        return $this->render('change', [
            'model' => $model,
            'old' => $old,
        ]);
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
    public function actionResetPasswd()
    {
        $model = new ChangePasswd();
        if($model->load(Yii::$app->request->post())&& $model->reset())
        {
            Yii::$app->user->logout();
            return $this->redirect(['user/login']);
        }  
        return $this->render('resetPasswd', [
            'model' => $model,
        ]);
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
