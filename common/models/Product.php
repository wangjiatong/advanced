<?php
namespace common\models;

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
            [['product_column_id'], 'integer'],
            [['product_name'], 'string', 'max' => 255],
            [['product_name'], 'unique'],
            [['content'], 'required'],
            [['img'], 'required'],

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
            'content' => '产品内容',
            'product_column_id' => '产品分类ID',
            'img' => '产品图片',
        ];
    }

    public function getProductColumn()
    {
        return $this->hasOne(ProductColumn::className(), ['id' => 'product_column_id'])->asArray();
    }
    
//    public function getImg($id)
//    {
//        $img = $this->find()->select('img')->where(['id' => $id])->one();
//        $img = $img['img'];
////        $img = constant('FRONTEND') . $img;
//        $img = '../../frontend/web' . $img;
//        return $img;
//    }
}
