<?php

namespace djazzy\profile\models;

use Yii;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $lastname
 * @property string $middle_name
 * @property string $school
 * @property string $school_class
 * @property string $birthday
 * @property string $image
 * @property string $image_upl
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
// * @property integer $created_at
// * @property integer $updated_at
 * @property string $secret_key
 *
 * @property Profile $profile
 */
class Userupd extends \app\models\User
{
    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 10;

    public $password;
    public $password2;
    public $image_upl;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'username', 'school', 'school_class', 'birthday', 'email', 'password', 'password2'], 'filter', 'filter' => 'trim'],
//            [['username', 'password', 'password2', 'email'], 'string', 'max' => 35],
//            [['username', 'email', 'status'], 'required'],
            ['password2', 'compare', 'compareAttribute'=>'password', 'message' => 'Пароли должны совпадать.'],
            [['password', 'password2'],  'string', 'min' => 6, 'max' => 300],
            ['email', 'email'],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['image_upl'], 'file', 'extensions' => 'png, jpg, jpeg'],
            ['username', 'string', 'min' => 2, 'max' => 500],
            ['password', 'required', 'on' => 'create'],
            ['login', 'unique', 'message' => 'Этот логин уже занят.'],
            ['email', 'unique', 'message' => 'Эта почта уже зарегистрирована.'],
            ['secret_key', 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя',
            'lastname' => 'Фамилия',
            'middle_name' => 'Отчество',
            'school' => 'Школа',
            'school_class' => 'Класс',
            'birthday' => 'Дата Рождения',
            'email' => 'Email',
            'image' => 'Аватар',
            'image_upl' => 'Аватар',
//            'password' => 'Password Hash',
            'password' => 'Пароль',
            'password2' => 'Подтвердите пароль',
            'status' => 'Статус',
            'auth_key' => 'Auth Key',
//            'created_at' => 'Дата создания',
//            'updated_at' => 'Дата изменения',
        ];
    }

    /* Связи */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /* Поведения */
    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    /* Поиск */

    /** Находит пользователя по имени и возвращает объект найденного пользователя.
     *  Вызываеться из модели LoginForm.
     */
    public static function findByUsername($login)
    {
        return static::findOne([
            'login' => $login
        ]);
    }

    public static function findBySecretKey($key)
    {
        if (!static::isSecretKeyExpire($key))
        {
            return null;
        }
        return static::findOne([
            'secret_key' => $key,
        ]);
    }

    public function upload(){

        if($this->image_upl){
            if($this->validate()){
                $unic = uniqid();
                $filename = "$unic.{$this->image_upl->extension}";
                $this->image_upl->saveAs("img/profile/$filename");
                $userupd = Userupd::findIdentity(Yii::$app->user->identity->id);
                if($userupd ->image){
                    if(file_exists('img/profile/' . $userupd->image)) {
                        unlink('img/profile/' . $userupd->image);
                    }
                }
                $userupd ->image = $filename;
                return $userupd ->save() ? $userupd  : null;
            }else{
                return false;
            }
        }
    }

    /* Хелперы */
    public function generateSecretKey()
    {
        $this->secret_key = Yii::$app->security->generateRandomString().'_'.time();
    }

    public function removeSecretKey()
    {
        $this->secret_key = null;
    }

    public static function isSecretKeyExpire($key)
    {
        if (empty($key))
        {
            return false;
        }
        $expire = Yii::$app->params['secretKeyExpire'];
        $parts = explode('_', $key);
        $timestamp = (int) end($parts);

        return $timestamp + $expire >= time();
    }

    /**
     * Генерирует хеш из введенного пароля и присваивает (при записи) полученное значение полю password_hash таблицы user для
     * нового пользователя.
     * Вызываеться из модели RegForm.
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);

    }

    public function getUpdate()
    {
//        $this->setPassword($this->$password);
        $this->password_hash = Yii::$app->security->generatePasswordHash($this->$password);
        $this->login;
        $this->username;
        $this->lastname;
        $this->middle_name;
        $this->school;
        $this->image;
        $this->school_class;
        $this->birthday;
        $this->email;
        $this->status;
//        $user->setPassword($this->password);
//        $user->generateAuthKey();
//        if($this->scenario === 'emailActivation')
//            $user->generateSecretKey();
        return $this->save() ? $this : null;
    }

    /**
     * Генерирует случайную строку из 32 шестнадцатеричных символов и присваивает (при записи) полученное значение полю auth_key
     * таблицы user для нового пользователя.
     * Вызываеться из модели RegForm.
     */
    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Сравнивает полученный пароль с паролем в поле password_hash, для текущего пользователя, в таблице user.
     * Вызываеться из модели LoginForm.
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /* Аутентификация пользователей */
    public static function findIdentity($id)
    {
        return static::findOne([
            'id' => $id,
        ]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
}
