<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presentacion".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $ruta
 * @property string $ruta_img
 * @property string $fecha_creacion
 */
class Presentacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'presentacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['ruta'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['titulo'], 'string', 'max' => 200],
            [['ruta', 'ruta_img'], 'string', 'max' => 255]
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
            'descripcion' => 'Descripción',
            'ruta' => 'Fondo',
            'ruta_img' => 'Img. left',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    public function getImageurl()
    {
    return \Yii::$app->request->BaseUrl.'/uploads/'.$this->ruta;
    }
}
