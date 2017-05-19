<?php
namespace backend\controllers;

use backend\controllers\common\BaseController;
use backend\models\Access;
use yii\data\ActiveDataProvider;
use backend\models\AccessForm;
use Yii;
use yii\web\NotFoundHttpException;
use backend\models\RoleAccessForm;
use backend\models\RoleAccess;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AccessController extends BaseController
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Access::find(),
            ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
        

        
    }
    
    public function actionCreate()
    {
        $model = new AccessForm();
        if($model->load(Yii::$app->request->post()) && $model->create())
        {
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->updated_time = date('Y-m-d H:i:s');
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $model,
        ]);      
    }
    
    public function actionView($id)
    {
        $model = $this->findModel($id);
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->delete())
        {
            $role_accesses = RoleAccess::find()->select('id')->where(['access_id' => $id])->all();
            foreach ($role_accesses as $r_a)
            {
                RoleAccess::findOne($r_a)->delete();
            }
            return $this->redirect(['index']);
        }
    }
    
    public function actionSet()
    {
        $model = new RoleAccessForm();
        if($model->load(Yii::$app->request->post()) && $model->create())
        {
            return $this->redirect(['index']);
        }
        return $this->render('setRole' , [
            'model' => $model,
        ]);
    }
    public function actionUnset($id)
    {
        $role_accesses = RoleAccess::find()->select('id')->where(['']);
    }
    public function actionManage($id)
    {
        $model = RoleAccess::find()->where(['role_id' => $id])->all();
        return $this->render('manage', [
            'model' => $model
        ]);
    }
    

    protected function findModel($id)
    {
        if(($model = Access::findOne($id)) !== null)
        {
            return $model;
        }else{
            throw new NotFoundHttpException;
        }
    }
    

}
