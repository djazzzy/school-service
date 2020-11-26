<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Students;
use app\models\MenuForbidden;

//class StudentForm extends \yii\db\ActiveRecord
class StudentForm extends Model
{
    public $snils;
    public $password;
    public $username;
    public $school;
    public $school_class;
    public $key_card;
    public $contract_id;
    public $role;
//    public $quantity;

//    public static function tableName()
//    {
//        return 'students';
//    }

    public function rules()
    {
        return [
            [['snils', 'password', 'username', 'key_card', 'school', 'role'], 'required'],
            [['contract_id'], 'safe'],
            [['snils', 'username', 'key_card', 'school', 'school_class', 'password', 'role'], 'trim'],
            ['username', 'string', 'min' => 2, 'max' => 255],
        ];
    }

    public function saveStudent()
    {
        $student = new Students;
        $this->loadAttributes($student);
        $user_last = Students::find()->orderby(['id' => SORT_DESC])->one();
        $pref = sprintf('%04d', 542);
        $contract = $pref . ($user_last->id + 1);
        $student->contract_id = $contract;
        $student->get_status_visit = 1;
//        $menu_forb = new MenuForbidden;
//        $menu_forb->snils = $this->snils;
//        $menu_forb->save(false);
        $student->save(false);

        return $student;
    }

    public function updateStudent()
    {
        $student = Students::find()->where(['login'=>$this->snils])->one();
        $this->loadAttributes($student);
        $student->get_status_visit = 1;
        $student->save(false);

        return $student;
    }

    protected function loadAttributes($student)
    {
        $student->setAttributes($this->attributes);
        $student->login = $this->snils;
        $student->username = $this->username;
//        $student->password_hash = $this->password_hash;
        $student->password_hash = Yii::$app->security->generatePasswordHash($this->password);

//        if($menu = Menu::find()->where(['title' => $this->name])->one()){
//            $food->food_id = $menu->id;
//        }else{
//            $menu = new Menu;
//            $menu->title = $this->name;
//            if($menu->save(false)){
//                $food->food_id = $menu;
//            }
//        }
    }
}
