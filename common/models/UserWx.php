<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_wx".
 *
 * @property integer $id
 * @property string $openid
 * @property integer $user_id
 */
class UserWx extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_wx';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['openid', 'user_id'], 'required'],
//            [['user_id'], 'integer'],
//            [['openid'], 'string', 'max' => 255],
//            [['openid'], 'unique'],
//            [['user_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'Openid',
            'user_id' => 'User ID',
        ];
    }
    
    public static function findUserByOpenid($openid)
    {
        return static::findOne(['openid' => $openid]);
    }
}
