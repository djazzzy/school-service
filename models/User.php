<?php

namespace app\models;

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
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 10;

    const CHECKED_NO_ACTIVE = 0;
    const CHECKED_ACTIVE = 1;

    const ROLE_USER    = 'user';
    const ROLE_WORKER  = 'worker';
    const ROLE_TEACHER = 'teacher';
    const ROLE_MODER   = 'moder';
    const ROLE_ADMIN   = 'admin';

    public $password;
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
            [['login', 'username', 'school', 'school_class', 'birthday', 'email', 'password', 'key_card'], 'filter', 'filter' => 'trim'],
//            [['username', 'email', 'status'], 'required'],
            ['email', 'email'],
//            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'required', 'on' => 'create'],
            ['login', 'unique', 'message' => 'Этот логин уже занят.'],
            ['email', 'unique', 'message' => 'Эта почта уже зарегистрирована.'],
            ['secret_key', 'unique'],
//            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
//            [['image_upl'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['role', 'get_status_food', 'checked', 'get_status_food', 'get_status_visit', 'image', 'username', 'school', 'email', 'school_class', 'checked', 'key_card', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин (СНИЛС)',
            'username' => 'Имя',
            'email' => 'Электронная почта',
            'password_hash' => 'Password Hash',
            'school' => 'Школа',
            'school_class' => 'Класс',
            'birthday' => 'Дата рождения',
            'image' => 'Фото профиля',
            'contract_id' => 'Договор',
            'status' => 'Статус',
            'auth_key' => 'Auth Key',
            'get_status' => '1c статус',
            'secret_key' => 'Secret Key',
            'get_status_food' => 'Выгружен в буфет',
            'get_status_visit' => 'Выгружен в проходную',
            'checked' => 'Проверен',
            'key_card' => 'Ключ карта',
            'password' => 'Пароль',
            'password2' => 'Подтвердите пароль',
            'role' => 'Роль',
//            'updated_at' => 'Дата изменения',
//            'created_at' => 'Дата создания',

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

    public function uploadImg(){

        if($this->image_upl){
            if($this->validate()){
                $unic = uniqid();
                $filename = "$unic.{$this->image_upl->extension}";
                $this->image_upl->saveAs("img/profile/$filename");
                $userupd = self::findOne($this->id);
                if($userupd ->image){
                    if(file_exists('img/profile/' . $userupd->image)) {
                        unlink('img/profile/' . $userupd->image);
                    }
                }
                $userupd->image = $filename;
                return $userupd ->save() ? $userupd  : null;
            }else{
                return false;
            }
        }
    }

    public function setContract()
    {
        $user_last = self::find()->orderby(['id' => SORT_DESC])->one();
        $pref = sprintf('%04d', 542);
        $contract = $pref . ($user_last->id + 1);
        $this->contract_id = $contract;
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

    public function isChecked()
    {
        return $this->checked == self::CHECKED_NO_ACTIVE;
    }

    public function getSchool(){
        return $this->hasMany(Cash::className(), ['inn' => 'school']);
    }
}
