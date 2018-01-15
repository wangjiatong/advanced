<?php
namespace common\models;

use Yii;
use \yii\db\ActiveRecord;
use backend\models\Admin;

/**
 * This is the model class for table "contract".
 *
 * @property integer $id
 * @property string $contract_number
 * @property integer $capital
 * @property string $transfered_time
 * @property string $found_time
 * @property integer $raise_day
 * @property integer $raise_interest
 * @property string $cash_time
 * @property integer $term_month
 * @property integer $interest
 * @property integer $term
 * @property string $every_time
 * @property string $every_interest
 * @property integer $total_interest
 * @property integer $total
 * @property string $bank
 * @property string $bank_number
 * @property string $source
 * @property string $created_at
 * @property string $updated_at
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $status
 *
 * @property User $user
 * @property Product $product
 */
class Contract extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['contract_number', 'capital', 'transfered_time', 'found_time', 'raise_day', 'raise_interest', 'cash_time', 'term_month', 'interest', 'term', 'every_time', 'every_interest', 'total_interest', 'total', 'bank', 'bank_number', 'product_id', 'user_id', 'interest_year', 'raise_interest_year', 'bank_user'], 'required'],
           [['capital', 'raise_day', 'term_month', 'term', 'product_id', 'user_id'], 'integer'],
           [['transfered_time', 'found_time', 'cash_time', 'created_at', 'updated_at'], 'safe'],
           [['transfered_time', 'found_time', 'cash_time'], 'default', 'value' => null],//时间插件设置要求
           [['contract_number', 'every_time', 'every_interest', 'bank', 'bank_number'], 'string', 'max' => 255],
           [['contract_number'], 'unique'],
           [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserModel::className(), 'targetAttribute' => ['user_id' => 'id']],
           [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
           ['source', 'required'],
           ['source', 'integer'],
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
            'capital' => '本金',
            'transfered_time' => '到账时间',
            'found_time' => '成立时间',
            'raise_day' => '募集天数',
            'raise_interest' => '募集期利息',
            'cash_time' => '兑付时间',
            'term_month' => '期限（月）',
            'interest' => '成立期利息',
            'term' => '付款频率',
            'every_time' => '每期到期时间',
            'every_interest' => '每期应付利息',
            'total_interest' => '应付利息总额',
            'total' => '兑付总额',
            'bank' => '开户行',
            'bank_number' => '银行账号',
            'source' => '合同来源',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'product_id' => '产品名称',
            'user_id' => '客户姓名',
            'status' => '合同状态',
            'raise_interest_year' => '募集期年利率（%）',
            'interest_year' => '年利率（%）',
            'pdf' => '确认函扫描件',
            'bank_user' => '开户名',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    //关联客户表
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    //关联产品表
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    
    //判断合同状态
    public function contractValidation($status)
    {
        switch ($status)
        {
            case 1: return '生效中';                break;
            case 0: return '已过期';                break;
            default : return '不存在的';
        }
    }
    
    //关联销售表
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'source']);
    }
    
    //获取合同状态
    public function getStatus()
    {
        switch ($this->status)
        {
            case 1: return '运行中';                break;
            case 0: return '已兑付';                break;
        }
    }
    
    /*  通过当前用户在session中所拥有的访问权限判断
     *  是获取销售个人合同总数or公司合同总数
     */
    public static function getContractNumByAccess()
    {
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            $contractNum = static::find()
                ->where(['source' => Yii::$app->user->identity->id])->count();
        }else{
            $contractNum = static::find()->count();
        }
        return $contractNum;
    }
    
    /*  通过当前用户在session中所拥有的访问权限判断
     *  是获取销售个人销售总额or公司销售总额
     */
    public static function getCapitalSumByAccess()
    {
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            $capitalSum = static::find()->select(['SUM(capital) as sum'])
                ->where(['source' => Yii::$app->user->identity->id])
                ->andWhere(['status' => 1])->asArray()->all();
        }else{
            $capitalSum = static::find()->select(['SUM(capital) as sum'])
                ->andWhere(['status' => 1])->asArray()->all();            
        }
        return isset($capitalSum[0]['sum']) ? $capitalSum[0]['sum'] : 0;
    }
    
    /*  通过当前用户在session中所拥有的访问权限判断
     *  是获取销售个人销售产品占比or公司销售产品占比
     */
    public static function getProductProportionByAccess()
    {
        //将共用AR对象提出来
        $sql = static::find()->select(['product_id'])
            ->Where(['contract.status' => 1]);
        
        //根据权限判断获取结果
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            $productProportion = $sql
                ->andWhere(['source' => Yii::$app->user->identity->id])
                ->asArray()->all();
        }else{
            $productProportion = $sql->asArray()->all();
        }
        
        //从二维数组的结果中单独把product_id提出来
        $arr = array_column($productProportion, 'product_id');
        //统计每个产品出现的次数
        $productProportion = array_count_values($arr);
