<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pemesanan;

/**
 * PemesananSearch represents the model behind the search form about `app\models\Pemesanan`.
 */
class PemesananSearch extends Pemesanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pemesan', 'notel', 'kd_paket_tambahan', 'lama_inap'], 'integer'],
            [['nama_pemesan', 'alamat_pemesan', 'email_pemasan', 'status', 'checkin', 'checkout'], 'safe'],
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
        $query = Pemesanan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pemesan' => $this->id_pemesan,
            'notel' => $this->notel,
            'kd_paket_tambahan' => $this->kd_paket_tambahan,
            'checkin' => $this->checkin,
            'checkout' => $this->checkout,
            'lama_inap' => $this->lama_inap,
            
        ]);

        $query->andFilterWhere(['like', 'nama_pemesan', $this->nama_pemesan])
            ->andFilterWhere(['like', 'alamat_pemesan', $this->alamat_pemesan])
            ->andFilterWhere(['like', 'email_pemasan', $this->email_pemasan])
            ->andFilterWhere(['like', 'status', $this->status]);


        return $dataProvider;
    }
}
