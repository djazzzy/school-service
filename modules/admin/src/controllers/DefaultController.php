<?php

namespace djazzy\admin\controllers;

use app\components\BackendController;
use djazzy\admin\Module;
use yii\web\Controller;
use yii\web\Response;
use Yii;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use djazzy\admin\models\FoodBoard;
use djazzy\admin\models\Menu;
use djazzy\admin\models\MenuCategory;
use djazzy\admin\models\Cash;
use djazzy\admin\models\Schools;
use djazzy\admin\models\User;
use djazzy\admin\models\UserForm;
use djazzy\admin\models\Visits;
use djazzy\admin\models\UserSearch;
use djazzy\admin\models\UserCreateForm;

class DefaultController extends BackendController
{
    public $layout = 'main';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'index2', 'edit', 'toggle', 'view'],
                        'roles' => ['teacher'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['pays', 'pays-add'],
                        'roles' => ['moder'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'index2'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'toggle' => [
                'class' => \app\components\toggle\ToggleAction::className(),
                'modelClass' => User::className(),
            ],
        ];
    }

    /**
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        $searchModel = new UserSearch();
        if(Yii::$app->user->can('admin')){
            $searchModel->isAdmin = true;
        }
        if(Yii::$app->user->can('teacher')){
            $searchModel->isTeacher = true;
        }
        if(Yii::$app->user->can('moder')){
            $searchModel->isModer =  true;
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionIndex2()
    {
        $id = Yii::$app->user->identity->id;
        $user =  User::findOne($id);
        if(Yii::$app->request->post()){
            $model = Yii::$app->request->post();
        }else{
            $model = new User();
        }

        $students = User::find()->where(['school' => $user->school ,'school_class' => $user->school_class ])->all();

        if(Yii::$app->request->post()){
            if(
                $test->load(Yii::$app->request->post()) &&
                $model->setAttributes($test)
                && $model->saveOne())
            {
                return $this->redirect(['index2']);
            }
        }
        return $this->render('index2', [
            'students' => $students,
        ]);
    }

    public function actionPaysAdd($id)
    {
        $user = UserForm::findOne($id);
        $model = new Cash();
        $model->snils = $user->login;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['pays' , 'id' => $user->id]);
        }

        return $this->render('paysAdd', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Displays a single Students model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionEdit($id)
    {
        $model = UserForm::findOne($id);
//        $temp = Schools::find()->all();
////        debug($temp);
//        foreach($temp as $el){
////            debug($el);
//            $schools[$el->inn] = $el->title;
//        }
        $temp1 = Schools::find()->all();
        foreach($temp1 as $el){
            $schools[$el->inn] = $el->title;
        }
//        $temp1 = Schools::find()->Select(['title', 'inn'])->asArray()->all();
//        foreach($temp1 as $el){
//            $temp[$el['inn']] = $el['title'];
//        }
//        $schools = $temp;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image_upl = UploadedFile::getInstance($model, 'image_upl');
////            debug($model);
            $model->uploadImg();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'schools' => $schools,
        ]);
    }

    public function actionPays($id)
    {
        $model = User::findOne($id);

//        $login = Yii::$app->user->identity->login;
        $query = Cash::find()->where(['snils' => $model->login]);

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('pays', [
//            'model' => $model,
//        ]);

        $dataProvider = new ActiveDataProvider([
//            'query' => Cash::find()->where(['id' => $id])->all(),
//            'query' => User::getCash(),
            'query' => $query,
        ]);

        return $this->render('pays', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionPaysEdit($id)
    {
//        debug($id);
        $model = Cash::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('pays' , $model);
        }

        return $this->render('paysEdit', [
            'model' => $model,
//            'id' => $id,
        ]);
    }

    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        $model = new UserCreateForm();
        $temp1 = Schools::find()->all();
        foreach($temp1 as $el){
            $schools[$el->inn] = $el->title;
        }

//        if ($model->load(Yii::$app->request->post())) {
//            if($model->image_upl = UploadedFile::getInstance($model, 'image_upl') && $model->upload() && $model->save()){
//                return $this->redirect(['view', 'id' => $model->id]);
//            }
//        }
        if($model->load(Yii::$app->request->post())) {
            $model->setContract();
            $model->setPassword($model->password);
            $model->image_upl = UploadedFile::getInstance($model, 'image_upl');
            $model->uploadImgNew();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'schools' => $schools,
        ]);
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionVisits($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        $model = $this->findModel($id);
        $visits1 = Visits::findOne(['student_id' => $id]);
//        $visits1 = Visits::find($id)->groupBy('student_id','event');
        $vis_id = $visits1->student_id;
        $visits = new Visits();
        $visits->student_id = $model->id;
        $items = Array(
            'Выход' => 'Выход',
            'Вход' => 'Вход'
        );
        $temp1 = Schools::find()->Select(['title'])->asArray()->all();
        foreach($temp1 as $el){
            $temp[$el['title']] = $el['title'];
        }
        $schools = $temp;



        if ($visits->load(Yii::$app->request->post()) && $visits->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('visits', [
            'model' => $model,
            'schools' => $schools,
            'visits' => $visits,
            'vis_id' => $vis_id,
            'items' => $items,
            'param' => $param = ['options' =>[ '10' => ['Selected' => true]]]
        ]);
    }

    public function actionFood($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        $model = $this->findModel($id);
        $food = FoodBoard::findOne(['student_id' => $id]);
        $food_id = $food->student_id;
        $food = new FoodBoard();
        $food->student_id = $model->id;
//        $items = Array(
//            '0' => 'Выход',
//            '1' => 'Вход'
//        );
        $items1 = Menu::find()->Select(['title', 'id'])->asArray()->all();
//        $items1 = Menu::find()->all();
        $temp = array();
        foreach($items1 as $el){
//            debug($el['title']);
            $temp[$el['id']] = $el['title'];
        }
        $items = $temp;
        $category = Array(
            '1' => 'Завтрак',
            '2' => 'Поздний завтрак',
            '3' => 'Обед',
            '4' => 'Второй обед',
            '5' => 'Ужин',
        );
        // debug(($food->load(Yii::$app->request->post()) && $food->save())) ;

        if ($food->load(Yii::$app->request->post()) && $food->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('food', [
            'model' => $model,
            'food' => $food,
            'items' => $items,
            'category' => $category,
            'param' => $param = ['options' =>[ '10' => ['Selected' => true]]]
        ]);
    }

    public function actionSchoolindex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Schools::find(),
        ]);

        return $this->render('school_index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Scholls model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSchoolview($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        return $this->render('school_view', [
            'model' => $this->findSchoolmodel($id),
        ]);
    }

    /**
     * Creates a new Scholls model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSchoolcreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        $model = new Schools();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['schoolview', 'id' => $model->id]);
        }

        return $this->render('school_create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Scholls model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSchoolupdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        $model = $this->findSchoolmodel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['schoolview', 'id' => $model->id]);
        }

        return $this->render('school_update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/start']);
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSchooldelete($id)
    {
        $this->findSchoolmodel($id)->delete();

        return $this->redirect(['schoolindex']);
    }

    public function actionMenulist()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Menu::find(),
        ]);

        return $this->render('menulist', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMenucreate()
    {
        $model = new Menu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['menulist']);
        }

        return $this->render('menucreate', [
            'model' => $model,
        ]);
    }

    public function actionMenuupdate($id)
    {
        $model = Menu::findOne($id);
        $temp1 = MenuCategory::find()->all();
        foreach($temp1 as $el){
            $cats[$el->id] = $el->title;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['menulist']);
        }

        return $this->render('menuupdate', [
            'model' => $model,
            'cats' => $cats,
        ]);
    }

    public function actionMenucategory()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => MenuCategory::find(),
        ]);

        return $this->render('menucategory', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreatemenucat()
    {
        $model = new MenuCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['menucategory']);
        }

        return $this->render('createmenucat', [
            'model' => $model,
        ]);
    }

    public function actionUpdatemenucat($id)
    {
        $model = MenuCategory::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['menucategory']);
        }

        return $this->render('updatemenucat', [
            'model' => $model,
        ]);
    }

    public function actionDeletemenucat($id)
    {
        MenuCategory::findOne($id)->delete();

        return $this->redirect(['menucategory']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findSchoolmodel($id)
    {
        if (($model = Schools::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}