<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $product_name
 * @property double $raise_interest_year
 * @property double $interest_year
 * @property integer $product_column_id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name'], 'required'],
            [['raise_interest_year', 'interest_year'], 'number'],
            [['product_column_id'], 'integer'],
            [['product_name'], 'string', 'max' => 255],
            [['product_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '产品ID',
            'product_name' => '产品名称',
            'raise_interest_year' => '募集期年利率',
            'interest_year' => '年利率',
            'product_column_id' => '产品分类ID',
        ];
    }
    
    public function getProductColumn()
    {
        return $this->hasOne(ProductColumn::className(), ['id' => 'product_column_id'])->asArray();
    }
}
