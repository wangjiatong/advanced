<?php

namespace backend\models;

use Yii;
use yii\base\Model;
//引入产品和客户模型，作为外键
use common\models\Product;
use common\models\UserModel;
//合同AR
use common\models\Contract;

class ContractForm extends Model
{
    public $contract_number;
    public $capital;
    public $transfered_time;
    public $found_time;
    public $cash_time;
    public $term_month;
    public $term;
    public $bank;
    public $bank_number;
    public $product_id;
    public $user_id;
    public $raise_interest_year;//新增募集期年利率
    public $interest_year;//新增年利率
    public $pdf;//合同扫描件
    public $bank_user;//开户名
    public $if_float;//是否含有浮动利率
    public $float_interest;//浮动利率金额
    public $source;//录别人信息的权限

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capital', 'transfered_time', 'found_time', 'term_month', 'term', 'bank', 'bank_user', 'bank_number', 'product_id', 'user_id', 'raise_interest_year', 'interest_year', 'if_float'], 'required'],
            [['raise_interest_year', 'interest_year'], 'double'],
            ['contract_number', 'safe'],
            [['capital', 'term_month', 'term', 'product_id', 'user_id', 'bank_number'], 'integer'],
            [['transfered_time', 'found_time'], 'safe'],
            [['contract_number', 'bank', 'bank_user'], 'string', 'max' => 255],
            [['contract_number'], 'unique', 'targetClass' => Contract::className()],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserModel::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['pdf'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
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
            'id' => '合同ID',
            'contract_number' => '合同编号',
            'capital' => '*本金',
            'transfered_time' => '*到账时间',
            'found_time' => '*成立时间',
            'raise_day' => '募集天数',
            'raise_interest' => '募集期利息',
            'cash_time' => '兑付时间',
            'term_month' => '*期限',
            'interest' => '成立期利息',
            'term' => '*付款方式',
            'every_time' => '每期到期时间',
            'every_interest' => '每期应付利息',
            'total_interest' => '应付利息总额',
            'total' => '兑付总额',
            'bank' => '*开户行',
            'bank_user' => '*开户名',
            'bank_number' => '*银行账号',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'product_id' => '*产品名称',
            'user_id' => '*客户姓名',
            'status' => '合同状态',
            'raise_interest_year' => '*募集期年利率',
            'interest_year' => '*年利率',
            'pdf' => '合同扫描件',
            'if_float' => '*是否含有浮动利率',
            'float_interest' => '浮动利率金额',
            'source' => '*销售姓名',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserModel::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    
    //算天数差，$b日期晚于$a
    public function Days($a, $b)
    {
        $a = strtotime($a);

        $b = strtotime($b);

        return ($b - $a)/86400;        
    }
    
    //合同表单保存方法
    public function save()
    {       
        if(in_array('contract/create-all', Yii::$app->session['allowed_urls']))
        {
            $this->scenario = 'create-all';
        }
        
        if(!$this->validate())
        {
            return null;
        }
        
        $contract = new Contract();
        
        if($this->contract_number == null)
        {
            $contract->contract_number = Yii::$app->user->identity->id.$this->user_id.\Date('YmdHis');
        }else{
            $contract->contract_number = $this->contract_number;//合同编号
        }
        
        $contract->capital = $this->capital;//本金
        
        $contract->transfered_time = $this->transfered_time;//到账时间
        
        $contract->found_time = $this->found_time;//成立时间
        
        $contract->raise_day = $this->Days($contract->transfered_time, $contract->found_time);//募集天数
        
        $contract->raise_interest_year = round($this->raise_interest_year, 2); //募集期年利率
        
        $contract->raise_interest = round($contract->capital * $contract->raise_day / 365 * $contract->raise_interest_year / 100, 2);//募集期利息
        
        $date = new \DateTime($contract->found_time);
        
        $contract->cash_time = $date->modify(+$this->term_month.'months')->format("Y-m-d");//兑付时间
        
        $contract->term_month = $this->term_month;//期限（按月）
        
        $contract->interest_year = round($this->interest_year, 2);//年利率
        
        $contract->if_float = $this->if_float;//是否含有浮动利率
        
        $contract->interest = round($contract->capital * $contract->interest_year / 100 * $contract->term_month / 12, 2);//成立期利息
        
        $contract->term = $this->term;//分期
        
        $every_interest = round($contract->interest * $contract->term / $contract->term_month, 2);//非特殊情况下每期应付利息
        
        $first_interest = round($every_interest + $contract->raise_interest, 2);//加上募集期利息的第一期应付利息
        
        $contract->total_interest = round($contract->raise_interest + $contract->interest, 2);//应付利息总额（募集+成立）
        
        $contract->total = round($contract->capital + $contract->total_interest, 2);//兑付总额（本金+利息）
        
        $contract->bank = $this->bank;//开户行
        
        $contract->bank_number = $this->bank_number;//银行账号
        
        $contract->source = empty($this->source) ? Yii::$app->user->identity->id : $this->source;//合同来源
        
        $contract->user_id = $this->user_id;//用户id
        
        $contract->product_id = $this->product_id;//产品id
        
        $contract->created_at = date('Y-m-d');
        
        $every_time = [];//每期到期时间
        
        $_every_interest = [];//每期应付利息
        
        $contract->pdf = $this->pdf;
        
        $contract->bank_user = $this->bank_user;
        
        $date = new \DateTime($contract->found_time);
        
        if($contract->term == 3 || $contract->term == 6 || $contract->term == 1 || $contract->term == 12)
        {
            
            $y = $contract->term_month / $contract->term;
            
            $x = ceil($y);
            
            for($i = 0; $i < $x; $i++)
            {
                $every_time[$i] = $date->modify(+$contract->term.'months')->format("Y-m-d");
                
                if($i == 0)
                {
                    $_every_interest[$i] = $first_interest;
                }elseif($i == ($x - 1)){
                    $_every_interest[$i] = round($every_interest + $contract->capital, 2);
                }else{
                    $_every_interest[$i] = $every_interest;
                }
            }
            
            $mod = $contract->term_month % $contract->term;
            
            if($mod)
            {
                array_pop($_every_interest);
                
                array_pop($every_time);
                
                $l = count($every_time);
                
                $c = $l -1;
                
                $ls = new \DateTime(".$every_time[$c].");
                
                $end = $ls->modify(+$mod." months")->format('Y-m-d');
                
                $every_time[$l] = $end;
                
                $_every_interest[$l] = round($mod / $contract->term_month * $contract->interest + $contract->capital, 2);
            }     
            
            $contract->every_time = $this->arrtostr($every_time);
            
            $contract->every_interest = $this->arrtostr($_every_interest);
            
        }elseif($contract->term == 0){
            
            $contract->every_time = $contract->cash_time;
            
            $contract->every_interest = strval(round($contract->total, 2));

        }
        
        return $contract->save() ? $contract : null;
   
    }
    
    public function arrtostr($arr)
    {
        return $res = implode(', ', $arr);
    }
    
}