//         var_dump($arr);
//         var_dump($productProportion);
//         exit();
        
        return $productProportion;
    }
    
    /*
     * 获取最近六个月里，每个月成立的合同数量
     */
    public static function getContractNumByMonth($months)
    {
//         $months = 5;
        $sql = static::find();
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            $data = $sql->where(['source' => Yii::$app->user->identity->id]);
            $wherefunc = 'andWhere';
            return static::searchConNumByMonth($data, $months, $wherefunc);
        }else{
            return static::searchConNumByMonth($sql, $months);
        }   
    }

    /*
     * 查询距今 $months 个月里，每个月内符合某字段条件下的记录数量
     * @param object $data 所要查询的模型对象
     * @param integer $months 查询月数
     * @param string $wherefunc 默认使用的查询条件，默认使用where()
     * @return array 按月份从小到大的顺序排列的每月的数量
     */
    public static function searchConNumByMonth($data, $months, $wherefunc = 'where')
    {
        for($i = $months; $i >= 0; $i--)
        {
            $date = new \DateTime();//实例化当前日期对象
            //计算时间范围内每个月的起始及终止时间
            $start = $date->modify('-' . $i . 'months')->format('Y-m-01');//再次转换为字符串
            $end = $date->format('Y-m-t');
            $whereCondition = ['between', 'transfered_time', $start, $end];
            $num = $data->$wherefunc($whereCondition)->count();
            $num_arr[$date->format('Y-n')] = (int)$num;
        }
        return $num_arr;
    }
        
    /*
     * 获取最近二十个月的每个月的进账金额
     */
    public static function getCapitalByMonth($months)
    {
//         $months = 5;//查询二十个月内的
        $sql = static::find()->select(['SUM(capital) as monCap']);//合同模型
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            $data = $sql->where(['source' => Yii::$app->user->identity->id]);
            $wherefunc = 'andWhere';
            return static::searchCapByMonth($data, $months, $wherefunc);
        }else{
            return static::searchCapByMonth($sql, $months);
        } 
    }
    
    /*
     * 查询距今 $months 个月里，每个月内符合某字段条件下的记录数量
     * @param object $data 所要查询的模型对象
     * @param integer $months 查询月数
     * @param string $wherefunc 默认使用的查询条件，默认使用where()
     * @return array 按月份从小到大的顺序排列的每月的数量
     */
    public static function searchCapByMonth($data, $months, $wherefunc = 'where')
    {
        for($i = $months; $i >= 0; $i--)
        {
            $date = new \DateTime();//实例化当前日期对象
            //计算时间范围内每个月的起始及终止时间
            $start = $date->modify('-' . $i . 'months')->format('Y-m-01');//再次转换为字符串
            $end = $date->format('Y-m-t');
            $whereCondition = ['between', 'transfered_time', $start, $end];
            $num = $data->$wherefunc($whereCondition)->asArray()->all();
            if(empty($num[0]['monCap']))
            {
                $num[0]['monCap'] = 0;
            }
            $num_arr[$date->format('Y-n')] = (int)$num[0]['monCap'];
        }
        return $num_arr;
    }    

    
    
    
    
    
    
    
}
