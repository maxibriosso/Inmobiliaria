<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inmueble".
 *
 * @property integer $id
 * @property integer $id_barrio
 * @property integer $id_usuario
 * @property integer $id_propietario
 * @property string $nombre
 * @property double $valor
 * @property string $estado
 * @property string $direccion
 * @property string $titulo
 * @property string $descripcion
 * @property integer $amueblado
 * @property integer $garage
 * @property integer $jardin
 * @property integer $parrillero
 * @property integer $piso
 * @property string $tipo
 * @property integer $prestamo_bancario
 * @property integer $cantidad_banios
 * @property integer $cantidad_habitaciones
 * @property integer $superficie
 * @property string $coord
 * @property string $operacion
 * @property integer $destacado
 * @property integer $favorito
 * @property integer $activo
 * @property string $fecha_creacion
 *
 * @property Imagen[] $imagens
 * @property Barrio $idBarrio
 * @property Usuario $idUsuario
 * @property Propietario $idPropietario
 */
class Inmueble extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inmueble';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barrio', 'id_usuario', 'id_propietario', 'amueblado', 'garage', 'jardin', 'parrillero', 'piso', 'prestamo_bancario', 'cantidad_banios', 'cantidad_habitaciones', 'superficie', 'destacado', 'favorito', 'activo'], 'integer'],
            [['id_usuario', 'activo','valor','tipo','operacion','descripcion','nombre','titulo','direccion'], 'required'],
            [['valor'], 'number'],
            [['estado', 'descripcion', 'tipo', 'coord', 'operacion'], 'string'],
            [['fecha_creacion'], 'safe'],
            [['nombre', 'titulo'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_barrio' => 'Barrio',
            'id_usuario' => 'Usuario',
            'id_propietario' => 'Propietario',
            'nombre' => 'Nombre',
            'valor' => 'Valor',
            'estado' => 'Estado',
            'direccion' => 'Dirección',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripción',
            'amueblado' => 'Amueblado',
            'garage' => 'Garage',
            'jardin' => 'Jardín',
            'parrillero' => 'Parrillero',
            'piso' => 'Piso',
            'tipo' => 'Tipo',
            'prestamo_bancario' => 'Prestamo Bancario',
            'cantidad_banios' => 'Cantidad Baños',
            'cantidad_habitaciones' => 'Cantidad Habitaciones',
            'superficie' => 'Superficie',
            'coord' => 'Coord',
            'operacion' => 'Operación',
            'destacado' => 'Destacado',
            'favorito' => 'Favorito',
            'activo' => 'Activo',
            'fecha_creacion' => 'Fecha Creación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagens()
    {
        return $this->hasMany(Imagen::className(), ['id_inmueble' => 'id']);
    }

    public function getImagenes()
    {
        $imagenes = Imagen::find()
            ->where(['id_inmueble' => $this->id])
            ->all();

        return $imagenes;
    }
//falta terminar
  /*  public function getDestacada($id)
    {
        return $this->hasMany(Imagen::className(), ['id_inmueble' => 'id']);
    }
*/
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarrio()
    {
        return $this->hasOne(Barrio::className(), ['id' => 'id_barrio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPropietario()
    {
        return $this->hasOne(Propietario::className(), ['id' => 'id_propietario']);
    }

    public function getImagendestacada()
    {
        $imagen = Imagen::find()
            ->where(['id_inmueble' => $this->id])
            ->andwhere(['destacada' => 1])
            ->one();

        return $imagen;
    }

    public function getSubString()
    {
        $length = 160;
        
        //Primero eliminamos las etiquetas html y luego cortamos el string
        $stringDisplay = substr(strip_tags($this->descripcion), 0, $length);
        
        //Si el texto es mayor que la longitud se agrega puntos suspensivos
        if (strlen(strip_tags($this->descripcion)) > $length)
            $stringDisplay .= ' ...';
        return $stringDisplay;
    }
}
