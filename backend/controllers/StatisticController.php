<?php
namespace backend\controllers;
use backend\controllers\common\BaseController;
use common\models\Contract;

class StatisticController extends BaseController
{
    //公司全局统计页面
    public function actionOverall()
    {
        $byMonth = $this->incomeMonth();
        $overrall = $this->incomeSum();
        return $this->render('overall', [
            'byMonth' => $byMonth,
            'overall' => $overrall,
        ]);       
    }    
    
    //销售个人统计页面
    public function actionPersonal()
    {

    }
    
    //当月进账
    public function incomeMonth()
    {
        $start = date('Y-m') . '-01';
        $end = date('Y-m-t');
        $sumMonth = Contract::find()->select(['SUM(capital) as sum'])->where(['between', 'transfered_time', $start, $end])
        ->asArray()->all();
        return $sumMonth;
    }
    
    //当年进账
    public function incomeByYear()
    {
        
    }
    
    //累计进账
    public function incomeSum()
    {
        $sum = Contract::find()->select(['SUM(capital) as sum'])
        ->asArray()->all();
        return $sum;
    }
    
    //当月出账
    public function payMonth()
    {
        
    }
    
    //累计出账
    public function paySum()
    {
        
    }
    
    
    
    
    
    
    
}
