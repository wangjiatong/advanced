<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "access".
 *
 * @property integer $id
 * @property string $access_name
 * @property string $urls
 * @property integer $status
 * @property string $updated_time
 * @property string $created_time
 */
class Access extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['updated_time', 'created_time'], 'safe'],
            [['access_name'], 'string', 'max' => 50],
            [['urls'], 'string', 'max' => 1000],
            [['access_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'access_name' => '权限名称',
            'urls' => '权限路径',
            'status' => '状态',
            'updated_time' => '更新时间',
            'created_time' => '创建时间',
        ];
    }
}
