<?php

namespace app\controllers;

use app\models\User;
use app\models\Students;
use app\models\Cash;
use app\models\PasswordChangeForm;
use app\models\Userupd;
use app\models\UploadImage;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['teacher'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        $id = Yii::$app->user->identity->id;
        $login = Yii::$app->user->identity->login;
        $model = Userupd::findOne($id);
        $student = Students::findOne($id);
//        $upload = new UploadImage();
//        if(Yii::$app->request->isPost){
//            $model->image_upl = UploadedFile::getInstance($model, 'image_upl');
////            $model->image = $upload->image->name;
//            $model->upload();
//            $model->image = $upload->image->name;
        $this->view->params['cash'] = Cash::find()->where(['snils' => $login])->select('value')->asArray()->all();
        $student1 = $student->food;
        $this->view->params['student'] = $student1;
            if($model->load(Yii::$app->request->post()) && $model->save()){
                $model->image_upl = UploadedFile::getInstance($model, 'image_upl');
                $model->upload();
                Yii::$app->session->setFlash('my-success', "Изменения внесены");
                return $this->redirect(['index']);

//                return $this->render('index', [
////                'model' => $this->findModel(),
//                    'model' => $model,
////                    'upload' => $upload,
//                ]);
//            }

        }

//        $model = new UploadImage();
//        if(Yii::$app->request->isPost){
//            $model->image = UploadedFile::getInstance($model, 'image');
//            $model->upload();
//            return $this->render('index', [
//                'model' => $this->findModel(),
//                'upload' => $upload,
//            ]);
//        }
//        return $this->render('upload', ['model' => $model]);

        return $this->render('index', [
            'model' => $model,
//            'upload' => $upload,
        ]);
    }

    public function actionImageChange()
    {
        $id = Yii::$app->user->identity->id;
//        $model = Userupd::findOne($id);
        $upload = new UploadImage();
        if(Yii::$app->request->isPost){
            $upload->image = UploadedFile::getInstance($upload, 'image');
//            $model->image = $model->image->name;
            $upload->upload();
//            $model->image = $upload->image->name;
//            if($model->load(Yii::$app->request->post()) && $model->save()){
                return $this->render('imageChange', [
                'model' => $this->findModel(),
//                    'model' => $model,
                    'upload' => $upload,
                ]);
//            }

        }
//        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->render('imageChange', [
//                'model' => $this->findModel(),
//                'model' => $model,
                'upload' => $upload,
            ]);
//        }
    }

    public function actionPasswordChange()
    {
        $user = $this->findModel();
        $model = new PasswordChangeForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('passwordChange', [
                'model' => $model,
            ]);
        }
    }
    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return Userupd::findOne(Yii::$app->user->identity->getId());
    }
}