<?php 
namespace console\controllers;
use yii\console\Controller;
use common\models\Contract;

class CorrectContractMoneyController extends Controller
{
    public function actionCorrect()
    {
        $findIds = Contract::find()->select('id')->asArray()->all();
        foreach ($findIds as $k => $v)
        {
            foreach ($v as $key => $value)
            {
                $ids_res[] = $value;
            } 
        }

        foreach($ids_res as $id)
        {
            $single_data = Contract::findOne($id);
            $single_data->raise_interest = round($single_data->capital * $single_data->raise_day / 365 * $single_data->raise_interest_year / 100, 2);//募集期利息
            $single_data->interest = round($single_data->capital * $single_data->interest_year / 100 * $single_data->term_month / 12, 2);//成立期利息
            $single_data->total_interest = $single_data->raise_interest + $single_data->interest;//应付利息总额
            $single_data->total = round($single_data->capital + $single_data->total_interest, 2);//兑付总额（本金+利息）hgnhbn
            $single_data->update(false);
        }
        
        echo "success!";
    }
}