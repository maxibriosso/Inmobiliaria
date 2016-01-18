<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property integer $ci
 * @property integer $telefono
 * @property string $email
 * @property string $nick
 * @property string $password
 * @property string $fecha_nacimiento
 * @property integer $estado
 * @property string $fecha_creacion
 *
 * @property Inmueble[] $inmuebles
 */
class Usuario extends \yii\db\ActiveRecord 
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ci', 'telefono', 'estado'], 'integer'],
            [['nick', 'password', 'estado'], 'required'],
            [['fecha_nacimiento', 'fecha_creacion'], 'safe'],
            [['nombre', 'apellido'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            [['nick'], 'string', 'max' => 15],
            [['password'], 'string', 'max' => 255]
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
            'apellido' => 'Apellido',
            'ci' => 'Ci',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'nick' => 'Nick',
            'password' => 'Password',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInmuebles()
    {
        return $this->hasMany(Inmueble::className(), ['id_usuario' => 'id']);
    }



    
}
