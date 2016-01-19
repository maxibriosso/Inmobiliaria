<?php

namespace app\models;

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{


    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $nombre;
    public $apellido;
    public $ci;
    public $telefono;
    public $email;
    public $nick;
    public $fecha_nacimiento;
    public $estado;
    public $fecha_creacion;


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
          $user = Usuario::find()
                ->Where("id=:id", ["id" => $id])
                ->one();
        return isset($user) ? new static($user) : null;
        
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

        $users = Usuario::find()
                ->Where("nick=:nick", [":nick" => $username])
                ->all();
        foreach ($users as $user) {
            if (strcasecmp($user->nick, $username) === 0) {
                return new static($user);
            }
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
