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
            ['confirmNewPasswd', 'compare', 'compareAttribute' => 'newPasswd', 'operator' => '==='],//确认新密码

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
    
    public function reset()
    {
        if(!$this->validate())
        {
            return null;
        }
        $user = Admin::findOne(Yii::$app->user->identity->id);
        if($user->validatePassword($this->oldPasswd))
        {
            $user->setPassword($this->confirmNewPasswd);
            if($user->save())
            {
                Yii::$app->user->logout();
                return true;
            }
        }else{
            Yii::$app->getSession()->setFlash('wrong_old_passwd', '旧密码输入错误！');
            return false;
        }
    }

    
    
    
    
    
    
}

