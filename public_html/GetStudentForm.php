<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Students;

class GetStudentForm extends Model
{
    public $get_status;
    public $school_inn;
//    public $quantity;


    public function rules()
    {
        return [
            [['get_status', 'school_inn'], 'required'],
//            ['login', 'unique', 'message' => 'Этот логин уже занят.'],
//            [['quantity', 'price'], 'integer'],
        ];
    }

    public function saveFood()
    {
        $student = new Students;
        $this->loadAttributes($student);
//        $this->password_hash = Yii::$app->security->generatePasswordHash($this->$password);
        $student->save(false);

        return $student;
    }

    protected function loadAttributes($student)
    {
        $student->setAttributes($this->attributes);
//        $student->login = $this->snils;
//        $student->username = $this->username;
//        $student->password_hash = $this->password_hash;
//        $student->password_hash = Yii::$app->security->generatePasswordHash($this->password);

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
