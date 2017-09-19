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

class VerifyWxForm extends Model
{
    public $username;
    public $password;
    
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'username' => '账号',
            'password' => '密码',
        ];
    }
    
    public function verifyUser($openid)
    {
        if(($user = UserModel::findByUsername($this->username)) !== null)
        {
            if(UserWx::findOne(['openid' => $openid]))
            {
                //该微信已绑定某账户
                return false;
            }
            if(UserWx::findOne(['user_id' => $user->id]))
            {
                //该账户已绑定某微信
                return false;
            }
            if(UserWx::findOne(['openid' => $openid]) && UserWx::findOne(['user_id' => $user->id]))
            {
                //该微信已绑定该账户
                return false;
            }
            if($user->validatePassword($this->password))
            {
                $user_wx = new UserWx();
                $user_wx->openid = $openid;
                $user_wx->user_id = $user->id;
                if($user_wx->save())
                {
                    //微信与账户成功绑定
                    return true;
                }
            }
            //用户输入的该账户密码错误
            return false;
        }
        //不存在用户所输入的账户
        return false;
    }
    
    
    
    
    
    
    
}
