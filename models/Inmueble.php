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
            [['id_usuario', 'activo'], 'required'],
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
            'direccion' => 'Direccion',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'amueblado' => 'Amueblado',
            'garage' => 'Garage',
            'jardin' => 'Jardin',
            'parrillero' => 'Parrillero',
            'piso' => 'Piso',
            'tipo' => 'Tipo',
            'prestamo_bancario' => 'Prestamo Bancario',
            'cantidad_banios' => 'Cantidad Banios',
            'cantidad_habitaciones' => 'Cantidad Habitaciones',
            'superficie' => 'Superficie',
            'coord' => 'Coord',
            'operacion' => 'Operacion',
            'destacado' => 'Destacado',
            'favorito' => 'Favorito',
            'activo' => 'Activo',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagens()
    {
        return $this->hasMany(Imagen::className(), ['id_inmueble' => 'id']);
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
}
