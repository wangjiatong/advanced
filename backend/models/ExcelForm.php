<?php
namespace backend\models;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\base\Model;

class ExcelForm extends Model
{
    public $product_id;
    public $start_time;
    public $end_time;
    public $user_id;
    
    public function rules() {
        return [
            
        ];
    }
    public function attributeLabels() {
        return [
            'product_id' => '产品名称',
            'user_id' => '客户姓名',
            'start_time' => '查询起始时间',
            'end_time' => '查询结束时间',
        ];
    }
}
