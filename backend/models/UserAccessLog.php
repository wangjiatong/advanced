<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_access_log".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $target_url
 * @property string $query_params
 * @property string $ua
 * @property string $ip
 * @property string $note
 * @property string $created_time
 */
class UserAccessLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_access_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['user_id'], 'integer'],
//            [['query_params'], 'required'],
//            [['query_params'], 'string'],
//            ['created_time', 'safe'],
//            [['target_url', 'ua', 'ip', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'target_url' => 'Target Url',
            'query_params' => 'Query Params',
            'ua' => 'Ua',
            'ip' => 'Ip',
            'note' => 'Note',
            'created_time' => 'Created Time',
        ];
    }
}
