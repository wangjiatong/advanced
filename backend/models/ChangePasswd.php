<?php
namespace backend\models;
use backend\models\Admin;
use Yii;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\base\Model;

class ChangePasswd extends Model
{
    public $oldPasswd;
    public $newPasswd;
    public $confirmNewPasswd;
    
    public function rules()
    {
        return [
            [['oldPasswd', 'newPasswd', 'confirmNewPasswd'], 'required'],
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'oldPasswd' => '旧密码',
            'newPasswd' => '新密码',
            'confirmNewPasswd' => '确认新密码',
        ];
    }
    
    public function resetPasswd()
    {
        if(!$this->validate())
        {
            return false;
        }
        $user = Admin::findOne(Yii::$app->user->identity->id);
        
        $oldPasswdHash = $user->password_hash;
        
        $oldPasswdToHash = $this->passwordToHash($this->oldPasswd);
        
        if($oldPasswdToHash == $oldPasswdHash && $this->newPasswd == $this->confirmNewPasswd)
        {
            $user->password_hash = $this->passwordToHash($this->newPasswd);
            return $user->save() ? true : false;
        }
        return false;
    }
    
    public function passwordToHash($password)
    {
        $passwdHash = Yii::$app->security->generatePasswordHash($password);
        return $passwdHash;
    }
    
    
    
    
    
    
}

