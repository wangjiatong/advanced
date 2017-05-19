<?php
namespace console\controllers;
use Yii;
use yii\console\Controller;
use common\models\Contract;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CheckContractsController extends Controller
{
    public $timeToEmail = '2018-2-28 17:30:00';

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
        
        $res = Contract::find()->select(['id', 'every_time'])->asArray()->all();//每项合同数组化
                
        print_r($res);
        
        foreach($res as $r)
        {
            $every_time_arr = explode(', ', $r['every_time']);//将每期到期时间数组化
            
            $lengthOfArr = count($every_time_arr);//分期次数
            
//            echo $lengthOfArr;
            
            $days = 5;//提前多久发送邮件
            
            for($i = 0; $i < $lengthOfArr; $i++)
            {
                $timeToCheck = strtotime($every_time_arr[$i]);
                
                $today = strtotime($this->timeToEmail);
                
                if($today > $timeToCheck)
                {
                    echo $every_time_arr[$i] . '该期已付！';
                }elseif($today < $timeToCheck && ($timeToCheck - $today)/86400 < $days){
//                    Contract::findOne($r['id']);
                    $mail = Yii::$app->mailer->compose();
                    
                    $mail->setTo('11228463@qq.com');
                    
                    $mail->setSubject('hello');
                    
                    $mail->setFrom(['mail@ewinjade.com' => '翌银玖德']);
                    
                    $mail->setHtmlBody('test');
                    
                    if($mail->send()){
                        
                        echo "发送成功！";
                        
                    }else{
                        
                        echo "发送失败！";
                        
                    }
                }else{
                    
                    echo "最近没有需要付款的！";
                    
                }
                        
            }
        }
        
        
        
        
        
    }
}
