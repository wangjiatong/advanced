<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_role".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 * @property string $created_at
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id'], 'integer'],
            [['created_at'], 'safe'],
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
            'role_id' => 'Role ID',
            'created_at' => 'Created At',
        ];
    }
}
