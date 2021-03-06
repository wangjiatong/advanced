<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pay".
 *
 * @property integer $id
 * @property integer $cid
 * @property string $time
 * @property string $interest
 */
class Pay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//             [['cid'], 'integer'],
//             [['interest'], 'number'],
//             [['time'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => '合同ID',
            'time' => '付息时间',
            'interest' => '付息金额',
        ];
    }
    
    /*
     * $months个月中，每个月的付息总和
     */
    public static function getPaySumByMonth($months, $source = null)
    {
        $sql = static::find()->select(['SUM(interest) as sum']);
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            if($source == null)
            {
                $source = Yii::$app->user->identity->id;
            }
            //销售
            $data = $sql->where(['source' => $source]);
            $wherefunc = 'andWhere';
            return static::searchPaySumByMonth($data, $months, $wherefunc);         
        }else{
            //销售总监
            if($source !== null)
            {
                $wherefunc = 'andWhere';
                $data = $sql->where(['source' => $source]);
                return static::searchPaySumByMonth($data, $months, $wherefunc);                 
            }else{
                return static::searchPaySumByMonth($sql, $months);
            }
        }
    } 
    
    /*
     * $months个月中每个月的兑付总和（本金+利息）
     */
    private function searchPaySumByMonth($data, $months, $wherefunc = 'where')
    {
        $thisMonth = new \DateTime();
        
        for($m = $months; $m >= 0; $m--)
        {
            $_data = clone $data;
            $_thisMonth = clone $thisMonth;
            
            $start = $_thisMonth->modify('-' . $m . 'months')->format('Y-m-01');
            $end = $_thisMonth->format('Y-m-t');
            $paySumByMonth[$_thisMonth->format('Y-n')] = (float)$_data->$wherefunc(['between', 'time', $start, $end])->asArray()->one()['sum'];
        }
        return $paySumByMonth;
    }
    
    /*
     * $months个月中，每个月的累计付息总和
     */
    public static function getPaySumByDate($months)
    {
        $sql = static::find()->select(['SUM(interest) as sum']);
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            //销售
            $data = $sql->where(['source' => Yii::$app->user->identity->id]);
            $wherefunc = 'andWhere';
            return static::searchPaySumByDate($data, $months, $wherefunc);
        }else{
            //销售总监
            return static::searchPaySumByDate($sql, $months);
        }
    }
    
    /*
     * $months个月中，累计到某月的付息总和
     */
    private function searchPaySumByDate($data, $months, $wherefunc = 'where')
    {
        $thisMonth = new \DateTime();
        
        for($m = $months; $m >= 0; $m--)
        {
            $_data = clone $data;
            $_thisMonth = clone $thisMonth;
            
            $date = $_thisMonth->modify('-' . $m . 'months')->format('Y-m-t');
            $paySumByDate[$_thisMonth->format('Y-n')] = (float)$_data->$wherefunc(['<', 'time', $date])->asArray()->one()['sum'];
        }
        return $paySumByDate;        
    }
    
    /*
     * 查询某个时间段内的待付合同
     */
    public static function searchToPay($days = 15)
    {
        $start = date('Y-m-d');
        $end = (new \DateTime())->modify('+' . $days . 'days')->format('Y-m-d');
        $sql = static::find()->where(['>=', 'time', $start])
            ->andWhere(['<', 'time', $end]);
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            return $sql->andWhere(['source' => Yii::$app->user->identity->id])
                ->orderBy('time asc')->all();
        }else{
            return $sql->orderBy('time asc')->all();
        }
    }
    
    /*
     * 功能：最近一次（对比当前时间）的付息时间及应付利息
     * 使用范围：user/all(my)-contract-by-user
     * @param int $user_id 客户id
     */
    public static function searchRecentPay($user_id)
    {
        $currentDate = date('Y-m-d');//当前时间
        $pays = static::find()->select(['cid', 'time', 'interest'])->where(['uid' => $user_id])->andWhere(['>', 'time', $currentDate])
            ->orderBy('time')->groupBy('cid')->indexBy('cid')->asArray()->all();
        return $pays;
    }
    
    
    
    
    
    
    
}
