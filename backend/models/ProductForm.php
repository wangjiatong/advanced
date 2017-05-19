<?php
namespace backend\models;

use yii\base\Model;
use common\models\Product;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ProductForm extends Model
{
    public $product_name;
    public $product_column_id;
    public $content;
    public $img;
    
    public function rules() 
    {
        return [
            [['product_name'], 'required'],
            [['product_column_id'], 'integer'],
            [['content'], 'required'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'product_name' => '产品名称',
            'content' => '产品内容',
            'product_column_id' => '产品分类ID',
            'img' => '产品图片（上传前请裁剪成800x511）',
        ];
    }
    public function upload()
    {
        $product = new Product();
        $product->product_name = $this->product_name;
        $product->product_column_id = $this->product_column_id;
        $product->content = $this->content; 
        $product->img = $this->img;
    
        if($product->save())
        {
            return true;
        }else{
            return false;
        }
    }
}

