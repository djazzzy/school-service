<?php

namespace app\controllers;

//use app\models\RegForm;
use app\models\FoodBoard;
use app\models\FoodForb2;
use app\models\SignupForm;
use app\models\Students;
use app\models\Visits;
use app\models\Menu;
use app\models\MenuForbidden;
use app\models\Schools;
use app\models\Cash;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
//use app\models\SignupForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Profile;
use yii\web\BadRequestHttpException;
use app\models\AccountActivation;
use app\models\User;
use app\models\SendEmailForm;
use app\models\ResetPasswordForm;
use yii\data\ActiveDataProvider;


class SiteController extends BehaviorsController
{
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => null,
                'foreColor' => '#000000' , // цвет символов
            'minLength' => 5, // минимальное количество символов
            'maxLength' => 6, // максимальное
            'offset' => 4, // расстояние между символами (можно отрицательное)
            ],
        ];
    }

    public $students;

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['start']);
        }

//        if (Yii::$app->user->can('admin')) {
//            return $this->redirect(['admin/index']);
//        }
//
//        if (Yii::$app->user->can('moder')) {
//            return $this->redirect(['admin/default/index']);
//        }

        $id = Yii::$app->user->identity->id;
        $login = Yii::$app->user->identity->login;
        $student = Students::findOne($id);
        $visit = Visits::find()->where(['snils' => $login])->orderby(['id'=>SORT_DESC])->one();
//        $food = FoodBoard::find()->where(['student_id' => $id])->orderby(['id'=>SORT_DESC])->one();
        if (!Yii::$app->user->isGuest) {
            $date1 = $student->getFood()->orderby(['id'=>SORT_DESC])->one();
        }
        $date = $date1->date;
        $foodgroup = FoodBoard::find()->where(['snils' => $login, 'date' => $date])->all();
        $school = Schools::find()->where(['inn' => $student->school])->one();

        $this->view->params['cash'] = Cash::find()->where(['snils' => $login])->select('value')->asArray()->all();
        $student1 = $student->food;
        $this->view->params['student'] = $student1;

        return $this->render('index', [
            'student' => $student,
            'visit' => $visit,
            'school' => $school,
            'foodgroup' => $foodgroup,
            'date' => $date,
        ]);
    }

    public function actionStart()
    {
        $this->layout = 'sign';

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }

        return $this->render('start', [
        ]);
    }

    public function actionFoodview($date)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['start']);
        }

        $id = Yii::$app->user->identity->id;
        $login = Yii::$app->user->identity->login;
        $student = Students::findOne($id);
        $foodgroup = FoodBoard::find()->where(['snils' => $login, 'date' => $date])->all();
