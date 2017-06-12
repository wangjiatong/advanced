<?php
namespace backend\controllers;

use Yii;
use backend\models\Role;
use backend\models\RoleForm;
use backend\models\RoleSearch;
use backend\controllers\common\BaseController;
use yii\web\NotFoundHttpException;
use backend\models\UserRole;
use backend\models\UserRoleForm;
use backend\models\RoleAccess;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends BaseController
{
    /**
     * @inheritdoc
     */
    /**
     * Lists all Role models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Role model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RoleForm();

        if ($model->load(Yii::$app->request->post()) && $model->create()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $model->updated_at = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Role model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($this->findModel($id)->delete())
        {
            $user_roles = UserRole::find()->select('id')->where(['role_id' => $id])->all();
            
            foreach($user_roles as $u_r)
            {
                UserRole::findOne($u_r)->delete();
            }

            $role_accesses = RoleAccess::find()->select('id')->where(['role_id' => $id])->all();
            
            foreach ($role_accesses as $r_a)
            {
                RoleAccess::findOne($r_a)->delete();
                
            }
        }
        return $this->redirect(['index']);
    }
    
    public function actionSet()
    {
        $model = new UserRoleForm();
        if($model->load(Yii::$app->request->post()) && $model->set())
        {
            return $this->redirect(['admin/index']);
        }else{
            return $this->render('setRole', [
                'model' => $model
            ]);
        }
    }
    public function actionUnset($id)
    {
        if(UserRole::findOne($id)->delete())
        {
            
            return $this->redirect(['admin/index']);
        }
    }
    public function actionManage($id)
    {
        $model = UserRole::find()->where(['user_id' => $id])->all();
        return $this->render('manage', [
            'model' => $model,
            ]);
    }

    /**
     * Finds the Role model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Role the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Role::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
