<?php
namespace backend\controllers;

use Yii;
use common\models\Contract;
use common\models\ContractSearch;
use backend\controllers\common\BaseController;
use yii\web\NotFoundHttpException;
//新建合同表单
use backend\models\ContractForm;
//上传文件
use yii\web\UploadedFile;
//销售查看个人客户合同
use common\models\MyContractSearch;
//导出excel
use backend\models\ExcelForm;
use scotthuangzl\export2excel\Export2ExcelBehavior;
use common\models\UserModel;
use backend\models\Admin;
use common\models\Product;

/**
 * ContractController implements the CRUD actions for Contract model.
 */
class ContractController extends BaseController
{
    public function behaviors()
    {
        return [
        //above is your existing behaviors
        //new add export2excel behaviors
            'export2excel' => [
                    'class' => Export2ExcelBehavior::className(),
        //            'prefixStr' => yii::$app->user->identity->username,
        //            'suffixStr' => date('Ymd-His'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'download' => [
                'class' => 'scotthuangzl\export2excel\DownloadAction',
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
            
            if($model->pdf !== null)
            {       
                $name = 'c' . $model->user_id . '-' . date('Y-m-d') . '_' . rand(0, 9999);

                $ext = $model->pdf->extension;

                $file = $name . '.' . $ext;

                $uploadPath = 'uploads/contracts/' . $file;

                $model->pdf->saveAs($uploadPath);

                $path = 'uploads/contracts/' . $file;

                $model->pdf = $path;
            }

            if($model->save())
            {
                return $this->redirect([parent::checkUrlAccess('contract/index', 'contract/my-contract')]);
            }
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
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
//    public function actionMyUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }

    /**
     * Deletes an existing Contract model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
//    public function actionDelete($id)
//    {
//        $contract = $this->findMyModel($id);
//        
//        $pdf = $contract->pdf;
//        
//        if(is_file($pdf) && $contract->delete())
//        {
//            unlink($pdf);
//            
//            return $this->redirect(['index']);
//            
//        }else{
//            echo '删除失败！';
//        }
//    }
    public function actionMyDelete($id)
    {
        $contract = $this->findMyModel($id);

        $pdf = $contract->pdf; 

        if($contract->delete())
        {
            if(is_file($pdf))
            {
                unlink($pdf);
            }

            return $this->redirect([parent::checkUrlAccess('contract/my-contract', 'contract/index')]);

        }       
    }
    //按产品和时间范围导出合同excel
    public function actionExcel()
    {
        $excel_form = new ExcelForm();
        if($excel_form->load(Yii::$app->request->post()))
        {
            $model = Yii::$app->request->post()['ExcelForm'];
            $product_id = $model['product_id'];
            $user_id = $model['user_id'];
            $start_time = $model['start_time'];
            $end_time = $model['end_time'];
            //将查询条件组成数组
            $searchArr = ['product_id' => $product_id, 'user_id' => $user_id];
            $search = $this->excelSearchArr($searchArr);//获取查询条件数组
            $ids = [];
            $by_product = Contract::find()->select(['id', 'every_time'])->where($search)->all();
            foreach ($by_product as $b)
            {
                $every_time = $b['every_time'];
                $every_time_arr = explode(', ', $every_time);
                foreach ($every_time_arr as $e)
                {
                    $e = strtotime($e);
                    $start_time_str = strtotime($start_time);
                    $end_time_str = strtotime($end_time);
                    if($e > $start_time_str && $e < $end_time_str && $end_time_str > $start_time_str)
                    {
                        $ids[] = $b['id'];
                    }
                }                  
            }
            $res =[];
            foreach ($ids as $id)
            {
                $res[] = Contract::find()->select('id, user_id, source, product_id, capital, every_time, every_interest, bank, bank_user, bank_number, transfered_time, found_time, cash_time, raise_interest_year, raise_day, raise_interest, interest_year, interest, term_month, term, total_interest, total')->asArray()->where(['id' => $id])->one();
            }
            if($res)
            {
            $res_key = ['合同id', '客户姓名', '客户经理', '产品名称', '本金（元）', '每期付息日期', '每期付息金额（元）', '开户行', '开户名', '卡号', '到账日期', '成立日期', '兑付日期', '募集期利率（%）', '募集天数', '募集期利息', '年利率（%）', '成立期利息', '期限（月）', '付息频率（月）', '应付总利息（元）', '本息（元）' ];
            //对数组的键值进行处理从而输出中文
            $i = 0;
            foreach($res as $r)
            {
                $x = 0;
                foreach($r as $k => $v)
                {
                    switch ($k)
                    {
                        case 'user_id': $new_res[$i][$res_key[$x]] = UserModel::findOne($v)->name; break;
                        case 'source': $new_res[$i][$res_key[$x]] = Admin::findOne($v)->name; break;
                        case 'product_id': $new_res[$i][$res_key[$x]] = Product::findOne($v)->product_name; break;
                        default : $new_res[$i][$res_key[$x]] = $v; break;
                   
                    }                       
                    $x++;
                }
                $i++;
            }
            $excel_data = Export2ExcelBehavior::excelDataFormat($new_res);
            $excel_title = $excel_data['excel_title'];
            $excel_ceils = $excel_data['excel_ceils'];
            $excel_content = [
                [
                    'sheet_name' => '待付合同信息',
                    'sheet_title' => $excel_title,
                    'ceils' => $excel_ceils,
                    'freezePane' => 'B2',
                    'headerColor' => Export2ExcelBehavior::getCssClass('header'),
                    'headerColumnCssClass' => [
                        'id' => Export2ExcelBehavior::getCssClass('blue'),
                        'Status_Description' => Export2ExcelBehavior::getCssClass('grey'),
                    ],
                    'oddCssClass' => Export2ExcelBehavior::getCssClass('odd'),
                    'evenCssClass' => Export2ExcelBehavior::getCssClass('even'),
                ],
            ];
            $excel_file = ($product_id ? Product::findOne($product_id)->product_name . '-' : '所有产品-').
                    ($user_id ? UserModel::findOne($user_id)->name . '-' : '所有客户-').
                    $start_time.
                    '至'.
                    $end_time.
                    '待付合同';
            $this->export2excel($excel_content, $excel_file);         
            }else{
                print_r('无符合查询条件的合同！');
                echo \yii\helpers\Html::a('点击返回', ['contract/excel']);
            }
        }else{
            return $this->render('excel', [
                'model' => $excel_form,
            ]);
        }
    }
    //上传确认函扫描件
    public function actionUploadConfirmation($id)
    {
        $model = $this->findMyModel($id);
        
        if ($model->load(Yii::$app->request->post())) 
        {       
            $model->pdf = UploadedFile::getInstance($model, 'pdf');
            
            if($model->pdf !== null)
            {       
                $name = 'c' . $model->user_id . '-' . date('Y-m-d') . '_' . rand(0, 9999);

                $ext = $model->pdf->extension;

                $file = $name . '.' . $ext;

                $uploadPath = 'uploads/contracts/' . $file;

                $model->pdf->saveAs($uploadPath);

                $path = 'uploads/contracts/' . $file;

                $model->pdf = $path;
            }

            if($model->save())
            {
                return $this->redirect([parent::checkUrlAccess('contract/view', 'contract/my-view'), 'id' => $model->id]);
            }
        }
        return $this->render('uploadConfirmation', [
            'model' => $model,
        ]);
    }
    
    //删除确认函
    public function actionDeleteConfirmation($id)
    {
        $contract = $this->findMyModel($id);

        $pdf = $contract->pdf;

        if(is_file($pdf))
        {
            unlink($pdf);
            
            $contract->pdf = null;
            $contract->save();

            return $this->redirect([parent::checkUrlAccess('contract/my-view', 'contract/view'), 'id' => $id]);

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
            throw new NotFoundHttpException('该合同不属于您，您无权操作！');
        }
    }
    
    //处理excel筛选条件数组
    protected function excelSearchArr($arr)
    {
        $res = [];
        foreach($arr as $k => $v)
        {
            if($v !== '')
            {
                $res[$k] = $v;
            }
        }
        if($res == null)
        {
            return true;
        }
        return $res;
    }
}