//        $foodgroup1 = FoodBoard::find()->where(['student_id' => $id, 'date' => $date, 'category' => '1'])->orderby(['id'=>SORT_DESC])->all();
//        $foodgroup2 = FoodBoard::find()->where(['student_id' => $id, 'date' => $date, 'category' => '2'])->orderby(['id'=>SORT_DESC])->all();
//        $foodgroup3 = FoodBoard::find()->where(['student_id' => $id, 'date' => $date, 'category' => '3'])->orderby(['id'=>SORT_DESC])->all();
//        $foodgroup4 = FoodBoard::find()->where(['student_id' => $id, 'date' => $date, 'category' => '4'])->orderby(['id'=>SORT_DESC])->all();
//        $foodgroup5 = FoodBoard::find()->where(['student_id' => $id, 'date' => $date, 'category' => '5'])->orderby(['id'=>SORT_DESC])->all();
        $this->view->params['cash'] = Cash::find()->where(['snils' => $login])->select('value')->asArray()->all();
        $student1 = $student->food;
        $this->view->params['student'] = $student1;

        return $this->render('foodview', [
            'student' => $student,
            'foodgroup' => $foodgroup,
//            'foodgroup2' => $foodgroup2,
//            'foodgroup3' => $foodgroup3,
//            'foodgroup4' => $foodgroup4,
//            'foodgroup5' => $foodgroup5,
            'date' => $date,
        ]);
    }

    public function actionFood()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['start']);
        }

        $id = Yii::$app->user->identity->id;
        $login = Yii::$app->user->identity->login;
        $student = Students::findOne($id);
        $date1 = $student->getFood()->orderby(['id'=>SORT_DESC])->groupBy('date')->all();
        $foodgroup = FoodBoard::find()->where(['snils' => $login, 'date' => $date1])->orderby(['id'=>SORT_DESC])->all();
        $this->view->params['cash'] = Cash::find()->where(['snils' => $login])->select('value')->asArray()->all();
        $student1 = $student->food;
        $this->view->params['student'] = $student1;
        foreach($date1 as $dat){
            $final[$dat['date']] = $foodgroup = FoodBoard::find()->where(['snils' => $login, 'date' => $dat])->all();
        }

        return $this->render('food', [
            'student' => $student,
            'foodgroup' => $foodgroup,
            'date1' => $date1,
            'final' => $final,
        ]);
    }

    public function actionVisits()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['start']);
        }

        $id = Yii::$app->user->identity->id;
        $login = Yii::$app->user->identity->login;
        $student = Students::findOne($id);
        $this->view->params['cash'] = Cash::find()->where(['snils' => $login])->select('value')->asArray()->all();
        $student1 = $student->food;
        $this->view->params['student'] = $student1;

        return $this->render('visits', [
            'student' => $student,

        ]);
    }

    public function actionMenu()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['start']);
        }

        $id = Yii::$app->user->identity->id;
        $login = Yii::$app->user->identity->login;
        $student = Students::findOne($id);
        $model = MenuForbidden::find()->where(['snils' => $login])->one();

        $student = Students::findOne($id);
        $this->view->params['cash'] = Cash::find()->where(['snils' => $login])->select('value')->asArray()->all();
        $student1 = $student->food;
        $this->view->params['student'] = $student1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('my-success', "Изменения внесены");
            return $this->redirect(['menu']);

        }

        return $this->render('menu', [
            'model' => $model,
        ]);
    }

    public function actionMenu3()
    {
        $id = Yii::$app->user->identity->id;
        $login = Yii::$app->user->identity->login;
//        $model = Menu::find()->where(['snils' => $login])->one();
//
//        $student = Students::findOne($id);
//        $this->view->params['cash'] = Cash::find()->where(['snils' => $login])->select('value')->asArray()->all();
//        $student1 = $student->food;
//        $this->view->params['student'] = $student1;
        $dataProvider = new ActiveDataProvider([
            'query' => Menu::find(),
        ]);

        return $this->render('menu3', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMenu2()
    {
        $login = Yii::$app->user->identity->login;
        $model = new FoodForb2();
//        $model = FoodForb2::find()->where(['login' => $login])->all();
        $model->snils = $login;
//        $test = FoodForb2::find()->where(['snils' => $login])->andWhere(['not like', 'title', 'Борщ'])->all();
//        debug($test);

        if ($model->load(Yii::$app->request->post()) && $model->saveForb()) {
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            $this->refresh();
            return $this->render('menu2', [
                'model' => $model,
            ]);
        }

        return $this->render('menu2', [
            'model' => $model,
        ]);
    }

    public function actionCash()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['start']);
        }

        $id = Yii::$app->user->identity->id;
        $login = Yii::$app->user->identity->login;
        $student = Students::findOne($id);
        $this->view->params['cash'] = Cash::find()->where(['snils' => $login])->select('value')->asArray()->all();
        $student1 = $student->food;
        $this->view->params['student'] = $student1;

        return $this->render('cash', [
            'student' => $student,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionSignin()
    {
        $this->layout = 'sign';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

//        $model->password = '';
        return $this->render('signin', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionAdmin()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Students::find(),
        ]);

        return $this->render('admin', [
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->layout = 'sign';

        if(!Yii::$app->user->isGuest){
            $this->layout = 'base';
        }

        return $this->render('about');
    }

    public function actionSignup()
    {

        $this->layout = 'sign';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $emailActivation = Yii::$app->params['emailActivation'];
        $model = $emailActivation ? new SignupForm(['scenario' => 'emailActivation']) : new SignupForm();
        $temp1 = Schools::find()->Select(['title'])->asArray()->all();
        foreach($temp1 as $el){
            $temp[$el['title']] = $el['title'];
        }
        $schools = $temp;
//        $scholls =Array(
//            'Школа №1' => 'Школа №1',
//            'Школа №3' => 'Школа №3',
//            'Школа №10' => 'Школа №10',
//            'Школа №11' => 'Школа №11',
//        );

        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($user = $model->reg()):
                if ($user->status === User::STATUS_ACTIVE):
                    if (Yii::$app->getUser()->login($user)):
                        return $this->goHome();
                    endif;
                else:
                    if($model->sendActivationEmail($user)):
                        Yii::$app->session->setFlash('success', 'Письмо с активацией отправлено на емайл <strong>'.Html::encode($user->email).'</strong> (проверьте папку спам).');
                    else:
                        Yii::$app->session->setFlash('error', 'Ошибка. Письмо не отправлено.');
                        Yii::error('Ошибка отправки письма.');
                    endif;
                    return $this->refresh();
                endif;
            else:
                Yii::$app->session->setFlash('error', 'Возникла ошибка при регистрации.');
                Yii::error('Ошибка при регистрации');
                return $this->refresh();
            endif;
        endif;

        return $this->render('signup', [
            'model' => $model,
            'schools' => $schools,
        ]);
    }

    public function actionActivateAccount($key)
    {
        try {
            $user = new AccountActivation($key);
        }
        catch(InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if($user->activateAccount()):
            Yii::$app->session->setFlash('success', 'Активация прошла успешно. <strong>'.Html::encode($user->username).'</strong> !');
        else:
            Yii::$app->session->setFlash('error', 'Ошибка активации.');
            Yii::error('Ошибка при активации.');
        endif;

        return $this->redirect(Url::to(['/site/signin']));
    }

    public function actionSendEmail()
    {
        $model = new SendEmailForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if($model->sendEmail()):
                    Yii::$app->getSession()->setFlash('warning', 'Проверьте емайл.');
                    return $this->goHome();
                else:
                    Yii::$app->getSession()->setFlash('error', 'Нельзя сбросить пароль.');
                endif;
            }
        }

        return $this->render('sendEmail', [
            'model' => $model,
        ]);
    }



}
