<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagen_remate".
 *
 * @property integer $id
 * @property integer $id_imagen
 * @property string $nombre
 * @property string $ruta
 * @property integer $destacada
 * @property integer $estado
 * @property string $fecha_creacioin
 *
 * @property Remate $idImagen
 */
class Imagen_remate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imagen_remate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_remate'], 'required'],
            [['id_remate', 'destacada', 'estado'], 'integer'],
            [['ruta'], 'string'],
            [['fecha_creacioin'], 'safe'],
            [['nombre'], 'string', 'max' => 200]
          
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_remate' => 'Remate',
            'nombre' => 'Nombre',
            'ruta' => 'Ruta',
            'destacada' => 'Destacada',
            'estado' => 'Estado',
            'fecha_creacioin' => 'Fecha Creacioin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRemate()
    {
        return $this->hasOne(Remate::className(), ['id' => 'id_remate']);
    }
}
