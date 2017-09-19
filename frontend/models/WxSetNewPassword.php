<?php
namespace frontend\models;
use common\models\UserWx;
use common\models\UserModel;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\base\Model;

class WxSetNewPassword extends Model
{
    public $newPassword;
    public $_newPassword;
    
    public function rules()
    {
        return [
            [['newPassword', '_newPassword'], 'required'],
        ];
    }
    
    public function setNewPassword($openid)
    {
        if($this->newPassword !== $this->_newPassword)
        {
            return false;
        }
        $user_id = UserWx::findUserByOpenid($openid);
        $user = UserModel::findOne($user_id);
        $user->setPassword($this->_newPassword);
        if($user->update())
        {
            return true;
        }
        return false;
    }
    
    public function attributeLabels() {
        return [
            'newPassword' => '新密码',
            '_newPassword' => '确认新密码',
        ];
    }
}
