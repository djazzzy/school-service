<?php

namespace app\controllers;

use app\models\CashForm;
use app\models\User;
use app\models\Cash;
use app\models\StudentForm;
use app\models\Students;
use app\models\GetStudentForm;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\BadRequestHttpException;
use app\models\FoodForm;
use app\models\VisitForm;
use app\models\MenuForm;
use app\models\Menu;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;



class ApiController extends Controller
{
    private $token = '$token1';

    public function beforeAction($action) {

        $this->enableCsrfValidation = false;

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if(\Yii::$app->request->get('token', 0) != $this->token){
            $this->asJson($this->responseMessage('Invalid token', 'error'));
            return false;
        }

        return parent::beforeAction($action);

    }

    public function actionFoods()
    {
        $params = json_decode(\Yii::$app->request->getRawBody(), true);
        $jsonerr = json_last_error();
        $model = new FoodForm;
        $model->setAttributes($params);
        if($model->validate()){
            if($model->saveFood()){
                return $this->responseMessage('Added');
            }
        }else{
            $errors = $this->convertErrorsToArray($model);
            return $this->responseMessage($errors, 'error', $jsonerr);
        }
    }

    public function actionGetstudents()
    {
        $params = json_decode(\Yii::$app->request->getRawBody(), true);
        $jsonerr = json_last_error();
        $model = new GetStudentForm();
        $model->setAttributes($params);

        if($model->validate()){
            return $this->responseStudent($model->getStudents());
        }else{
            $errors = $this->convertErrorsToArray($model);
            return $this->responseMessage($errors, 'error', $jsonerr);
        }
    }

    public function actionStudents()
    {
        $data = json_decode(\Yii::$app->request->getRawBody(), true);
        $jsonerr = json_last_error();
        $message = [];
        if($jsonerr){
            $message = ['json error' => $jsonerr];
        }
//        $model = new StudentForm();
//        $model->setAttributes($params);
//        if($model->validate()){
//            if(Students::find()->where(['login'=>$model->snils])->one()){
//                if($model->updateStudent()){
//                    return $this->responseMessage($model->snils . ' - Updated');
//                }
//            }else {
//                if($model->saveStudent()){
//                    return $this->responseMessage($model->snils . ' - Added');
//                }
//            }
//
//        }else{
//            $errors = $this->convertErrorsToArray($model);
//            return $this->responseMessage($errors, 'error', $jsonerr);
//        }

        foreach ($data as $params) {
            $model = new StudentForm();
            $model->setAttributes($params);
            if($model->validate()){
                if(Students::find()->where(['login'=>$model->snils])->one()){
                    if($model->updateStudent()){
                        $message[] = $this->responseMessage($model->snils . ' - Updated');
                    }
                } else {
                    if($model->saveStudent()){
                        $message[] = $this->responseMessage($model->snils . ' - Added');
                    }
                }

            } else {
                $errors = $this->convertErrorsToArray($model);
                $message[] = $this->responseMessage($errors, 'error', $jsonerr);
            }
        }

        return $message;
    }

    public function actionMenu()
    {
        $data = json_decode(\Yii::$app->request->getRawBody(), true);
        $jsonerr = json_last_error();
        $message = [];
        if($jsonerr){
            $message = ['json error' => $jsonerr];
        }


        for ($i=0; count($data) > $i; ++$i) {
            $params = $data[$i];

            $model = new MenuForm();
            $model->setAttributes($params);
            if ($model->validate()) {
                if (Menu::find()->where(['common_id' => $model->id])->one()) {
                    if ($model->updateMenu()) {
                        $message[$i] = $this->responseMessage($model->id . ' - Updated');
                    }
                } else {
                    if ($model->saveMenu()) {
                        $message[$i]= $this->responseMessage($model->id . ' - Added');
                    }
                }

            } else {
                $errors = $this->convertErrorsToArray($model);
                $message[$i] = $this->responseMessage($errors, 'error', $jsonerr);
            }
        }
        return $message;
    }

    public function actionCash()
    {
        $params = json_decode(\Yii::$app->request->getRawBody(), true);
        $jsonerr = json_last_error();
        $model = new CashForm();

        $model->setAttributes($params);
        $like_cash = $model->date;
        $like_stud = Cash::find()->where(['like','date', $like_cash])->andWhere(['status' => 0])->select('snils')->asArray()->all();
        $temp = array_column($like_stud, 'snils');
        $student = Students::find()->where(['login' => $temp])->select(['login', 'username', 'key_card'])->asArray()->all();
        if($model->validate()){
            if($cash = Cash::find()->where(['like','date', $like_cash])->andWhere(['status' => 0])->select(['snils', 'value', 'date'])->asArray()->all()){
                Cash::updateAll(['status' => 1], ['status' =>'0']);
                return $this->responseCash($student, $cash);
            }
        }else{
//            debug($like);
            $errors = $this->convertErrorsToArray($model);
            return $this->responseMessage($errors, 'error', $jsonerr);
        }
    }

    public function actionVisits()
    {
        $params = json_decode(\Yii::$app->request->getRawBody(), true);
        $jsonerr = json_last_error();
        $model = new VisitForm;
        $model->setAttributes($params);
        if($model->validate()){
            if($model->saveVisit()){
                return $this->responseMessage('Added');
            }
        }else{
            $errors = $this->convertErrorsToArray($model);
            return $this->responseMessage($errors, 'error', $jsonerr);
        }
    }

    private function convertErrorsToArray($model)
    {
        $errors = [];
        foreach ($model->getErrors() as $error) {
            $errors[] = $error;
        }

        return $errors;
    }

    private function responseMessage($message, $code = 'success', $jsonerr = 'ok')
    {
        return [
            'code' => $code,
            'message' => $message,
            'json' => $jsonerr
        ];
    }

    private function responseCash($student, $cash, $jsonerr = 'ok')
    {
        return [
            'Student' => $student,
            'Cash' => $cash,
            'json' => $jsonerr
        ];
    }

    private function responseStudent($student, $jsonerr = 'ok')
    {
        return [
            'Student' => $student,
            'json' => $jsonerr
        ];
    }
}
