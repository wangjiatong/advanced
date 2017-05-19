<?php
namespace backend\models;

use yii\base\Model;
use backend\models\UserRole;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UserRoleForm extends Model{
    
    public $user_id;
    public $role_id;
    
    public function rules()
    {
        return [
            ['user_id', 'required'],
            ['user_id', 'unique', 'targetClass' => '\backend\models\UserRole', 'message' => '不可以重复为同一用户设置角色！'],
            ['role_id', 'required'],
            ['created_at', 'safe'],
        ];
    }
    public function attributeLabels() {
        return [
            'user_id' => '用户姓名',
            'role_id' => '角色名称',
        ];
    }
    public function set()
    {
        $role_ids = $this->role_id;
        foreach ($role_ids as $r)
        {
            $res = UserRole::find()->where(['user_id' => $this->user_id, 'role_id' => $r])->one();
            if($res){
                return false;
            }
            $user_role = new UserRole();
            $user_role->user_id = $this->user_id;
            $user_role->role_id = $r;
            $user_role->created_at = date('Y-m-d H:i:s');
            $user_role->save();
        }
        return true;
    }
}
