<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "access_token".
 *
 * @property integer $id
 * @property string $access_token
 * @property integer $expires_in
 * @property string $timestamp
 */
class AccessToken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expires_in'], 'integer'],
            [['timestamp'], 'safe'],
            [['access_token'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'access_token' => 'Access Token',
            'expires_in' => 'Expires In',
            'timestamp' => 'Timestamp',
        ];
    }
}
