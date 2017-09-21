<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
//数据提供器
use yii\data\ActiveDataProvider;
use common\models\News;
//分页
use yii\data\Pagination;
//新闻分类
use common\models\NewsColumn;
//提示信息
use yii\bootstrap\Alert;
use common\models\ChangeUserPasswd;
use yii\web\NotFoundHttpException;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'products'],
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', '邮件发送成功！感谢您与我们联系。');
                echo Alert::widget([
		'options' => [
			'class' => 'alert-success', //这里是提示框的class
		],
		'body' => Yii::$app->getSession()->getFlash('邮件发送成功！'), //消息体
                ]);
            } else {
                Yii::$app->session->setFlash('error', '邮件发送失败！');
                echo Alert::widget([
		'options' => [
			'class' => 'alert-error',
		],
		'body' => Yii::$app->getSession()->getFlash('邮件发送失败！'),
                ]);
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
//    public function actionSignup()
//    {
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post())) {
//            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    return $this->goHome();
//                }
//            }
//        }
//
//        return $this->render('signup', [
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
        $model = new PasswordResetRequestForm();
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
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->redirect(['site/login']);
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    //添加产品页面
//    public function actionProducts()
//    {
//        if(!Yii::$app->user->isGuest)
//        {
//            return $this->render('products');
//        }
//    }
    //添加服务页面
    public function actionBusiness()
    {
        return $this->render('business');
    }
//    //添加新闻页面
//    public function actionNews()
//    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => News::find(),
//        ]);
//        
//        return $this->render('news', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }
        //新闻页面
    public function actionNews()
    {
        $query = News::find()->orderBy('created_at DESC');
        
        $countQuery = clone $query;
        
        $count = $countQuery->count();
        
        $pages = new Pagination(['totalCount' => $count,
//            'pageSize' => 4,
            'defaultPageSize' => 4,
//            'validatePage' => false,
            ]);
        
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        return $this->render('news', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }
    //添加加入我们页面
    public function actionJoin()
    {
        return $this->render('join');
    }
    //新闻详情页
    public function actionArticle($id)
    {
        if($model = $this->findNews($id))
        {
            return $this->render('article', [
                    'model' => $model,
            ]);
        }else{
            throw new NotFoundHttpException();
        }

    }
    //新闻详情页按栏目显示新闻
    public function actionNewsColumn($id)
    {
//        $news = News::find()->orderBy('created_at desc');
        
          $news_column = NewsColumn::findOne($id);
          
          $news = $news_column->getNews();
          
//        $count = $news->count();
          
          $count = $news->count();
          
        $pages = new Pagination([
            'totalCount' => $count,
            'defaultPageSize' => 4,
        ]);
        
        $models = $news->offset($news->offset)->limit($news->limit)->orderBy('created_at desc')->all();
        
        return $this->render('newsColumn', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }
    //首页产品分类-固定收益-静态
    public function actionFixedIncome()
    {
        return $this->render('fixedIncome');
    }
    //首页产品分类-定向增发-静态
    public function actionPrivatePlacement()
    {
        return $this->render('privatePlacement');
    }
    //首页产品分类-股权投资-静态
    public function actionEquityInvestment()
    {
        return $this->render('equityInvestment');
    }

    //修改客户的密码
    public function actionResetPasswd()
    {
        $id = Yii::$app->user->identity->id;
        $model = new ChangeUserPasswd();
        if($model->load(Yii::$app->request->post()) && $model->resetPasswdLogout($id))
        {   
            return $this->redirect(['site/login']);            
        }
        return $this->render('resetPasswd', [
            'model' => $model,
        ]);
    }
    
    //获取新闻模型
    private function findNews($id)
    {
        if(($news = News::findOne($id)) !== 'null')
        {
            return $news;
        }else{
            return false;
        }
    }
    
    
    
    
    
    
    
    
    
    
    
}
