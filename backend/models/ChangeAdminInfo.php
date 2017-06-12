<?php
namespace backend\models;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\base\Model;

class ChangeAdminInfo extends Model
{
    public $name;
    public $email;
    public $username;
    
    public function rules()
    {
        return [
            [['username', 'name', 'email'], 'required'],
//            ['email', 'unique', 'targetClass' => 'backend\models\Admin'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'name' => '姓名',
            'email' => '电子邮箱（*请勿修改为已录入过的邮箱）',
            'username' => '用户账户（*请勿修改为已录入过的账号）',
        ];
    }
    
        
    public function change($id)
    {
        if(!$this->validate())
        {
            return false;
        }
        $model = Admin::findOne($id);
        $model->username = $this->username;
        $model->email = $this->email;
        $model->name = $this->name;
        $model->updated_at = Date('now');
        return $model->update() ? true : false;
    }
    
    
    
    
    
    
    
}

