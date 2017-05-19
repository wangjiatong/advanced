<?php
namespace backend\models;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\base\Model;
use backend\models\RoleAccess;

class RoleAccessForm extends Model
{
    public $role_id;
    public $access_id;
    
    public function rules()
    {
        return [
            ['role_id', 'required'],
            ['access_id', 'required'],
        ];
    }
    
    public function attributeLabels() 
    {
        return [
                'role_id' => '角色名称',
                'access_id' => '权限名称',
        ];
    }
    
    public function create()
    {
        $access_ids = $this->access_id;
        
        foreach ($access_ids as $a)
        {
            $res = RoleAccess::find()->where(['role_id' => $this->role_id, 'access_id' => $a])->one();
            if($res)
            {
                return false;
            }                    
            $role_access = new RoleAccess();
            $role_access->role_id = $this->role_id;
            $role_access->access_id = $a;
            $role_access->created_time = date('Y-m-d H:i:s');
            $role_access->save();
        }
        return true;        
    }
    
}
