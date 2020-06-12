<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaketTambahan;

/**
 * PaketTambahanSearch represents the model behind the search form about `app\models\PaketTambahan`.
 */
class PaketTambahanSearch extends PaketTambahan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kd_paket_tambahan', 'tarif'], 'integer'],
            [['kode_paket', 'nama_paket', 'status', 'keterangan', 'foto'], 'safe'],
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
        $query = PaketTambahan::find();

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
            'kd_paket_tambahan' => $this->kd_paket_tambahan,
            'tarif' => $this->tarif,
        ]);

        $query->andFilterWhere(['like', 'kode_paket', $this->kode_paket])
            ->andFilterWhere(['like', 'nama_paket', $this->nama_paket])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);
         $query->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
