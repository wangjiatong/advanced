<?php
namespace backend\models;

use yii\base\Model;
use common\models\UserModel;

/**
 * Signup form
 */
class UserSignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $name;
    public $sex;
    public $birthday;
    public $phone_number;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\UserModel', 'message' => '该账号已被占用！'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\UserModel', 'message' => '该邮箱已被注册！'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            [['name', 'sex', 'birthday', 'phone_number'], 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function attributeLabels() {
        return [
            'username' => '账户',
            'email' => '电子邮箱',
            'password' => '密码',
            'name' => '客户姓名',
            'sex' => '性别',
            'birthday' => '生日（格式：XXXX-XX-XX）',
            'phone_number' => '电话号码',
        ];
    }
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new UserModel();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->name = $this->name;
        $user->sex = $this->sex;
        $user->birthday = $this->birthday;
        $user->phone_number = $this->phone_number;
        
        return $user->save() ? $user : null;
    }
}
