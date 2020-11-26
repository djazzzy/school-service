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
class UserForm extends \app\models\User
{

    public $password;
    public $snils;
    public $image_upl;
//    public $username;

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
//            [['login', 'username', 'school', 'school_class'], 'required'],
////            [['snils', 'password', 'username', 'key_card', 'school', 'school_class'], 'required'],
////            [['birthday', 'snils', 'password', 'username', 'password_hash', 'login', 'school', 'school_class' , 'contract_id', 'role'], 'safe'],
////            [['birthday', 'snils', 'password', 'username', 'password_hash', 'login', 'school', 'school_class' , 'contract_id', 'role'], 'trim'],
////            [['birthday', 'password', 'username', 'login', 'school', 'school_class' , 'contract_id', 'role'], 'trim'],
////            [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
////            [['image_upl'], 'file', 'extensions' => 'png, jpg, jpeg'],
//            [['status'], 'integer'],
////            ['username', 'string', 'min' => 1, 'max' => 255],
////            ['login', 'unique', 'message' => 'Этот логин уже занят.'],
////            [['login', 'password', 'name', 'lastname', 'middle_name', 'school', 'school_class', 'secret_key'], 'string', 'max' => 255],
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
            'key_card' => 'Ключ карта',
            'password2' => 'Подтвердите пароль',
            'contract_id' => 'Договор',
            'email' => 'Электронная почта',
            'username' => 'ФИО',
            'school' => 'Школа',
            'school_class' => 'Класс',
            'birthday' => 'Дата рождения',
            'status' => 'Status',
            'image' => 'Фото профиля',
            'image_upl' => 'Фото профиля',
            'get_status_food' => 'Выгружен в буфет',
            'get_status_visit' => 'Выгружен в проходную',
            'secret_key' => 'Secret Key',
            'auth_key' => 'Auth Key',
        ];
    }
//    public function saveOne(){
//        $student = Students::find()->where(['id'=>$this->id])->one();
//        $this->loadAttributes($student);
//        $student->save(false);
//
//        return $student;
//    }

//    public function uploadImg(){
//
//        if($this->image_upl){
//            if($this->validate()){
//                $unic = uniqid();
//                $filename = "$unic.{$this->image_upl->extension}";
//                $this->image_upl->saveAs("img/profile/$filename");
//                $userupd = self::findOne($this->id);
//                if($userupd ->image){
//                    if(file_exists('img/profile/' . $userupd->image)) {
//                        unlink('img/profile/' . $userupd->image);
//                    }
//                }
//                $userupd->image = $filename;
//                return $userupd ->save() ? $userupd  : null;
//            }else{
//                return false;
//            }
//        }
//    }

//    public static function findIdentity($id)
//    {
//        return static::findOne([
//            'id' => $id,
//        ]);
//    }

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
