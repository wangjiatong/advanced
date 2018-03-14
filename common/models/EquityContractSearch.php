<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EquityContract;

/**
 * ContractSearch represents the model behind the search form about `common\models\Contract`.
 */
class EquityContractSearch extends EquityContract
{
    public $user_name;//根据客户姓名查询的字段
    public $product_name;//根据产品名称查询的字段
    public $admin_name;//根据销售姓名查询的字段

    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'capital', 'interest', 'user_id', 'product_id', 'status'], 'integer'],
            [['user_name', 'product_name', 'admin_name'], 'safe'],
            [['contract_number', 'transfered_time', 'found_time', 'bank', 'bank_number', 'source', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = $query = EquityContract::find()->joinWith(['user', 'product', 'admin'])->orderBy('found_time desc');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'contract_number' => $this->contract_number,
            'capital' => $this->capital,
            'transfered_time' => $this->transfered_time,
            'found_time' => $this->found_time,
            'interest' => $this->interest,
//             'created_at' => $this->created_at,
//             'updated_at' => $this->updated_at,
            'product_id' => $this->product_id,
            'user_id' => $this->user_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'contract_number', $this->contract_number])
            ->andFilterWhere(['like', 'found_time', $this->found_time])//将成立时间改为模糊查询
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'bank_number', $this->bank_number])
            ->andFilterWhere(['like', 'user.name', $this->user_name])
            ->andFilterWhere(['like', 'product.product_name', $this->product_name])
            ->andFilterWhere(['like', 'admin.name', $this->admin_name]);
        
        return $dataProvider;
    }
}
