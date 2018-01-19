<?php
namespace backend\controllers;

use Yii;
use backend\controllers\common\BaseController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\AdminLoginForm;
//为后端管理员添加引用
use backend\models\AdminPasswordResetRequestForm;
use backend\models\AdminResetPasswordForm;
//index页所需数据模型
use common\models\Contract;
use common\models\UserModel;
use backend\models\Pay;
use backend\models\UserRole;


/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * @inheritdoc
     */
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {      
        if(in_array('contract/index', Yii::$app->session['allowed_urls'])
            || in_array('contract/my-contract', Yii::$app->session['allowed_urls']))
        {
            //页面-第一排（客户、合同、销售量）
            $userNum = UserModel::getUserNumByAccess();
            $contractNum = Contract::getContractNumByAccess();
            $capitalSum = Contract::getCapitalSumByAccess();
    
            //页面-第二排（图标）
            $userNumByMonth = UserModel::getUserNumByMonth(5);
            $capitalByMonth = Contract::getCapitalByMonth(5);
            $conNumByMonth = Contract::getContractNumByMonth(5);
            
            //顶部-通知----开始
            $saleNum = UserRole::find()->where(['role_id' => 3])->orWhere(['role_id' => 5])->count();
            //当月业绩
            $thisMonthCapital = array_values(Contract::getCapitalByMonth(0))[0];
            in_array('contract/index', Yii::$app->session['allowed_urls']) ?
            $monthTaskPercentage = round($thisMonthCapital/(2000000*$saleNum), 3) :
            $monthTaskPercentage = round($thisMonthCapital/2000000, 3);
            $monTask = $this->taskPercentage($monthTaskPercentage, $thisMonthCapital);
            Yii::$app->session['monTask'] = $monTask;
            
            //当年业绩
            $monthsToThisYear = date('n') - 1;
            $thisYearCapital = array_sum(array_values(Contract::getCapitalByMonth($monthsToThisYear)));
            in_array('contract/index', Yii::$app->session['allowed_urls']) ?
            $yearTaskPercentage = round($thisYearCapital/(24000000*$saleNum), 3) :
            $yearTaskPercentage = round($thisYearCapital/24000000, 3);
            $yearTask = $this->taskPercentage($yearTaskPercentage, $monthsToThisYear);
            Yii::$app->session['yearTask'] = $yearTask;
            
            //待付信息
            Yii::$app->session['contractToPay'] = Pay::searchToPay();
            //顶部-通知----结束
            
            return $this->render('index', [
                'userNum' => $userNum,
                'contractNum' => $contractNum,
                'capitalSum' => $capitalSum,
                'userNumByMonth' => $userNumByMonth,
                'capitalByMonth' => $capitalByMonth,
                'conNumByMonth' => $conNumByMonth,
            ]);
        }else{
            return $this->render('index');
        }
        
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['site/login']);
    }
        /**
     * Signs user up.
     *
     * @return mixed
     */
//    public function actionAdminSignup()
//    {
//        $model = new AdminSignupForm();
//        if ($model->load(Yii::$app->request->post())) {
//            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    return $this->goHome();
//                }
//            }
//        }
//
//        return $this->render('adminSignup', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new AdminPasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('发送成功', '查收邮箱中的进一步操作');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('发送失败', '无法为所提供的邮箱修改密码');
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
        $this->layout = false;
        try {
            $model = new AdminResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('成功', '新的密码已经生效');

            return $this->redirect(['site/login']);
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }  
    
    public function taskPercentage($per, $monCap)
    {
        if(($per - 0.33) < 0.01)
        {
            $color = 'red';
        }elseif(($per - 0.33) > 0.01 && ($per - 0.66) < 0.01)
        {
            $color = 'yellow';
        }elseif(($per - 0.66) > 0.01 && ($per - 1) < 0.01)
        {
            $color = 'blue';
        }else{
            $color = 'green';
        }
        return [
            'color' => $color,
            'per' => $per*100 . '%',
            'val' => $monCap,
        ];
    }
}
