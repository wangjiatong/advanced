<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_columns".
 *
 * @property integer $id
 * @property string $product_column
 */
class ProductColumn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_column';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_column'], 'required'],
            [['product_column'], 'string', 'max' => 255],
            [['product_column'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '产品分类ID',
            'product_column' => '产品分类',
        ];
    }
    
//    public function getProductColumn()
//    {
//        return $this->product_column;
//    }
}
