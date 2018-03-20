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
use backend\models\Pay;
use common\models\EquityContract;
use common\models\EquityContractSearch;
use common\models\MyEquityContractSearch;

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
        $searchModel = new ContractSearch();//固定收益
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $searchModel2 = new EquityContractSearch();//股权投资
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
        ]);
    }
    
    public function actionMyContract()
    {
        $searchModel = new MyContractSearch();//固定收益
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $searchModel2 = new MyEquityContractSearch();//股权投资
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,           
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
    
    public function actionEquityView($id)
    {
        return $this->render('equityView', [
            'model' => $this->findEquityModel($id),
        ]);
    }
    
    public function actionMyEquityView($id)
    {
        return $this->render('equityView', [
            'model' => $this->findMyEquityModel($id),
        ]);
    }
    
    public function actionUpdatePartialEquity()
    {
        $id = Yii::$app->request->post()['id'];//待更新股权投资合同的id
        
        $model = EquityContract::findOne($id);
        
        //当具有全局编辑权限或者合同属于自己时允许修改
        if(in_array('contract/create-all', Yii::$app->session['allowed_urls']) || $model->source == Yii::$app->user->identity->id)
        {
            if(Yii::$app->request->isAjax)
            {
                if($model->updatePartial($model))
                {
                    return 'success';
                }else{
                    return 'fail';
                }
            }else{
                throw new NotFoundHttpException('无权直接访问！');
            }
        }else{
            throw new NotFoundHttpException('您无权修改该合同！');
        }
    }

    /**
     * Creates a new Contract model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {      
        $model = new ContractForm();
        
        if(in_array('contract/create-all', Yii::$app->session['allowed_urls']))
        {
            $model->scenario = 'create-all';
        }

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
     * 创建股权投资合同
     */
    public function actionCreateEquity()
    {
        $model = new EquityContract();

        if(in_array('contract/create-all', Yii::$app->session['allowed_urls']))
        {
            $model->scenario = 'create-all';    
        }
        
        if($model->load(Yii::$app->request->post()))
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
            
            if($model->create())
            {
                return $this->redirect([parent::checkUrlAccess('contract/index', 'contract/my-contract')]);
            }   
        }
        return $this->render('createEquity', [
            'model' => $model,
        ]);
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

    /*
     * 改变合同是否含有浮动利率的状态
     */
    public function actionSetFloat($id, $status)
    {
         if($contract = $this->findModel($id))
         {
             $contract->if_float = $status;
             if($status == 0)
             {
                 $contract->float_interest = 0;
             }
             if($contract->update())
             {
                return $this->redirect(Yii::$app->request->referrer);
             }
         }else{
            throw new NotFoundHttpException('该合同不存在！');
         }
    }

    /*
     * 执行设置浮动利息的操作
     */
    public function actionSetFloatInterest($id)
    {
        if($contract = $this->findModel($id))
        {
            if($contract->load(Yii::$app->request->post()))
            {
                $contract->float_interest = Yii::$app->request->post()['Contract']['float_interest'];
                if($contract->update())
                {
                    return $this->redirect(['contract/view', 'id' => $contract->id]);
                }
            }
            return $this->render('setFloatInterest', [
                'model' => $contract,
            ]);
        }else{
            throw new NotFoundHttpException('该合同不存在！');
        }        
    }
    
    /*
     * 删除属于某销售自己的合同
     */
    public function actionMyDelete($id)
    {
        $contract = $this->findMyModel($id);
        $pdf = $contract->pdf;
        $transaction = Yii::$app->db->beginTransaction();
        try{
            if(!$contract->delete())
            {
                throw new \Exception('合同删除失败');
            }
            
            if(Pay::findOne(['cid' => $contract->id]) && !Pay::deleteAll(['cid' => $contract->id]))
            {
                throw new \Exception('待付信息删除失败');
            }
            
            $transaction->commit();
            
            if(!empty($pdf) && is_file($pdf))
            {
                unlink($pdf);
            }
            
            return $this->redirect([parent::checkUrlAccess('contract/index', 'contract/my-contract')]);
        }catch (\Exception $e){
            $transaction->rollBack();
            return $this->redirect(Yii::$app->request->referrer);
        }     
    }

    //按产品名称、客户姓名和时间范围导出合同excel
    public function actionExcel()
    {
        $excel_form = new ExcelForm();
        if($excel_form->load(Yii::$app->request->post()) && $excel_form->valTime())
        {
            $model = Yii::$app->request->post()['ExcelForm'];
            $product_id = $model['product_id'];
            $user_id = $model['user_id'];
            $start_time = $model['start_time'];
            $end_time = $model['end_time'];
            
            //将查询条件组成数组
            $searchArr = ['product_id' => $product_id, 'user_id' => $user_id];

            $by_product_and_name = Contract::find()->select(['id', 'user_id', 'source', 
                'product_id', 'capital', 'every_time', 'every_interest', 'bank', 'bank_user', 
                'bank_number', 'transfered_time', 'found_time', 'cash_time', 
                'raise_interest_year', 'raise_day', 'raise_interest', 'interest_year', 
                'interest', 'term_month', 'term', 'total_interest', 'total',  
                'float_interest'])
            ->where($searchArr)->asArray()->all();
      
            //接下来再按时间段进行筛选
            $res = array();//筛选过时间并经翻译的符合条件的合同数组
            
            foreach ($by_product_and_name as $b)
            {
                $every_time = $b['every_time'];
                $every_interest = $b['every_interest'];
                $every_time_arr = explode(', ', $every_time);
                $every_interest_arr = explode(', ', $every_interest);

                $countDate = 0;//符合时间段的日期所在数组位置
                
                foreach ($every_time_arr as $e)
                {
                    $e = strtotime($e);
                    $start_time_str = strtotime($start_time);
                    $end_time_str = strtotime($end_time);
                    
                    if($e > $start_time_str && $e < $end_time_str && $end_time_str > $start_time_str)
                    {
                        $b['every_time'] = $every_time_arr[$countDate];
                        $b['every_interest'] = $every_interest_arr[$countDate];
                        //对数组的键值进行处理从而输出中文
                        $res[] = $this->transForExcel($b);

                        $countDate = 0;
                    } 
                    $countDate++;
                }
            }
            
            //将数据传递给excel插件
            if($res){
                $excel_data = Export2ExcelBehavior::excelDataFormat($res);
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
    
    /*
     * 功能：生成当月进出账情况
     * 使用范围：contract/index
     * 
     */
    public function actionGenerateCurrentMonthExcel()
    {
        $startTime = date('Y-m-01');//当月第一天
        $endTime = date('Y-m-t');//当月最后一天
        
        //当月所有需要付息的
        $payThisMonth = Pay::find()->select('id, cid, time, interest')->where(['between', 'time', $startTime, $endTime])->asArray()->all();
        
        //分为<1.当月兑付>和<2.当月常规付息>
        foreach($payThisMonth as $id)
        {
            $cashTimePay = Pay::find()->where(['cid' => $id['cid']])->max('id');
            $contract = Contract::findOne($id['cid']);
            $user = UserModel::findOne($contract->user_id);
            $source = Admin::findOne($contract->source);
            if($cashTimePay == $id['id'])
            {
                // 待兑付合同信息
                $contractCashTime[] = [
                    '兑付时间' => $id['time'], 
                    '本息' => $id['interest'],
                    '客户姓名' => $user->name,
                    '客户经理' => $source->name,
                    '开户行' => $contract->bank,
                    '开户名' => $contract->bank_user,
                    '银行账号' => "'" . $contract->bank_number, 
                    '手机号' => $user->phone_number,
                ];
            }else{
                // 当月常规付息的
                $regularPay[] = [ 
                    '付息时间' => $id['time'], 
                    '付息金额' => $id['interest'],
                    '客户姓名' => $user->name,
                    '客户经理' => $source->name,
                    '开户行' => $contract->bank,
                    '开户名' => $contract->bank_user,
                    '银行账号' => "'" . $contract->bank_number, 
                    '手机号' => $user->phone_number,
                ];
            }
        }
        
        //<3.当月进账的合同>
        $contractThisMonth = Contract::find()->select('capital, transfered_time, source, product_id, user_id')->where(['between', 'transfered_time', $startTime, $endTime])->asArray()->all();
        
        //处理键名
        foreach ($contractThisMonth as $val)
        {
            $contractThisMonthRes[] = [
                '本金' => $val['capital'],
                '到账时间' => $val['transfered_time'],
                '客户经理' => Admin::findOne($val['source'])->name,
                '产品名称' => Product::findOne($val['product_id'])->product_name,
                '客户姓名' => UserModel::findOne($val['user_id'])->name,
            ];
        }

        //将数据传递给excel插件
        $data = [
            'contractCashTime' => $contractCashTime, 
            'regularPay' => $regularPay, 
            'contractThisMonthRes' => $contractThisMonthRes
        ];
        
        //如果$data不为空
        if($data) {
            if($this->createExcel($data, date('Y') . '年' . date('n') . '月待付兑付新进')) {
                return $this->redirect(['contract/index']);
            }
        }else{
            echo "<script>alert('当月暂无任何数据！')</script>";
            return $this->redirect(['contract/index']);
        }   
    }
    
    public function createExcel($data, $title)
    {
        if($data)
        {
            $excel_data1 = Export2ExcelBehavior::excelDataFormat($data['contractCashTime']);
            $excel_title1 = $excel_data1['excel_title'];
            $excel_ceils1 = $excel_data1['excel_ceils'];
            
            $excel_data2 = Export2ExcelBehavior::excelDataFormat($data['regularPay']);
            $excel_title2 = $excel_data2['excel_title'];
            $excel_ceils2 = $excel_data2['excel_ceils'];
            
            $excel_data3 = Export2ExcelBehavior::excelDataFormat($data['contractThisMonthRes']);
            $excel_title3 = $excel_data3['excel_title'];
            $excel_ceils3 = $excel_data3['excel_ceils'];
            
            $excel_content = [
                [
                    'sheet_name' => date('Y') . '年' . date('n') . '月待兑付合同',
                    'sheet_title' => $excel_title1,
                    'ceils' => $excel_ceils1,
                    'freezePane' => 'B2',
                    'headerColor' => Export2ExcelBehavior::getCssClass('header'),
                    'headerColumnCssClass' => [
                        'id' => Export2ExcelBehavior::getCssClass('blue'),
                        'Status_Description' => Export2ExcelBehavior::getCssClass('grey'),
                    ],
                    'oddCssClass' => Export2ExcelBehavior::getCssClass('odd'),
                    'evenCssClass' => Export2ExcelBehavior::getCssClass('even'),
                ],
                [
                    'sheet_name' => date('Y') . '年' . date('n') . '月常规付息',
                    'sheet_title' => $excel_title2,
                    'ceils' => $excel_ceils2,
                    'freezePane' => 'B2',
                    'headerColor' => Export2ExcelBehavior::getCssClass('header'),
                    'headerColumnCssClass' => [
                        'id' => Export2ExcelBehavior::getCssClass('blue'),
                        'Status_Description' => Export2ExcelBehavior::getCssClass('grey'),
                    ],
                    'oddCssClass' => Export2ExcelBehavior::getCssClass('odd'),
                    'evenCssClass' => Export2ExcelBehavior::getCssClass('even'),                    
                ],
                [
                    'sheet_name' => date('Y') . '年' . date('n') . '月新进合同',
                    'sheet_title' => $excel_title3,
                    'ceils' => $excel_ceils3,
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
            $excel_file = $title;
            $this->export2excel($excel_content, $excel_file);   
        }     
    }
    
    //上传确认函扫描件
    public function actionUploadConfirmation($id, $cat)
    {
        if($cat == 'fixed'){
            $model = $this->findMyModel($id);
        }elseif($cat == 'equity'){
            $model = EquityContract::findOne($id);
        }
        
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

            if($cat == 'fixed' ? $model->save() : $model->update())
            {
                return $this->redirect([
                    $cat == 'fixed' ? 
                    parent::checkUrlAccess('contract/view', 'contract/my-view') :
                    parent::checkUrlAccess('contract/equity-view', 'contract/my-equity-view'),
                    'id' => $id,
                ]);
            }
        }
        return $this->render('uploadConfirmation', [
            'model' => $model,
        ]);
    }
    
    //删除确认函
    public function actionDeleteConfirmation($id, $cat)
    {
        if($cat == 'fixed'){
            $contract = $this->findMyModel($id);
        }elseif($cat == 'equity'){
            $contract = EquityContract::findOne($id);
        }
        
        $pdf = $contract->pdf;
        
        if(is_file($pdf))
        {
            unlink($pdf);
        }

        $contract->pdf = null;
        $contract->save();
        
        return $this->redirect([
            $cat == 'fixed' ?
            parent::checkUrlAccess('contract/my-view', 'contract/view') :
            parent::checkUrlAccess('contract/equity-view', 'contract/my-equity-view'), 
            'id' => $id
        ]);
    }
    
    //选择创建合同类型弹窗
    public function actionSelectModal()
    {
        return $this->renderAjax('selectModal');
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
        }elseif(in_array('contract/create-all', Yii::$app->session['allowed_urls'])){
            return Contract::find()->where(['id' => $id])->one();
        }else{
            throw new NotFoundHttpException('该合同不属于您，您无权操作！');
        }
    }
    
    protected function findEquityModel($id)
    {
        if (($model = EquityContract::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findMyEquityModel($id)
    {
        $my_id = Yii::$app->user->identity->id;
        if (($model = EquityContract::find()->where(['id' => $id, 'source' => $my_id])->one()) !== null)
        {
            return $model;
        }elseif(in_array('contract/create-all', Yii::$app->session['allowed_urls'])){
            return Contract::find()->where(['id' => $id])->one();
        }else{
            throw new NotFoundHttpException('该合同不属于您，您无权操作！');
        }
    }
    
    //为excel翻译成中文
    protected function transForExcel($untrans)
    {
        $trans_key = ['合同id', '客户姓名', '客户经理', '产品名称', '本金（元）', '当期付息日期', '当期付息金额（元）', '开户行', '开户名', '卡号', '到账日期', '成立日期', '兑付日期', '募集期利率（%）', '募集天数', '募集期利息', '年利率（%）', '成立期利息', '期限（月）', '付息频率（月）', '应付总利息（元）', '本息（元）', '浮动利息（元）'];
        $ret_res = array();
        $offset = 0;
        foreach($untrans as $k => $v)
        {
            switch ($k)
            {
                case 'user_id': $ret_res[$trans_key[$offset]] = UserModel::findOne($v)->name; break;
                case 'source': $ret_res[$trans_key[$offset]] = Admin::findOne($v)->name; break;
                case 'product_id': $ret_res[$trans_key[$offset]] = Product::findOne($v)->product_name; break;
                //再银行卡号前加入空格防止被科学计数
                case 'bank_number': $ret_res[$trans_key[$offset]] = " " . $v; break;
                //对金额数字进行格式化
                case 'capital': $ret_res[$trans_key[$offset]] = number_format($v); break;
                case 'every_interest': $ret_res[$trans_key[$offset]] = number_format($v, 2); break;
                case 'raise_interest': $ret_res[$trans_key[$offset]] = number_format($v, 2); break;
                case 'interest': $ret_res[$trans_key[$offset]] = number_format($v, 2); break;
                case 'total_interest': $ret_res[$trans_key[$offset]] = number_format($v, 2); break;
                case 'total': $ret_res[$trans_key[$offset]] = number_format($v, 2); break;
                case 'float_interest': $ret_res[$trans_key[$offset]] = number_format($v, 2); break;
                default : $ret_res[$trans_key[$offset]] = $v; break;
            }
            $offset++;
        }
        return $ret_res;
    }
    
    //创建合同页面用于动态获取某销售对应的客户列表
    public function actionGetUsersBySource($source)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $users = UserModel::find()->select('name, id')->where(['source' => $source])->indexBy('id')->column();
        return $users;
    }
}
