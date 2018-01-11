<?php 
namespace console\controllers;
use yii\console\Controller;
use common\models\Contract;

class CheckContractStatusController extends Controller
{
    public function actionCheckStatus()
    {
        $today = date('Y-m-d');
        $findIds = Contract::find()->select('id')->where(['<', 'cash_time', $today])
                   ->asArray()->all();
        
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
            $single_data->status = 0;//更改合同状态为已兑付 
            $single_data->update(false);
        }
    }
}



?>