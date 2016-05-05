<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parametro".
 *
 * @property integer $id
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $tipo
 * @property string $descripcion
 * @property string $valor
 * @property string $fecha_creacion
 */
class Parametro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parametro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'nombre'], 'required'],
            [['id_usuario'], 'integer'],
            [['tipo', 'descripcion', 'valor'], 'string'],
            [['fecha_creacion'], 'safe'],
            [['nombre'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_usuario' => 'Id Usuario',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
            'descripcion' => 'Descripcion',
            'valor' => 'Valor',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }
}
