<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%inmueble}}".
 *
 * @property integer $idinmueble
 * @property string $tipo_inmueble
 * @property string $departamento
 * @property string $ubicacion
 * @property string $descripcion
 * @property integer $imagen
 *
 * @property Imagen $imagen0
 */
class Inmueble extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inmueble}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_inmueble', 'departamento', 'ubicacion'], 'required'],
            [['imagen'], 'integer'],
            [['tipo_inmueble', 'departamento', 'ubicacion'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idinmueble' => 'Idinmueble',
            'tipo_inmueble' => 'Tipo Inmueble',
            'departamento' => 'Departamento',
            'ubicacion' => 'Ubicacion',
            'descripcion' => 'Descripcion',
            'imagen' => 'Imagen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagen0()
    {
        return $this->hasOne(Imagen::className(), ['idimagen' => 'imagen']);
    }
}
