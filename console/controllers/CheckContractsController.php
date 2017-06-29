<?php
namespace console\controllers;
use Yii;
use yii\console\Controller;
use common\models\Contract;
use backend\models\Admin;
use common\models\UserModel;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CheckContractsController extends Controller
{
//    public $timeToEmail = '2018-2-28 17:30:00';

    public function actionCollect()
    {
//        return var_dump(Contract::find()->all());
        //计算时间差
//        $now = date('Y-m-d H:i:s');
//        $_1 = strtotime($now);
//        $_2 = strtotime($this->timeToEmail);
//        $c = $_2 - $_1;
//        $a = ceil($c/86400);
//        echo $a;
        //发邮件
//        $mail = Yii::$app->mailer->compose();
//        $mail->setTo('11228463@qq.com');
//        $mail->setSubject('test');
//        $mail->setFrom('ewinjade@163.com');
//        $mail->setHtmlBody('this is a test');
//        if($a ==3 && $mail->send()){
//            echo "发送成功";
//        }else{
//            echo "发送失败";
//        }
        //计算合同即将到期
//        var_dump(Contract::find()->select(['id', 'every_time'])->asArray()->all());
        
        $res = Contract::find()->select(['id', 'every_time', 'contract_number', 'user_id', 'every_interest'])->asArray()->all();//每项合同数组化
                
//        print_r($res);
        
        foreach($res as $r)
        {
            $every_time_arr = explode(', ', $r['every_time']);//将每期到期时间数组化
            
            $lengthOfArr = count($every_time_arr);//分期次数
            
//            echo $lengthOfArr;
            
            $days = 5;//提前多久发送邮件（天）
            
            for($i = 0; $i < $lengthOfArr; $i++)
            {
                $timeToCheck = strtotime($every_time_arr[$i]);
                
//                $today = strtotime($this->timeToEmail);
                $today = strtotime(date('Y-m-d H:i:s'));
                
                if($today < $timeToCheck && ($timeToCheck - $today)/86400 < $days){
//                    Contract::findOne($r['id']);
                    $mail = Yii::$app->mailer->compose();

                    $sale_id = Contract::findOne($r['id'])->source;

                    $sale = Admin::findOne($sale_id);

                    $mail->setTo($sale->email);

                    $mail->setSubject('客户待付提醒：'.UserModel::findOne($r['user_id'])->name);

                    $mail->setFrom(['mail@ewinjade.com' => '翌银玖德']);

                    $mail->setHtmlBody('合同编号：'.Contract::findOne($r['id'])->contract_number);

                    $mail->send();

                }
                        
            }
        }
        
        
        
        
        
    }
}
