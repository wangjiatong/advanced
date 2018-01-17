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
            //第一排
            $userNum = UserModel::getUserNumByAccess();
            $contractNum = Contract::getContractNumByAccess();
            $capitalSum = Contract::getCapitalSumByAccess();
    
            //第二排
            $userNumByMonth = UserModel::getUserNumByMonth(5);
            $capitalByMonth = Contract::getCapitalByMonth(5);
            $conNumByMonth = Contract::getContractNumByMonth(5);
            
            //通知
            $thisMonthCapital = array_values(Contract::getCapitalByMonth(0))[0];
            in_array('contract/index', Yii::$app->session['allowed_urls']) ?
            $monthTaskPercentage = round($thisMonthCapital/2000000, 2) :
            $monthTaskPercentage = round($thisMonthCapital/2000000, 2);//当月
            $monTask = $this->taskPercentage($monthTaskPercentage);
            Yii::$app->session['monTask'] = $monTask;
            
            $monthsToThisYear = date('n') - 1;
            $thisYearCapital = array_sum(array_values(Contract::getCapitalByMonth($monthsToThisYear)));
            in_array('contract/index', Yii::$app->session['allowed_urls']) ?
            $yearTaskPercentage = round($thisYearCapital/24000000, 2) :
            $yearTaskPercentage = round($thisYearCapital/24000000, 2);//当年
            $yearTask = $this->taskPercentage($yearTaskPercentage);
            Yii::$app->session['yearTask'] = $yearTask;
            
            $contracts = Contract::find()->select(['id', 'every_time'])->where(['source' => parent::getUserId()])->all();
            
            foreach($contracts as $c)
            {
                $every_time_arr = explode(', ', $c['every_time']);//将每期到期时间数组化
            
                $lengthOfArr = count($every_time_arr);//分期次数
            
                $days = 5;//提前多久提醒
            
                $today = strtotime(date('Y-m-d H:i:s'));
            
                for($i = 0; $i < $lengthOfArr; $i++)
                {
                    $timeToCheck = strtotime($every_time_arr[$i]);
                
                    if($today < $timeToCheck && ($timeToCheck - $today)/86400 < $days){
                        $id_arr[] = $c['id'];
                    }
            
                }
            }
            
            $models = [];//待付合同结果集
            if(isset($id_arr))
            {
                foreach ($id_arr as $i)
                {
                    $model = Contract::findOne($i);
                    $models = $model;
                }
            }
            
            Yii::$app->session['contractToPay'] = $models;
            
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
    
    public function taskPercentage($per)
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
        return ['color' => $color,
                'per' => $per*100 . '%'];
    }
}
