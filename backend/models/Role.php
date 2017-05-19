<?php

namespace backend\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property string $role_name
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Role extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            
            [['created_at', 'updated_at'], 'safe'],
            [['role_name'], 'string', 'max' => 20],
            [['role_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '角色ID',
            'role_name' => '角色名称',
            'status' => '角色状态',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
