<?php
namespace common\models;
use yii\base\Model;
use common\models\UserModel;
use Yii;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ChangeUserPasswd extends Model
{
    public $newPasswd;
    public $confirmNewPasswd;
    
    public function rules()
    {
        return [
            [['newPasswd', 'confirmNewPasswd'], 'required'],
            ['confirmNewPasswd', 'compare', 'compareAttribute' => 'newPasswd', 'operator' => '==='],//确认新密码

        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'newPasswd' => '新密码',
            'confirmNewPasswd' => '确认新密码',
        ];
    }
    
    public function resetPasswd($id)
    {
        if(!$this->validate())
        {
            return null;
        }
        $user = UserModel::findOne($id);
        $user->setPassword($this->confirmNewPasswd);
        return $user->save() ? true : false;
    }
    
    public function resetPasswdLogout($id)
    {
        if(!$this->validate())
        {
            return null;
        }
        $user = UserModel::findOne($id);
        $user->setPassword($this->confirmNewPasswd);
        if($user->save())
        {
            Yii::$app->user->logout();
            return true;
        }
    }
}
