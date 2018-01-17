<?php
namespace console\controllers;
 
use yii\console\Controller;
use backend\models\Pay;
use yii\db\Query;

class GeneratePayController extends Controller
{
    public function actionGeneratePay()
    {   
        //提取出共用sql语句部分
        $sql = (new Query())
                ->select(['id', 'every_time', 'every_interest', 'source', 'user_id'])
                ->from('contract');

        /* 
         * （三元操作）
         * 如果已经执行过向Pay表中插入付息数据 ？
         * 则从Pay表中查询最新的一条记录并取得它对应的合同的id，
         * 然后当向Pay插入数据时从大于该合同id的开始，避免重复操作 ：
         * 否则执行完全插入
         */
        if($query = (($lastestPay = Pay::find()->orderBy('id desc')->one()) ?
            $sql->where(['>', 'id', $lastestPay->cid]) :
            $sql))
        {
            //当Pay表中已存在数据并且不存在还没插入的信息时则不进入foreach循环
            foreach ($query->each() as $contract)
            {
                $every_time = explode(', ', $contract['every_time']);
                $every_interest = explode(', ', $contract['every_interest']);
                foreach($every_time as $key => $val)
                {
                    $pay = new Pay();
                    $pay->cid = $contract['id'];
                    $pay->time = $val;
                    $pay->interest = $every_interest[$key];
                    $pay->source = $contract['source'];
                    $pay->uid = $contract['user_id'];
                    $pay->save();
                }
            }
        }
    }
}
?>