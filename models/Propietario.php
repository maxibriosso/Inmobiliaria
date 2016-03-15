<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propietario".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $email
 * @property integer $ci
 * @property integer $estado
 * @property string $fecha_creacion
 *
 * @property Inmueble[] $inmuebles
 */
class Propietario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propietario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ci', 'estado'], 'integer'],
            [['estado'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['nombre', 'apellido', 'email'], 'string', 'max' => 100],
            [['telefono'],'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'ci' => 'Ci',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmueble::className(), ['id_propietario' => 'id']);
    }
}
