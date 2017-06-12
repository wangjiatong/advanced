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
            
            [['name', 'sex', 'birthday'], 'required'],
            
            [['phone_number'], 'safe'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function attributeLabels() {
        return [
            'username' => '用户账户（*用户名不可存在相同的）',
            'email' => '电子邮箱（*输入必须为正确的邮箱格式，如AAAA@BB.CC）',
            'password' => '用户密码（*做好登记）',
            'name' => '客户姓名',
            'sex' => '性别',
            'birthday' => '生日（*格式：AAAA-BB-CC，个位数则用0补齐到两位）',
            'phone_number' => '电话号码（*非必填）',
        ];
    }
    public function signup()
    {
//        if (!$this->validate()) {
//            return null;
//        }
        
        $user = new UserModel();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->name = $this->name;
        $user->sex = $this->sex;
        $user->birthday = $this->birthday;
        $user->phone_number = isset($this->phone_number) ? $this->phone_number : null;
        $user->source = Yii::$app->user->identity->id;

        return $user->save() ? $user : null;
    }
}
