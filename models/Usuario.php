<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%usuario}}".
 *
 * @property integer $idusuario
 * @property string $nombre_usuario
 * @property string $clave
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%usuario}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_usuario', 'clave'], 'required'],
            [['nombre_usuario', 'clave'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => 'Idusuario',
            'nombre_usuario' => 'Nombre Usuario',
            'clave' => 'Clave',
        ];
    }
}
