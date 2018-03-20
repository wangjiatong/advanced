<?php
namespace backend\models;

use yii\base\Model;
use common\models\UserModel;
use Yii;

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
    public $source;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\UserModel', 'message' => '该账号已被占用！'],
            ['username', 'string', 'min' => 6, 'max' => 30],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 40],
            ['email', 'unique', 'targetClass' => '\common\models\UserModel', 'message' => '该邮箱已被注册！'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6, 'max' => 20],
            
            [['name', 'sex'], 'required'],
            
            ['sex', 'integer', 'message' => '性别不能为空！'],
            
            [['phone_number', 'birthday'], 'safe'],
            
            ['source', 'integer', 'on' => ['create-all']],
            ['source', 'required', 'on' => ['create-all']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function attributeLabels() {
        return [
            'username' => '*用户名',
            'email' => '*电子邮箱',
            'password' => '*密码',
            'name' => '*客户姓名',
            'sex' => '*性别',
            'birthday' => '生日',
            'phone_number' => '电话号码',
            'source' => '客户经理',
        ];
    }
    public function signup()
    {
       if (!$this->validate()) {
           return null;
       }
       
        if(in_array('contract/create-all', Yii::$app->session['allowed_urls']))
        {
            $this->scenario = 'create-all';
        }
        
        $user = new UserModel();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->name = $this->name;
        $user->sex = $this->sex;
        $user->birthday = $this->birthday;
        $user->phone_number = isset($this->phone_number) ? $this->phone_number : 0;
        $user->source = empty($this->source) ? Yii::$app->user->identity->id : $this->source;

        return $user->save() ? $user : null;
    }
}
