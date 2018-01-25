<?php
namespace backend\models;

use yii\base\Model;
use common\models\Product;
use yii\web\UploadedFile;
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
            [['product_name', 'product_column_id', 'content'], 'required'],
            [['product_name'], 'string'],
            ['product_name', 'unique', 'targetClass' => Product::className()],
            [['product_column_id'], 'integer'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'product_name' => '产品名称',
            'content' => '产品内容',
            'product_column_id' => '产品分类',
            'img' => '产品图片（*上传前请裁剪成800px（宽）X 511px（高））',
        ];
    }
    public function upload()
    {
      
        
        $this->img = UploadedFile::getInstance($this, 'img');
        
        if(!$this->validate())
        {
            return null;
        }
        
        $name = 'p-' . date('Y-m-d') . '-' . rand(0, 9999);
        
        $ext = $this->img->extension;
        
        $file = $name . '.' . $ext;
        
        $uploadPath = '../../frontend/web/uploads/' . $file;
        
        $this->img->saveAs($uploadPath);
        
        
        
        
        $path = 'uploads/' . $file;
        
        $this->img = $path;
        
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

