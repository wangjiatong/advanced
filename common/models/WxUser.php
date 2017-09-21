<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wx_user".
 *
 * @property integer $id
 * @property string $openid
 * @property string $nickname
 * @property integer $sex
 * @property string $language
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $headimgurl
 */
class WxUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wx_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['openid', 'nickname', 'sex', 'language', 'city', 'province', 'country', 'headimgurl'], 'required'],
//            [['sex'], 'integer'],
//            [['openid', 'nickname', 'language', 'city', 'province', 'country', 'headimgurl'], 'string', 'max' => 255],
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
            'nickname' => 'Nickname',
            'sex' => 'Sex',
            'language' => 'Language',
            'city' => 'City',
            'province' => 'Province',
            'country' => 'Country',
            'headimgurl' => 'Headimgurl',
        ];
    }
}
