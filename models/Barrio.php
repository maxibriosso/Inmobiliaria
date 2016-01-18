<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barrio".
 *
 * @property integer $id
 * @property integer $id_departamento
 * @property integer $id_ciudad
 * @property string $nombre
 * @property integer $estado
 * @property string $fecha_creacion
 *
 * @property Ciudad $idCiudad
 * @property Departamento $idDepartamento
 * @property Inmueble[] $inmuebles
 */
class Barrio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barrio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_departamento', 'id_ciudad', 'nombre', 'estado'], 'required'],
            [['id_departamento', 'id_ciudad', 'estado'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['nombre'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_departamento' => 'Id Departamento',
            'id_ciudad' => 'Id Ciudad',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['id' => 'id_ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['id' => 'id_departamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmueble::className(), ['id_barrio' => 'id']);
    }
}
