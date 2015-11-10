<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%imagen}}".
 *
 * @property integer $idimagen
 * @property string $mime
 * @property string $ubicacion
 *
 * @property Inmueble[] $inmuebles
 */
class Imagen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%imagen}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mime', 'ubicacion'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idimagen' => 'Idimagen',
            'mime' => 'Mime',
            'ubicacion' => 'Ubicacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmueble::className(), ['imagen' => 'idimagen']);
    }
}
