<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use backend\models\Admin;
use backend\models\UserRole;

/**
 * Signup form
 */
class AdminSignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $name;
    
    


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\backend\models\Admin', 'message' => '该用户名已被占用！'],
            ['username', 'string', 'min' => 6, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\backend\models\Admin', 'message' => '该邮箱已注册过账号！'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['name', 'required'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'username' => '账号',
            'password' => '密码',
            'email' => '电子邮箱',
            'name' => '姓名',
            'role_id' => '用户角色',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Admin();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->name = $this->name;
        
        return $user->save() ? $user : null;
    }
}
