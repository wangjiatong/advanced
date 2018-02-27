<?php
namespace backend\controllers;
use backend\controllers\common\BaseController;
use common\models\Contract;
use backend\models\Pay;

class StatisticController extends BaseController
{
    //公司全局统计页面
    public function actionOverall()
    {
        //产品占比
        $prodProp = Contract::getProductProportionByAccess();
        
        //每个月的兑付
        $paySumByMonth = Pay::getPaySumByMonth(10);
        //每个月的进账
        $capitalByMonth = Contract::getCapitalByMonth(10);
        
        //累计每个月的兑付
        $paySumByDate = Pay::getPaySumByDate(10);
        //累计每个月的进账
        $capitalSumByDate = Contract::getCapitalSumByDate(10);
        
        return $this->render('overall', [
            'prodProp' => $prodProp,
            'paySumByMonth' => $paySumByMonth,
            'capitalByMonth' => $capitalByMonth,
            'paySumByDate' => $paySumByDate,
            'capitalSumByDate' => $capitalSumByDate,
        ]);       
    }   

    //ajax获取某销售数据
    public function actionSearchSales($source)
    {
//         var_dump(Contract::getCapitalByMonth(7, $source));
//         exit();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Contract::getCapitalByMonth(8, $source);
    }
    
    
    
}
