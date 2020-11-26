<?php

namespace djazzy\admin\models;

use Yii;

/**
 * This is the model class for table "students".
 *
// * @property int $id
// * @property string $login
// * @property string $password
// * @property string $username
// * @property string $lastname
// * @property string $middle_name
// * @property string $school
// * @property string $school_class
// * @property string $birthday
// * @property int $status
// * @property string $secret_key
 */
class User extends \app\models\User
{

//    public $password;
//    public $snils;
//    public $username;
    /**
     * {@inheritdoc}
     */
//    public static function tableName()
//    {
//        return 'users';
//    }

    /**
     * {@inheritdoc}
     */
//    public function rules()
//    {
//        return [
////            [['login', 'password', 'name', 'lastname', 'middle_name', 'school', 'school_class', 'birthday', 'status', 'secret_key'], 'required'],
//            [['snils', 'password', 'username', 'key_card', 'school', 'school_class'], 'required'],
//            [['birthday', 'snils', 'password', 'username', 'password_hash', 'login', 'school', 'school_class' , 'contract_id', 'get_status_food', 'checked'], 'safe'],
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
//            'lastname' => 'Фамилия',
//            'middle_name' => 'Отчество',
//            'school' => 'Школа',
//            'school_class' => 'Класс',
//            'birthday' => 'Дата рождения',
//            'status' => 'Status',
//            'get_status' => '1c статус',
//            'secret_key' => 'Secret Key',
//            'auth_key' => 'Auth Key',
//            'get_status_food' => 'Выгружен в буфет',
//            'get_status_visit' => 'Выгружен в проходную',
//            'checked' => 'Проверен',
//            'role' => 'Роль',
//        ];
//    }
//    public function saveOne(){
//        $student = Students::find()->where(['id'=>$this->id])->one();
//        $this->loadAttributes($student);
//        $student->save(false);
//
//        return $student;
//    }

//    protected function loadAttributes($student)
//    {
//        $student->setAttributes($this->attributes);
//        $student->login = $this->snils;
//        $student->username = $this->username;
//        $student->password_hash = $this->password_hash;
//        $student->password_hash = Yii::$app->security->generatePasswordHash($this->password);
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
