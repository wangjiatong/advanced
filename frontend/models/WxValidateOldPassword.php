<?php
namespace frontend\models;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\base\Model;
use common\models\UserModel;
use common\models\UserWx;

Class WxValidateOldPassword extends Model
{
    public $oldPassword;
    
    public function rules() {
        return [
            ['oldPassword', 'required'],
        ];
    }
    
    public function validateOldPassword($openid)
    {
        $user_id = UserWx::findUserByOpenid($openid);
        
        $user = UserModel::findOne($user_id);

        if($user->validatePassword($this->oldPassword))
        {
            return true;
        }
        return false;
    }
    
    public function attributeLabels() {
        return [
            'oldPassword' => '旧密码',
        ];
    }
    
    
}
