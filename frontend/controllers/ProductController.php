<?php
namespace frontend\controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\Product;
use \common\models\ProductColumn;
use Yii;

class ProductController extends Controller
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
        $model = Product::find()->all();
        $column = ProductColumn::find()->all();
        return $this->render('index', [
            'model' => $model,
            'column' => $column,
        ]);
    }
    
    public function actionView($id, $product_column_id)
    {
        $model = Product::find()->where(['id' => $id])->one();
        $rest = Product::find()->where(['product_column_id' => $product_column_id])->all();
        $prevPageUrl = Yii::$app->request->referrer;
        return $this->render('view', [
            'model' => $model,
            'rest' => $rest,
            'prevPageUrl' => $prevPageUrl,
            ]);   
    }
    
    public function actionProductColumn($id)
    {
        $model = Product::find()->where(['product_column_id' => $id])->all();
        $column = ProductColumn::find()->all();
        return $this->render('productColumn', [
            'model' => $model,
            'column' => $column,
        ]);
    }
    
}

