<?php
namespace backend\controllers;

use Yii;
use common\models\ProductColumn;
use common\models\ProductColumnSearch;
use backend\controllers\common\BaseController;
use yii\web\NotFoundHttpException;
//产品实体
use common\models\Product;
//查询产品实体
use common\models\ProductSearch;
//产品图片上传
use yii\web\UploadedFile;
//产品表单
use backend\models\ProductForm;
use yii\data\Pagination;
use common\models\Contract;



/**
 * ProductController implements the CRUD actions for ProductColumns model.
 */
class ProductController extends BaseController
{
    /**
     * @inheritdoc
     */
    //富文本编辑器
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => [
                    'imageUrlPrefix' => constant('FRONTEND_UPLOADS'),
                    'imagePathFormat' => '/uploads/products/{yyyy}{mm}{dd}/{time}{rand:6}',
                    'autoHeightEnabled' => false,
                ],
            ]
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
            $model = new ProductForm();
            
            if($model->load(Yii::$app->request->post()))
            {
                $model->img = UploadedFile::getInstance($model, 'img');
                
                $name = 'p-' . date('Y-m-d') . '-' . rand(0, 9999);
        
                $ext = $model->img->extension;
                
                $file = $name . '.' . $ext;
        
                $uploadPath = '../../frontend/web/uploads/' . $file;
                
                $model->img->saveAs($uploadPath);
                
                $path = 'uploads/' . $file;
                
                $model->img = $path;
        
                $model->upload();

                return $this->redirect(['index']);

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
            $model = $this->findProductModel($id);
            
            $old_img = $model->img;

            if($model->load(Yii::$app->request->post()))
            {
                $model->img = UploadedFile::getInstance($model, 'img');
                
                if($model->img !== null)
                {

                    $name = 'p-' . date('Y-m-d') . '-' . rand(0, 9999);

                    $ext = $model->img->extension;

                    $file = $name . '.' . $ext;

                    $uploadPath = '../../frontend/web/uploads/' . $file;

                    $model->img->saveAs($uploadPath);

                    $path = 'uploads/' . $file;

                    $model->img = $path;
                    
                    if(is_file($old_img))
                    {
                        unlink($old_img);
                    }
                }else{
                    $model->img = $old_img;
                }
        
                if($model->save())
                {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
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
                $product = $this->findProductModel($id);
                
                $img = $product->img;

                if(is_file('../../frontend/web/'.$img) && $product->delete())
                {
                    unlink('../../frontend/web/'.$img);
                    
                    return $this->redirect(['index']);
                }else{
                    echo "fail";
                }
            }
            
            //查看某产品下的合同
            public function actionContractByProduct($id)
            {
                $data = Contract::find()->where(['product_id' => $id])->orderBy('id desc');
                $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => '10']);
                $model = $data->offset($pages->offset)->limit($pages->limit)->all();
                return $this->render('contractByProduct', [
                    'model' => $model,
                    'pages' => $pages,
                ]);
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
            if(($model = Product::findOne($id)) !== null){
                return $model;
            }else{
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    
}
