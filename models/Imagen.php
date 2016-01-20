<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "imagen".
 *
 * @property integer $id
 * @property integer $id_inmueble
 * @property resource $imagen
 * @property integer $destacada
 * @property string $ruta
 * @property string $titulo
 * @property string $descripcion
 * @property integer $estado
 * @property string $fecha_creacion
 *
 * @property Inmueble $idInmueble
 */
class Imagen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imagen;

    public static function tableName()
    {
        return 'imagen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_inmueble', 'estado'], 'required'],
            [['id_inmueble', 'destacada', 'estado'], 'integer'],
            [['imagen'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['imagen'], 'safe'],
            [['fecha_creacion'], 'safe'],
            [['ruta', 'descripcion'], 'string', 'max' => 255],
            [['titulo'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_inmueble' => 'Id Inmueble',
            'imagen' => 'Imagen',
            'destacada' => 'Destacada',
            'ruta' => 'Ruta',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInmueble()
    {
        return $this->hasOne(Inmueble::className(), ['id' => 'id_inmueble']);
    }

    public function beforeSave($insert)
    {
        if($file=UploadedFile::getInstance($this,'imagen'))
        {
            $this->ruta=$file->name;
          
           /*$this->imagen=fopen($file->tempName, 'r+');*/
            $this->imagen = file_get_contents( $file->tempName );
           /* $fp   = fopen($file->tempName, 'r');
            $content = fread($fp, filesize($file->tempName));
            fclose($fp); 
            $this->imagen= $content; */
        }
 
    return parent::beforeSave($insert);
    }
    
}
