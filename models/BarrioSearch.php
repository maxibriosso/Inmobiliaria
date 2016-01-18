<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Barrio;

/**
 * BarrioSearch represents the model behind the search form about `app\models\Barrio`.
 */
class BarrioSearch extends Barrio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_departamento', 'id_ciudad', 'estado'], 'integer'],
            [['nombre', 'fecha_creacion'], 'safe'],
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
        $query = Barrio::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_departamento' => $this->id_departamento,
            'id_ciudad' => $this->id_ciudad,
            'estado' => $this->estado,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
