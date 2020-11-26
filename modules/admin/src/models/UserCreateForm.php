<?php

namespace djazzy\admin\models;

use Yii;
use yii\web\IdentityInterface;
use yii\base\Model;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $username
 * @property string $lastname
 * @property string $middle_name
 * @property string $school
 * @property string $school_class
 * @property string $birthday
 * @property int $status
 * @property string $secret_key
 */
class UserCreateForm extends \app\models\User
{

    public $password;
    public $password2;
    public $image_upl;

    public static function tableName()
    {
        return 'users';
    }

    public static $role = array(
        'user'=>'Ученик',
        'worker'=>'Работник школы',
        'teacher'=>'Классный руководитель',
        'moder'=>'Модератор',
        'admin'=>'Админ',
    );

//    public function rules()
//    {
//        return [
////            [['login', 'password', 'username', 'school', 'school_class', 'birthday', 'key_card'], 'required'],
//////            [['snils', 'password', 'username', 'key_card', 'school', 'school_class'], 'required'],
////            ['login', 'unique', 'targetClass' => User::className(), 'message' => 'Этот Логин уже занят.'],
////            ['email', 'email'],
////            ['login', 'string', 'min' => 11, 'max' => 15],
////            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
////            [['image_upl'], 'file', 'extensions' => 'png, jpg, jpeg'],
////            ['password2', 'compare', 'compareAttribute'=>'password', 'message' => 'Пароли должны совпадать.'],
////            ['password', 'match', 'pattern' => '/[a-z0-9]\w*$/i', 'message' => 'Пароль должен содежрать только латинские буквы и цифры.'],
////            [['birthday', 'snils', 'password', 'username', 'password_hash', 'login', 'school', 'school_class' , 'contract_id', 'role'], 'safe'],
////            [['birthday', 'snils', 'password', 'username', 'password_hash', 'login', 'school', 'school_class' , 'contract_id', 'role'], 'trim'],
////            [['status'], 'integer'],
////            ['username', 'string', 'min' => 1, 'max' => 255],
////            ['login', 'unique', 'message' => 'Этот логин уже занят.'],
////            [['login', 'password', 'name', 'lastname', 'middle_name', 'school', 'school_class', 'secret_key'], 'string', 'max' => 255],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
//    public function attributeLabels()
//    {
//        return [
//            'id' => 'ID',
//            'login' => 'Логин (СНИЛС)',
//            'password' => 'Пароль',
//            'key_card' => 'Ключ карта',
//            'password2' => 'Подтвердите пароль',
//            'contract_id' => 'Договор',
//            'email' => 'Электронная почта',
//            'username' => 'ФИО',
//            'school' => 'Школа',
//            'school_class' => 'Класс',
//            'birthday' => 'Дата рождения',
//            'status' => 'Status',
//            'image' => 'Фото профиля',
//            'image_upl' => 'Фото профиля',
//            'get_status_food' => 'Выгружен в буфет',
//            'get_status_visit' => 'Выгружен в проходную',
//            'secret_key' => 'Secret Key',
//            'auth_key' => 'Auth Key',
//        ];
//    }

    public function saveOne(){
        $student = Students::find()->where(['id'=>$this->id])->one();
        $this->loadAttributes($student);
        $student->save(false);

        return $student;
    }

    public function reg()
    {
        $user = new User();
        $user->login = $this->login;
        $user->username = $this->username;
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

    public function uploadImgNew(){

        if($this->image_upl){
            if($this->validate()){
                $unic = uniqid();
                $filename = "$unic.{$this->image_upl->extension}";
                $this->image_upl->saveAs("img/profile/$filename");
//                $userupd = self::findIdentity(Yii::$app->user->identity->id);
//                if($userupd ->image){
//                    if(file_exists('img/profile/' . $userupd->image)) {
//                        unlink('img/profile/' . $userupd->image);
//                    }
//                }
                $this->image = $filename;
//                return $userupd ->save() ? $userupd  : null;
//            }else{
//                return false;
            }
        }
    }

//    public function setContract()
//    {
//        $user_last = self::find()->orderby(['id' => SORT_DESC])->one();
//        $pref = sprintf('%04d', 542);
//        $contract = $pref . ($user_last->id + 1);
//        $this->contract_id = $contract;
//    }

    public static function findIdentity($id)
    {
        return static::findOne([
            'id' => $id,
        ]);
    }

    public function getVisits(){
        return $this->hasMany(Visits::className(), ['snils' => 'login']);
    }

    public function getFood(){
        return $this->hasMany(FoodBoard::className(), ['snils' => 'login']);
    }

    public function getCash(){
        return $this->hasMany(Cash::className(), ['snils' => 'login']);
    }
}
