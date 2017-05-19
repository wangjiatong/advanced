<?php
namespace backend\models;
use yii\base\Model;
use backend\models\Access;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AccessForm extends Model
{
    public $access_name;
    public $urls;
    

    public function rules()
    {
        return [
            ['access_name', 'required'],
            ['access_name', 'string'],
            ['urls', 'required'],
            ['urls', 'string'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'access_name' => '权限名称',
            'urls' => '权限路径',
        ];
    }
    
    public function create()
    {
        $access = new Access();
        $access->access_name = $this->access_name;
        $access->urls = $this->urls;
        $access->created_time = date('Y-m-d H:i:s');
        return $access->save() ? $access : null; 
    }
            
    
}
