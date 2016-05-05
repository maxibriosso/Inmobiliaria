<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "testimonio".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $ruta
 * @property integer $estado
 * @property string $fecha_creacion
 */
class Testimonio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testimonio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['estado'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['titulo'], 'string', 'max' => 200],
            [['ruta'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'ruta' => 'Ruta',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }
}
