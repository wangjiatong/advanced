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
    public static function getPaySumByMonth($months)
    {
        $sql = static::find()->select(['SUM(interest) as sum']);
        if(!in_array('contract/index', Yii::$app->session['allowed_urls']))
        {
            //销售
            $data = $sql->where(['source' => Yii::$app->user->identity->id]);
            $wherefunc = 'andWhere';
            return static::searchPaySumByMonth($data, $months, $wherefunc);         
        }else{
            //销售总监
            return static::searchPaySumByMonth($sql, $months);
        }
    } 
    
    /*
     * $months个月中每个月的兑付总和（本金+利息）
     */
    private function searchPaySumByMonth($data, $months, $wherefunc = 'where')
    {
        for($m = $months; $m >= 0; $m--)
        {
            $thisMonth = new \DateTime();
            $start = $thisMonth->modify('-' . $m . 'months')->format('Y-m-01');
            $end = $thisMonth->format('Y-m-t');
            $paySumByMonth[$thisMonth->format('Y-n')] = (float)$data->$wherefunc(['between', 'time', $start, $end])->asArray()->one()['sum'];
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
        for($m = $months; $m >= 0; $m--)
        {
            $thisMonth = new \DateTime();
            $date = $thisMonth->modify('-' . $m . 'months')->format('Y-m-t');
            $paySumByDate[$thisMonth->format('Y-n')] = (float)$data->$wherefunc(['<', 'time', $date])->asArray()->one()['sum'];
        }
        return $paySumByDate;        
    }
    
    
    
    
    
    
    
    
    
}
