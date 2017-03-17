<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Contract;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use common\models\UserModel;

class MemberController extends Controller
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
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;
        
        if(Yii::$app->user->isGuest)
        {
            return null;
        }
        $user = UserModel::findOne($user_id);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $user->getContracts(),
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest)
        {
            return $this->render('view', [
                'model' => Contract::find()->andWhere(['id' => $id, 'user_id' => Yii::$app->user->id])->one(),
            ]);
        }
    }
    
    public function actionPersonal()
    {
        return $this->render('personal');
    }

}
