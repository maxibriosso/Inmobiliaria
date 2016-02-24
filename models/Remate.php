<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "remate".
 *
 * @property integer $id
 * @property integer $id_barrio
 * @property integer $titulo
 * @property string $descripcion
 * @property string $ubicacion
 * @property integer $estado
 * @property string $fecha_creacion
 *
 * @property ImagenRemate $imagenRemate
 * @property Barrio $idBarrio
 */
class Remate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'remate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barrio', 'titulo'], 'required'],
            [['id_barrio', 'titulo', 'estado'], 'integer'],
            [['descripcion', 'ubicacion'], 'string'],
            [['fecha_creacion'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_barrio' => 'Id Barrio',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'ubicacion' => 'Ubicacion',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagenRemate()
    {
        return $this->hasOne(ImagenRemate::className(), ['id_imagen' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarrio()
    {
        return $this->hasOne(Barrio::className(), ['id' => 'id_barrio']);
    }
}
