<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Imagen_remate;

/**
 * Imagen_remateSearch represents the model behind the search form about `app\models\Imagen_remate`.
 */
class Imagen_remateSearch extends Imagen_remate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_imagen', 'destacada', 'estado'], 'integer'],
            [['nombre', 'ruta', 'fecha_creacioin'], 'safe'],
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
        $query = Imagen_remate::find();

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
            'id_imagen' => $this->id_imagen,
            'destacada' => $this->destacada,
            'estado' => $this->estado,
            'fecha_creacioin' => $this->fecha_creacioin,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'ruta', $this->ruta]);

        return $dataProvider;
    }
}
