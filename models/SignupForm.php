<?php

namespace app\models;

use yii\base\Model;
use Yii;


/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $lastname
 * @property string $username
 * @property string $middle_name
 * @property string $school
 * @property string $school_class
 * @property string $birthday
 */
class SignupForm extends Model
{

    public $login;
    public $password;
    public $password2;
    public $email;
    public $username;
    public $lastname;
    public $middle_name;
    public $school;
    public $school_class;
    public $birthday;
    public $accept;
    public $verifyCode;
    public $status;
    public $auth_key;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'username', 'lastname', 'middle_name', 'school', 'school_class', 'birthday', 'password', 'password2', 'email', 'accept'], 'required'],
            [['username', 'password', 'password2', 'email'], 'string', 'max' => 35],
            ['username', 'string', 'min' => 2, 'max' => 35],
            [['password', 'password2'],  'string', 'min' => 6, 'max' => 35],
            ['password2', 'compare', 'compareAttribute'=>'password', 'message' => 'Пароли должны совпадать.'],
            ['password', 'match', 'pattern' => '/[a-z0-9]\w*$/i', 'message' => 'Пароль должен содежрать только латинские буквы и цифры.'],
            ['login', 'unique', 'targetClass' => User::className(), 'message' => 'Этот Логин уже занят.'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => 'Эта почта уже занята.'],
            ['verifyCode', 'captcha'],
            ['accept', 'compare', 'compareValue' => 1, 'message' => 'Необходимо подтвердить'],
            ['status', 'default', 'value' => User::STATUS_ACTIVE, 'on' => 'default'],
            ['status', 'in', 'range' =>[
                User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE
            ]],
            ['status', 'default', 'value' => User::STATUS_NOT_ACTIVE, 'on' => 'emailActivation'],
        ];
    }

//    public function rules()
//    {
//        return [
//            [['password', 'login'], 'required'],
//            [['password','login'], 'string', 'max' => 35],
//            ['login', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин (СНИЛС)',
            'password' => 'Пароль',
            'password2' => 'Подтвердите пароль',
            'email' => 'Email',
            'username' => 'Имя',
            'lastname' => 'Фамилия',
            'middle_name' => 'Отчество',
            'school' => 'Школа',
            'school_class' => 'Класс',
            'birthday' => 'Дата рождения',
            'accept' => '',
            'verifyCode' => 'Подтвержение действия',
        ];
    }

    public function reg()
    {
        $user = new User();
        $user->login = $this->login;
        $user->username = $this->username;
        $user->lastname = $this->lastname;
        $user->middle_name = $this->middle_name;
        $user->school = $this->school;
        $user->school_class = $this->school_class;
        $user->birthday = $this->birthday;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if($this->scenario === 'emailActivation')
            $user->generateSecretKey();
        return $user->save() ? $user : null;
    }

    public function sendActivationEmail($user)
    {
        return Yii::$app->mailer->compose('activationEmail', ['user' => $user])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name.' (отправлено роботом).'])
            ->setTo($this->email)
            ->setSubject('Активация для '.Yii::$app->name)
            ->send();
    }
}
