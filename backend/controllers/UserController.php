<?php
namespace backend\controllers;

use Yii;
use common\models\UserModel;
use backend\models\UserSearch;
use backend\controllers\common\BaseController;
use yii\web\NotFoundHttpException;
//会员用户注册表单
use backend\models\UserSignupForm;
//销售查看个人客户
use backend\models\MyUserSearch;
//更改客户用户信息
use common\models\ChangeUserInfo;
use yii\data\Pagination;
use common\models\Contract;
use common\models\ChangeUserPasswd;

/**
 * UserController implements the CRUD actions for UserModel model.
 */
class UserController extends BaseController
{
    /**
     * @inheritdoc
     */
    /**
     * Lists all UserModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMyUser()
    {
        $searchModel = new MyUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
    }
    /**
     * Displays a single UserModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionMyView($id)
    {
        return $this->render('view', [
            'model' => $this->findMyModel($id), 
        ]);
    }

    /**
     * Creates a new UserModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserSignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup() ) {
            return $this->redirect([parent::checkUrlAccess('user/index', 'user/my-user')]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
        /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new UserPasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new UserResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    //更新客户用户信息（不包括密码）
    //缺陷是更新是不能检查唯一性
    public function actionMyUpdate($id)
    {
        $model = new ChangeUserInfo();
        $old = $this->findMyModel($id);
        if($model->load(Yii::$app->request->post()) && $model->change($id))
        {
            return $this->redirect(['view', 'id' => $id]);
        }
        return $this->render('change', [
            'model' => $model,
            'old' => $old,
        ]);
    }

    /**
     * Deletes an existing UserModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
    public function actionMyDelete($id)
    {
        $this->findMyModel($id)->delete();

        return $this->redirect(['index']);
    }
    //查看所有用户名下的合同
    public function actionAllContractByUser($id)
    {
        $data = Contract::find()->where(['user_id' => $id]);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => '10']);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('contractByUser', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }
    //销售查看自己名下客户的合同
    public function actionMyContractByUser($id)
    {
        $data = Contract::find()->where(['user_id' => $id, 'source' => Yii::$app->user->identity->id]);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => '10']);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('contractByUser', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }
    //修改自己客户的密码
    public function actionResetPasswd($id)
    {
        $model = new ChangeUserPasswd();
        if($model->load(Yii::$app->request->post()) && $model->resetPasswd($id))
        {   
            return $this->redirect(['user/view', 'id' => $id]);            
        }
        return $this->render('resetPasswd', [
            'model' => $model,
            'id' => $id,
        ]);
    }

    /**
     * Finds the UserModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findMyModel($id)
    {
        $my_id = Yii::$app->user->identity->id;
        if(($model = UserModel::find()->where(['id' => $id, 'source' => $my_id])->one()) !== null)
        {
            return $model;
        }else{
            throw new NotFoundHttpException('该客户不属于您，您无权操作！');
        }
    }
}
