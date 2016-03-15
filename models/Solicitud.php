<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitud".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $telefono
 * @property string $email
 * @property string $descripcion
 * @property string $tipo
 * @property integer $leida
 * @property integer $estado
 * @property string $fecha_creacion
 */
class Solicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'tipo'], 'string'],
            [['estado'], 'required'],
            [['estado','leida'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['nombre', 'telefono'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 50]
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
            'telefono' => 'Telefono',
            'email' => 'Email',
            'descripcion' => 'Descripcion',
            'tipo' => 'Tipo',
            'leida' => 'Leida',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }
}
