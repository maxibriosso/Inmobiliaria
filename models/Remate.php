<?php

namespace app\models;

use Yii; 

/**
 * This is the model class for table "remate".
 *
 * @property integer $id
 * @property integer $id_barrio
 * @property string $titulo
 * @property string $direccion
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
            [['id_barrio', 'titulo','direccion','descripcion'], 'required'],
            [['id_barrio', 'estado'], 'integer'],
            [['descripcion', 'ubicacion'], 'string'],
            [['titulo'], 'string', 'max' => 200],
            [['fecha_creacion'], 'safe'],
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
            'titulo' => 'Título',
            'direccion' => 'Dirección',
            'descripcion' => 'Descripción',
            'ubicacion' => 'Ubicación',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagenRemates()
    {
        return $this->hasMany(Imagen_remate::className(), ['id_remate' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarrio()
    {
        return $this->hasOne(Barrio::className(), ['id' => 'id_barrio']);
    }

    public function getBarrio()
    {   
        return Barrio::find()
        ->where(['id' => $this->id_barrio])
        ->one();
    }

    public function getImagenRemate()
    {
        $imagen = Imagen_remate::find()
            ->where(['id_remate' => $this->id])
            ->one();

        return $imagen;
    }

    public function getImagenes()
    {
        $imagen = Imagen_remate::find()
            ->where(['id_remate' => $this->id])
            ->all();

        return $imagen;
    }
}
