<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use common\models\Contract;
use yii\db\ActiveRecord;
use backend\models\Admin;
use yii\helpers\Json;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $name
 * @property string $sex
 * @property string $birthday
 * @property string $phone_number
 * @property string $source
 */
class UserModel extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    
    public $newPasswd;
    public $confirmNewPasswd;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'name', 'sex', 'birthday'], 'required'],
//            [['status', 'created_at', 'updated_at'], 'integer'],
//            [['username', 'password_hash', 'password_reset_token', 'email', 'name', 'sex', 'birthday'], 'string', 'max' => 255],
//            [['auth_key'], 'string', 'max' => 32],
//            [['username'], 'unique'],
//            [['email'], 'unique'],
//            [['password_reset_token'], 'unique'],
//            ['status', 'default', 'value' => self::STATUS_ACTIVE],
//            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
//            [['phone_number'], 'safe'],
//            ['source', 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户ID',
            'username' => '用户账号',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => '电子邮箱',
            'status' => '账号状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'name' => '姓名',
            'sex' => '性别',
            'birthday' => '生日',
            'phone_number' => '联系电话',
            'source' => '客户来源',
        ];
    }
    
     /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    //获取客户姓名
    public function getName($id)
    {
        $arr = UserModel::findOne($id);
        $name = $arr['name'];
        return $name;
    }
    
    //获取客户性别
    public function getSex($id)
    {
        $arr = UserModel::findOne($id);
        $sex = $arr['sex'];
        if($sex == 0)
        {
            return "先生";
        }else{
            return "女士";
        }
    }
    
    //通过客户获取对应合同
    public function getContracts()
    {
        return $this->hasMany(Contract::className(), ['user_id' => 'id']);
    }
    
    //获取客户姓名
    public function getCustomerName()
    {
        return $this->name;
    }
    
    //获取客户经理
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'source']);
    }
    
    /*  通过当前用户在session中所拥有的访问权限判断
     *  是获取销售个人客户总数or公司客户总数
     */
    public static function getUserNumByAccess()
    {
        $sql = static::find();
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            $userNum = $sql->where(['source' => Yii::$app->user->identity->id])->count();
        }else{
            $userNum = $sql->count();
        }
        return $userNum;
    }
    
    /*
     * 获取最近几个月的每个月的客户数
     */
    public static function getUserNumByMonth($months)
    {
//         $months = 5;//查询六个月内的
        $sql = static::find();//用户模型
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            $data = $sql->where(['source' => Yii::$app->user->identity->id]);
            $wherefunc = 'andWhere';
            return static::searchByMonth($data, $months, $wherefunc);
        }else{
            return static::searchByMonth($sql, $months);
        }
    }
    
    /*
     * 查询距今 $months 个月里，每个月内符合某字段条件下的记录数量
     * @param object $data 所要查询的模型对象
     * @param integer $months 查询月数
     * @param string $wherefunc 默认使用的查询条件，默认使用where()
     * @return json object 按月份从小到大的顺序排列的每月的数量
     */
    public static function searchByMonth($data, $months, $wherefunc = "where")
    {
        for($i = $months; $i >= 0; $i--)
        {
            $date = new \DateTime();//实例化当前日期对象
//             $date->format('YmtHis');
            //计算时间范围内每个月的起始及终止时间
            $start = strtotime($date->modify('-' . $i . 'months')->format('Y-m-01'));
            $end = strtotime($date->format('Y-m-t'));
            $whereCondition = ['between', 'created_at', $start, $end];
            $num = $data->$wherefunc($whereCondition)->count();
            $num_arr[] = [$date->format('Y-n'), $num];
        }
        return Json::encode($num_arr);
    }
        
        
        
        


}
