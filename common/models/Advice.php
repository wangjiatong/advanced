<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advice".
 *
 * @property integer $id
 * @property integer $to_whom
 * @property integer $if_anonymous
 * @property string $advice
 */
class Advice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['to_whom', 'if_anonymous', 'advice'], 'required'],
            [['to_whom', 'if_anonymous'], 'integer'],
            [['advice'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'to_whom' => '投递对象',
            'if_anonymous' => '是否匿名',
            'advice' => '意见建议',
        ];
    }
}
