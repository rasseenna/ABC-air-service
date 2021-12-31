<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
// use app\models\User;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $name
 * @property string $email
 * @property int $username
 * @property int $password
 */
class User extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 10;

    public $id;
  //  public $name;
  //  public $username;
  //  public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','username','email','password_hash'],'required'],
           // ['username', 'trim'],
          //  ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'],
         //   ['username', 'string', 'min' => 2, 'max' => 255],

          //  ['email', 'trim'],
         //   ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],

          //  ['password', 'required'],
           // ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

        /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($password)
    {
      //  $pass = md5($password);
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public static function hashPassword($password) {// Function to create password hash
       // $salt = "stev37f";
       $pass = Yii::$app->getSecurity()->generatePasswordHash($password);
       return $pass;
       // return md5($password);
    }

    public function setPassword($password)
    {
        $password_hash = Yii::$app->security->generatePasswordHash($password);
        return $password_hash;

    }
    public static function findIdentity($id)

    {

        return static::findOne(['id' => $id]);

    }
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    
}
