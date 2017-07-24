<?php
namespace common\models;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\base\Model;
use common\models\UserModel;

class ChangeUserInfo extends Model
{
    public $username;
    public $email;
    public $name;
    public $sex;
    public $birthday;
    public $phone_number;
    
    public function rules()
    {
        return [
            [['username', 'email', 'name', 'sex', 'birthday', 'phone_number'], 'safe'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'username' => '用户账号（*请勿修改为已录入过的账号）',
            'email' => '电子邮箱（*请勿修改为已录入过的邮箱，输入必须为正确的邮箱格式，如AAAA@BB.CC）',
            'name' => '姓名',
            'sex' => '性别',
            'birthday' => '生日生日（*格式：AAAA-BB-CC，个位数则用0补齐到两位）',
            'phone_number' => '联系电话（*非必填）',
        ];
    }
    
    public function change($id)
    {
        if(!$this->validate())
        {
            return false;
        }
        $model = UserModel::findOne($id);
        $model->username = $this->username;
        $model->email = $this->email;
        $model->name = $this->name;
        $model->sex = $this->sex;
        $model->birthday = $this->birthday;
        $model->phone_number = $this->phone_number;
        $model->updated_at = Date('now');
        return $model->update() ? true : false;
    }
}
