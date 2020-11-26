<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = 'Меню';
//$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php if( Yii::$app->session->hasFlash('my-success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('my-success'); ?>
    </div>
<?php endif;?>
<div class="students-view mb-4">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <h2>Меню</h2>

    <div class="card-body shadow">
        <div class="table-responsive ">
            <div class="menu-forbidden-form">

                <?php $form = ActiveForm::begin([
//                    'options' => ['class' => 'menu-form'],
                    'fieldConfig' => ['options' => ['class' => 'form_checkbox']],
                ]); ?>
                <div class="menu-form flex-wrap justify-content-between">
                    <div class="visit card shadow mb-4 menu-table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Первое</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                <tr>
                                    <th>Блюдо</th>
                                    <th>Порция</th>
                                    <th>Цена</th>
                                    <th>Блокировать</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Борщ</td>
                                    <td>250 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'borsh')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Суп гороховый</td>
                                    <td>250 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'sup_goroh')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Суп фасолевый</td>
                                    <td>250 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'sup_faso')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Суп крем чечевичный</td>
                                    <td>250 гр.</td>
                                    <td>30 ₽</td>
                                    <td><?= $form->field($model, 'sup_chec')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Суп рисовый</td>
                                    <td>250 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'sup_rise')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Суп лапша домашняя</td>
                                    <td>250 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'sup_lap')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Суп хинкал</td>
                                    <td>250 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'sup_hinkal')->checkbox() ?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="visit card shadow mb-4 menu-table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Гарниры</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                <tr>
                                    <th>Блюдо</th>
                                    <th>Порция</th>
                                    <th>Цена</th>
                                    <th>Блокировать</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Картофельное пюре</td>
                                    <td>180 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'kar_pure')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Вермишель по турецки</td>
                                    <td>150 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'verm_tur')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Рис с овощами</td>
                                    <td>150 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'rise_ovosh')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Картофель по деревенски</td>
                                    <td>150 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'kart_derev')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Макароны</td>
                                    <td>150 гр.</td>
                                    <td>20 ₽</td>
                                    <td><?= $form->field($model, 'makaron')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Каша гречневая</td>
                                    <td>150 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'kasha_grech')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Каша пшеничная</td>
                                    <td>150 гр.</td>
                                    <td>20 ₽</td>
                                    <td><?= $form->field($model, 'kasha_pshen')->checkbox() ?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="visit card shadow mb-4 menu-table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Второе</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                <tr>
                                    <th>Блюдо</th>
                                    <th>Порция</th>
                                    <th>Цена</th>
                                    <th>Блокировать</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Гуляш из говядины</td>
                                    <td>100 гр.</td>
                                    <td>60 ₽</td>
                                    <td><?= $form->field($model, 'gulyash')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Филе куриное в соусе</td>
                                    <td>100 гр.</td>
                                    <td>50 ₽</td>
                                    <td><?= $form->field($model, 'file_kur')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Курица жаренная</td>
                                    <td>100 гр.</td>
                                    <td>45 ₽</td>
                                    <td><?= $form->field($model, 'kuritca_jar')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Котлеты куринные</td>
                                    <td>90 гр.</td>
                                    <td>40 ₽</td>
                                    <td><?= $form->field($model, 'kotlet_kurin')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Печень жаренная</td>
                                    <td>80 гр.</td>
                                    <td>40 ₽</td>
                                    <td><?= $form->field($model, 'pechen_jar')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Рыба жаренная</td>
                                    <td>80 гр.</td>
                                    <td>40 ₽</td>
                                    <td><?= $form->field($model, 'riba_jar')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Печень с овощами</td>
                                    <td>200 гр.</td>
                                    <td>70 ₽</td>
                                    <td><?= $form->field($model, 'pechen_ovosh')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Плов с говядиной</td>
                                    <td>200 гр.</td>
                                    <td>80 ₽</td>
                                    <td><?= $form->field($model, 'plov_gov')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Овощное рагу с курицей</td>
                                    <td>200 гр.</td>
                                    <td>80 ₽</td>
                                    <td><?= $form->field($model, 'ragu_kur')->checkbox() ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="visit card shadow mb-4 menu-table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Напитки</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                <tr>
                                    <th>Блюдо</th>
                                    <th>Порция</th>
                                    <th>Цена</th>
                                    <th>Блокировать</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Компот</td>
                                    <td>200 гр.</td>
                                    <td>10 ₽</td>
                                    <td><?= $form->field($model, 'kompot')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Чай</td>
                                    <td>200 гр.</td>
                                    <td>5 ₽</td>
                                    <td><?= $form->field($model, 'chay')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Какао</td>
                                    <td>200 гр.</td>
                                    <td>10 ₽</td>
                                    <td><?= $form->field($model, 'kakao')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Кисель</td>
                                    <td>200 гр.</td>
                                    <td>10 ₽</td>
                                    <td><?= $form->field($model, 'kisel')->checkbox() ?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="visit card shadow mb-4 menu-table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Разное</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                <tr>
                                    <th>Блюдо</th>
                                    <th>Порция</th>
                                    <th>Цена</th>
                                    <th>Блокировать</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Аленка большая</td>
                                    <td>100 гр.</td>
                                    <td>55 ₽</td>
                                    <td><?= $form->field($model, 'alyen_bol')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Аленка маленькая</td>
                                    <td>15 гр.</td>
                                    <td>10 ₽</td>
                                    <td><?= $form->field($model, 'alyen_mal')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Баунти</td>
                                    <td>50 гр.</td>
                                    <td>30 ₽</td>
                                    <td><?= $form->field($model, 'baunti')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Вкусно Сок</td>
                                    <td>200 гр.</td>
                                    <td>15 ₽</td>
                                    <td><?= $form->field($model, 'vkusno_sok')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Вода "Горная"</td>
                                    <td>600 гр.</td>
                                    <td>15 ₽</td>
                                    <td><?= $form->field($model, 'voda_gorn')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Вода "Горная" Лимонная</td>
                                    <td>600 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'voda_gorn_lim')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Вода "Пилигримм"</td>
                                    <td>500 гр.</td>
                                    <td>50 ₽</td>
                                    <td><?= $form->field($model, 'voda_pill')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Йогурт молочный коктейль</td>
                                    <td>200 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'egurt_mol_kok')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Кекс "Тортини"</td>
                                    <td>100 гр.</td>
                                    <td>50 ₽</td>
                                    <td><?= $form->field($model, 'keks_tortini')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Кит-Кат 4 батончика</td>
                                    <td>45 гр.</td>
                                    <td>50 ₽</td>
                                    <td><?= $form->field($model, 'kitkat_4')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Кит-Кат маленький</td>
                                    <td>20 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'kitkat_mal')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Круасан "Пиф-паф"</td>
                                    <td>300 гр.</td>
                                    <td>100 ₽</td>
                                    <td><?= $form->field($model, 'kruasan_pifpaf')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Круасаны Мини</td>
                                    <td>300 гр.</td>
                                    <td>100 ₽</td>
                                    <td><?= $form->field($model, 'kruasan_mini')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Менди банка</td>
                                    <td>500 гр.</td>
                                    <td>35 ₽</td>
                                    <td><?= $form->field($model, 'mendi_banka')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Менди пластиковая</td>
                                    <td>500 гр.</td>
                                    <td>45 ₽</td>
                                    <td><?= $form->field($model, 'mendi_plast')->checkbox() ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="visit card shadow mb-4 menu-table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Разное</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                <tr>
                                    <th>Блюдо</th>
                                    <th>Порция</th>
                                    <th>Цена</th>
                                    <th>Блокировать</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Милка шоколадная плитка</td>
                                    <td>90 гр.</td>
                                    <td>70 ₽</td>
                                    <td><?= $form->field($model, 'milka_plit_chok')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Милка-Печенье</td>
                                    <td>126 гр.</td>
                                    <td>100 ₽</td>
                                    <td><?= $form->field($model, 'milka_pech')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Милки-Вей</td>
                                    <td>40 гр.</td>
                                    <td>20 ₽</td>
                                    <td><?= $form->field($model, 'milkyway')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Несквик шоколадная плитка</td>
                                    <td>100 гр.</td>
                                    <td>50 ₽</td>
                                    <td><?= $form->field($model, 'neskvik_plit')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Печенье Орео большое</td>
                                    <td>95 гр.</td>
                                    <td>45 ₽</td>
                                    <td><?= $form->field($model, 'pechen_oreo_big')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Печенье Орео маленькое</td>
                                    <td>40 гр.</td>
                                    <td>25 ₽</td>
                                    <td><?= $form->field($model, 'pechen_oreo_small')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Сникерс</td>
                                    <td>40 гр.</td>
                                    <td>30 ₽</td>
                                    <td><?= $form->field($model, 'snikers')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Сок "Кенга"</td>
                                    <td>280 гр.</td>
                                    <td>30 ₽</td>
                                    <td><?= $form->field($model, 'sok_kebga')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Сок "Сады Кубани треуг"</td>
                                    <td>200 гр.</td>
                                    <td>20 ₽</td>
                                    <td><?= $form->field($model, 'sok_sadi_kubtreug')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Сок "Сады Кубани"</td>
                                    <td>200 гр.</td>
                                    <td>20 ₽</td>
                                    <td><?= $form->field($model, 'sok_sadi_kub')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Соломка соленая</td>
                                    <td>100 гр.</td>
                                    <td>30 ₽</td>
                                    <td><?= $form->field($model, 'solomka_sol')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Чоко пай упаковка</td>
                                    <td>300 гр.</td>
                                    <td>100 ₽</td>
                                    <td><?= $form->field($model, 'chocopie_upac')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Чоко пай штучно</td>
                                    <td>40 гр.</td>
                                    <td>20 ₽</td>
                                    <td><?= $form->field($model, 'chocopie_1')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Нестле шоколадная плитка</td>
                                    <td>100 гр.</td>
                                    <td>50 ₽</td>
                                    <td><?= $form->field($model, 'nestle_plit')->checkbox() ?></td>
                                </tr>
                                <tr>
                                    <td>Шоколад Российский</td>
                                    <td>100 гр.</td>
                                    <td>45 ₽</td>
                                    <td><?= $form->field($model, 'choco_rus')->checkbox() ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>


<!--    --><?// debug($student)?>


<!--    <p>-->
<!--        --><?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->
<!---->
<!--    --><?//= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'login',
//            'password_hash',
//            'email:email',
//            'username',
//            'lastname',
//            'middle_name',
//            'school',
//            'school_class',
//            'birthday',
//            'status',
//            'secret_key',
//            'auth_key',
//        ],
//    ]) ?>

</div>
