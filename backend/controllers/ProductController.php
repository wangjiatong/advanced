<?php

namespace backend\controllers;

use Yii;
use common\models\ProductColumn;
use common\models\ProductColumnSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//权限
use yii\filters\AccessControl;
//产品
use common\models\Product;
use common\models\ProductSearch;


/**
 * ProductController implements the CRUD actions for ProductColumns model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
                        'allow' =>true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'product-column-delete' => ['POST'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductColumns models.
     * @return mixed
     */
    public function actionProductColumnIndex()
    {
        $searchModel = new ProductColumnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexProductColumn', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductColumns model.
     * @param integer $id
     * @return mixed
     */
    public function actionProductColumnView($id)
    {
        return $this->render('viewProductColumn', [
            'model' => $this->findProductColumnModel($id),
        ]);
    }

    /**
     * Creates a new ProductColumns model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionProductColumnCreate()
    {
        $model = new ProductColumn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['product-column-view', 'id' => $model->id]);
        } else {
            return $this->render('createProductColumn', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductColumns model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionProductColumnUpdate($id)
    {
        $model = $this->findProductColumnModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['product-column-view', 'id' => $model->id]);
        } else {
            return $this->render('updateProductColumn', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductColumns model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionProductColumnDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['product-column-index']);
    }

    /**
     * Finds the ProductColumns model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductColumns the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findProductColumnModel($id)
    {
        if (($model = ProductColumn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    //产品
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return$this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
         ]);
    }

        /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
        public function actionView($id)
        {
            return $this->render('view', [
                'model'=>$this->findProductModel($id),
            ]);
        }

        /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
        public function actionCreate()
        {
            $model =new Product();
            if($model->load(Yii::$app->request->post()) && $model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

        /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
        public function actionUpdate($id)
        {
            $model=$this->findProductModel($id);

            if($model->load(Yii::$app->request->post()) && $model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('update', [
                    'model'=>$model,
                ]);
            }
        }

        /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
            public function actionDelete($id)
            {
                $this->findProductModel($id)->delete();
                return $this->redirect(['index']);
            }

        /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
        protected function findProductModel($id)
        {
            if(($model=Product::findOne($id)) !== null){
                return $model;
            }else{
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    
}
