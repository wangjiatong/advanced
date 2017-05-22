<?php
namespace backend\controllers;

use Yii;
use common\models\Contract;
use common\models\ContractSearch;
use backend\controllers\common\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//加入权限控制
use yii\filters\AccessControl;
//新建合同表单
use backend\models\ContractForm;
//上传文件
use yii\web\UploadedFile;
//销售查看个人客户合同
use common\models\MyContractSearch;

/**
 * ContractController implements the CRUD actions for Contract model.
 */
class ContractController extends BaseController
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
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Contract models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContractSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionMyContract()
    {
        $searchModel = new MyContractSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);        
    }

    /**
     * Displays a single Contract model.
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
     * Creates a new Contract model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ContractForm();

        if ($model->load(Yii::$app->request->post())) 
        {       
            $model->pdf = UploadedFile::getInstance($model, 'pdf');
            
            $name = 'c' . $model->user_id . '-' . date('Y-m-d') . '-' .rand(9, 99);
            
            $ext = $model->pdf->extension;
            
            $file = $name . '.' . $ext;
            
            $uploadPath = 'uploads/contracts/' . $file;
            
            $model->pdf->saveAs($uploadPath);
            
            $path = 'uploads/contracts/' . $file;
            
            $model->pdf = $path;
            
            $model->save();
            
            return $this->redirect(['/contract']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Contract model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionMyUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Contract model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $contract = $this->findMyModel($id);
        
        $pdf = $contract->pdf;
        
        if(is_file($pdf) && $contract->delete())
        {
            unlink($pdf);
            
            return $this->redirect(['index']);
            
        }else{
            echo '删除失败！';
        }
    }
    public function actionMyDelete($id)
    {
        $contract = $this->findMyModel($id);
        
        $pdf = $contract->pdf;
        
        if(is_file($pdf) && $contract->delete())
        {
            unlink($pdf);
            
            return $this->redirect(['index']);
            
        }else{
            echo '删除失败！';
        }
    }

    /**
     * Finds the Contract model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contract the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contract::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findMyModel($id)
    {
        $my_id = Yii::$app->user->identity->id;
        if (($model = Contract::find()->where(['id' => $id, 'source' => $my_id])->one()) !== null)
        {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
