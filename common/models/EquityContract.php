<?php

namespace common\models;

use Yii;
use common\models\UserModel;
use common\models\Product;
use backend\models\Admin;

/**
 * This is the model class for table "equity_contract".
 *
 * @property integer $id
 * @property string $contract_number
 * @property integer $source
 * @property integer $user_id
 * @property string $capital
 * @property string $transfered_time
 * @property string $found_time
 * @property string $bank
 * @property string $bank_user
 * @property string $bank_number
 * @property integer $product_id
 * @property integer $status
 * @property string $pdf
 * @property string $interest_year
 * @property string $interest
 * @property integer $predic_term_invest
 * @property integer $predic_term_extend
 * @property integer $predic_term_exit
 * @property integer $real_term_invest
 * @property integer $real_term_extend
 * @property integer $real_term_exit
 */
class EquityContract extends \yii\db\ActiveRecord
{
    //股权项目投资期状态
    const TERM_INVEST = 1;//投资期
    const TERM_EXTEND = 2;//延长期
    const TERM_EXIT = 3;//退出期
    const TERM_END = 0;//结束
     
    //ajax动态修改部分属性
    private $paramName;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equity_contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'capital', 'transfered_time', 'found_time', 'predic_term_invest', 'bank', 'bank_user', 'bank_number', 'product_id'], 'required'],
            [['user_id', 'product_id', 'predic_term_invest'], 'integer'],
            [['capital'], 'number'],
            [['transfered_time', 'found_time'], 'safe'],
            [['contract_number', 'bank', 'bank_user', 'bank_number'], 'string', 'max' => 255],
            [['contract_number'], 'unique'],
            ['pdf', 'file', 'extensions' => 'pdf', 'skipOnEmpty' => true],
            ['status', 'default', 'value' => self::TERM_INVEST],
            ['status', 'in', 'range' => [self::TERM_INVEST, self::TERM_EXTEND, self::TERM_EXIT, self::TERM_END]],
            
            ['source', 'required', 'on' => ['create-all']],
            ['source', 'integer', 'on' => ['create-all']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contract_number' => '合同编号',
            'source' => '销售姓名',
            'user_id' => '客户姓名',
            'capital' => '本金',
            'transfered_time' => '到账时间',
            'found_time' => '成立时间',
            'bank' => '开户行',
            'bank_user' => '开户名',
            'bank_number' => '银行账号',
            'product_id' => '产品名称',
            'status' => '合同状态',
            'pdf' => '确认函',
            'interest_year' => '年利率',
            'interest' => '利息',
            'predic_term_invest' => '预计投资期',
            'predic_term_extend' => '预计延长期',
            'predic_term_exit' => '预计推出期',
            'real_term_invest' => '实际投资期',
            'real_term_extend' => '实际延长期',
            'real_term_exit' => '实际退出期',
        ];
    }
    
    //生成合同编号
    public function setContractNumber()
    {
        $this->contract_number = Yii::$app->user->identity->id.$this->user_id.\Date('YmdHis');
    }
    
    //合同创建
    public function create()
    {
        $this->setContractNumber();
        $this->source = empty($this->source) ? Yii::$app->user->identity->id : $this->source;
        return $this->save();
    }
    
    //关联客户表
    public function getUser()
    {
        return $this->hasOne(UserModel::className(), ['id' => 'user_id']);
    }
    
    //关联产品表
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    
    //关联销售表
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'source']);
    }
    
    //详情页ajax更新数据
    public function updatePartial($model)
    {
        $post = Yii::$app->request->post();
        $paramName = $post['paramName'];
        $paramValue = $post['paramValue'];
        $model->$paramName = $paramValue;

        return $model->update() ? true : false;
        
    }
    
}
