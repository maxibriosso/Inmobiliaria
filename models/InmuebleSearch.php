<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inmueble;

/**
 * InmuebleSearch represents the model behind the search form about `app\models\Inmueble`.
 */
class InmuebleSearch extends Inmueble
{
    /**
     * @inheritdoc
     */
    public $precio_max;
    public $precio_min;


    public function rules()
    {
        return [
            [['id', 'id_barrio', 'id_usuario', 'id_propietario', 'amueblado', 'garage', 'jardin', 'parrillero', 'piso', 'prestamo_bancario', 'cantidad_banios', 'cantidad_habitaciones', 'superficie', 'destacado', 'favorito', 'activo'], 'integer'],
            [['nombre', 'estado', 'direccion', 'titulo', 'descripcion', 'tipo', 'coord', 'operacion', 'fecha_creacion','precio_max','precio_min'], 'safe'],
            [['valor','precio_max','precio_min'], 'number'],
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
        $query = Inmueble::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       /* $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }*/

        if (isset($_GET['InmuebleSearch']) && !($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_barrio' => $this->id_barrio,
            'id_usuario' => $this->id_usuario,
            'id_propietario' => $this->id_propietario,
            'valor' => $this->valor,
            'amueblado' => $this->amueblado,
            'garage' => $this->garage,
            'jardin' => $this->jardin,
            'parrillero' => $this->parrillero,
            'piso' => $this->piso,
            'prestamo_bancario' => $this->prestamo_bancario,
            'cantidad_banios' => $this->cantidad_banios,
            'cantidad_habitaciones' => $this->cantidad_habitaciones,
            'superficie' => $this->superficie,
            'destacado' => $this->destacado,
            'favorito' => $this->favorito,
            'activo' => $this->activo,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'coord', $this->coord])
            ->andFilterWhere(['like', 'operacion', $this->operacion])
            ->andFilterWhere(['between', 'valor', $this->precio_min, $this->precio_max]);

           

        return $dataProvider;
    }
}
