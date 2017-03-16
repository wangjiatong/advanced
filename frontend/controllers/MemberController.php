<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Contract;
use yii\filters\AccessControl;

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
        
        $model = Contract::find()->where(['user_id' => $user_id])->all();
        
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
