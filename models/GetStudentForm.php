<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Students;

class GetStudentForm extends Model
{
    public $get_status;
    public $school;
//    public $quantity;


    public function rules()
    {
        return [
            [['get_status', 'school'], 'required'],
            [['get_status', 'school'], 'trim'],
        ];
    }

    public function GetUserFood()
    {
        $students = Students::find()
            ->select(['login', 'username', 'key_card', 'CONCAT("http://onimo9sm.bget.ru/img/profile/", image) AS image'])
            ->where(['get_status' => $this->get_status, 'school_inn' => $this->school_inn])
            ->asArray()
            ->all();

//                $student1 = Students::find()->where(['get_status' => $model->get_status])->select('login')->asArray()->all();
//                $temp = array_column($student1, 'login');
//                Students::updateAll(['get_status' => 1], ['login' => $temp]);
        return $students;
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

    public function getStudents()
    {
        if($this->get_status == 'food') {
            if ($students = Students::find()
                ->select(['login', 'username', 'key_card', 'CONCAT("http://onimo9sm.bget.ru/img/profile/", image) AS image', 'role'])
                ->where(['get_status_food' => 0, 'school' => $this->school])
                ->asArray()
                ->all()) {

                        $student1 = Students::find()->where(['get_status_food' => 0])->andWhere(['school' => $this->school])->select('login')->asArray()->all();
                        $temp = array_column($student1, 'login');
                        Students::updateAll(['get_status_food' => 1], ['login' => $temp]);
                return $students;
            }
        }elseif ($this->get_status == 'visit'){
            if ($students = Students::find()
                ->select(['login', 'username', 'key_card', 'CONCAT("http://onimo9sm.bget.ru/img/profile/", image) AS image', 'role'])
                ->where(['get_status_visit' => 0, 'school' => $this->school])
                ->asArray()
                ->all()) {

                        $student1 = Students::find()->where(['get_status_visit' => 0])->andWhere(['school' => $this->school])->select('login')->asArray()->all();
                        $temp = array_column($student1, 'login');
                        Students::updateAll(['get_status_visit' => 1], ['login' => $temp]);
                return $students;
            }
        }
    }
}
