<?php
//
//namespace app\controllers;
//
//use app\models\FoodBoard;
//use app\models\Menu;
//use app\models\Cash;
//use Yii;
//use app\models\Students;
//use yii\helpers\ArrayHelper;
//use app\models\Visits;
//use yii\data\ActiveDataProvider;
//use yii\web\Controller;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;
//use app\models\Schools;
//
///**
// * AdminController implements the CRUD actions for Students model.
// */
//class AdminController extends BehaviorsController
//{
//    public $layout = 'main';
//    /**
//     * {@inheritdoc}
//     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }
//
//    /**
//     * Lists all Students models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        $dataProvider = new ActiveDataProvider([
//            'query' => Students::find(),
//        ]);
//
//        return $this->render('index', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }
//
//    public function actionPays()
//    {
//        $model = new Cash();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect('pays');
//        }
//
//        return $this->render('pays', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Displays a single Students model.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new Students model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        $model = new Students();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Updates an existing Students model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionVisits($id)
//    {
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        $model = $this->findModel($id);
//        $visits1 = Visits::findOne(['student_id' => $id]);
////        $visits1 = Visits::find($id)->groupBy('student_id','event');
//        $vis_id = $visits1->student_id;
//        $visits = new Visits();
//        $visits->student_id = $model->id;
//        $items = Array(
//            'Выход' => 'Выход',
//            'Вход' => 'Вход'
//        );
//        $temp1 = Schools::find()->Select(['title'])->asArray()->all();
//        foreach($temp1 as $el){
//            $temp[$el['title']] = $el['title'];
//        }
//        $schools = $temp;
//
//
//
//        if ($visits->load(Yii::$app->request->post()) && $visits->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('visits', [
//            'model' => $model,
//            'schools' => $schools,
//            'visits' => $visits,
//            'vis_id' => $vis_id,
//            'items' => $items,
//            'param' => $param = ['options' =>[ '10' => ['Selected' => true]]]
//        ]);
//    }
//
//    public function actionFood($id)
//    {
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        $model = $this->findModel($id);
//        $food = FoodBoard::findOne(['student_id' => $id]);
//        $food_id = $food->student_id;
//        $food = new FoodBoard();
//        $food->student_id = $model->id;
////        $items = Array(
////            '0' => 'Выход',
////            '1' => 'Вход'
////        );
//        $items1 = Menu::find()->Select(['title', 'id'])->asArray()->all();
////        $items1 = Menu::find()->all();
//        $temp = array();
//        foreach($items1 as $el){
////            debug($el['title']);
//            $temp[$el['id']] = $el['title'];
//        }
//        $items = $temp;
//        $category = Array(
//            '1' => 'Завтрак',
//            '2' => 'Поздний завтрак',
//            '3' => 'Обед',
//            '4' => 'Второй обед',
//            '5' => 'Ужин',
//        );
//       // debug(($food->load(Yii::$app->request->post()) && $food->save())) ;
//
//        if ($food->load(Yii::$app->request->post()) && $food->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('food', [
//            'model' => $model,
//            'food' => $food,
//            'items' => $items,
//            'category' => $category,
//            'param' => $param = ['options' =>[ '10' => ['Selected' => true]]]
//        ]);
//    }
//
//    public function actionSchoolindex()
//    {
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        $dataProvider = new ActiveDataProvider([
//            'query' => Schools::find(),
//        ]);
//
//        return $this->render('school_index', [
//            'dataProvider' => $dataProvider,
//        ]);
//    }
//
//    /**
//     * Displays a single Scholls model.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionSchoolview($id)
//    {
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        return $this->render('school_view', [
//            'model' => $this->findSchoolmodel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new Scholls model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionSchoolcreate()
//    {
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        $model = new Schools();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['schoolview', 'id' => $model->id]);
//        }
//
//        return $this->render('school_create', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Updates an existing Scholls model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionSchoolupdate($id)
//    {
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        $model = $this->findSchoolmodel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['schoolview', 'id' => $model->id]);
//        }
//
//        return $this->render('school_update', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Deletes an existing Students model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionDelete($id)
//    {
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(['site/start']);
//        }
//
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    public function actionSchooldelete($id)
//    {
//        $this->findSchoolmodel($id)->delete();
//
//        return $this->redirect(['schoolindex']);
//    }
//
//    /**
//     * Finds the Students model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param integer $id
//     * @return Students the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = Students::findOne($id)) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
//
//    protected function findSchoolmodel($id)
//    {
//        if (($model = Schools::findOne($id)) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
//}
