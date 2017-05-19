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
class testController extends Controller
{
    public $timeToEmail = '2017-05-04 17:30:00';
    
    public function actionMy()
    {
        return var_dump(Contract::find()->all());
    }
}
