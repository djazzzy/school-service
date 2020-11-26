<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\User;
use djazzy\admin\models\UserForm;
use app\models\Schools;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ученики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?//php if(Yii::$app->user->can('admin')): ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            if($model->isChecked()){
                $class = 'active-raw';
            }

            return ['class' => $class];
        },
        'tableOptions' => [
            'class' => 'table table-striped',
        ],
        'options' => [
            'class' => 'table-responsive',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'login',
                'visible' => \Yii::$app->user->can('admin') ? true : false,
                'filterInputOptions' => ['class' => 'form-control form-control-sm']
            ],
//            'password_hash',
            [
                'attribute' => 'username',
                'filterInputOptions' => ['class' => 'form-control form-control-sm']
            ],
            'email:email',
            'key_card',
            'contract_id',
//            'lastname',
//            'middle_name',
            [
                'attribute' => 'school',
                'visible' => \Yii::$app->user->can('admin') ? true : false,
                'filter' => Schools::getSchools(),
                'filterInputOptions' => ['class' => 'form-control form-control-sm']
            ],
            'school_class',
            'birthday',
            [
                'visible' => \Yii::$app->user->can('admin') ? true : false,
                'class' => 'yii\grid\CheckboxColumn',
                'header' => 'Выгружен в буфет',
                'checkboxOptions' => function ($dataProvider, $key, $index, $column) {
                    return [ 'checked' => $dataProvider->get_status_food == 1,  'disabled' => true];
                }
            ],
            [
                'visible' => \Yii::$app->user->can('admin') ? true : false,
                'class' => 'yii\grid\CheckboxColumn',
                'header' => 'Выгружен в проходную',
                'checkboxOptions' => function ($dataProvider, $key, $index, $column) {
                    return [ 'checked' => $dataProvider->get_status_visit == 1,  'disabled' => true];
                }
            ],
            [
                'attribute' => 'role',
                'filter' => UserForm::$role,
                'filterInputOptions' => ['class' => 'form-control form-control-sm']
            ],
            [
                'label' => 'Фото',
                'format' => 'raw',
                'value' => function($dataProvider){
                    return Html::img(Url::to(['/img/profile']).'/'.($dataProvider->image),[
                        'alt'=>'Нет фото',
                        'style' => 'width:50px;'
                    ]);
                },
            ],
//            [
//                'class'     => \dosamigos\grid\columns\ToggleColumn::className(),
//                'header' => 'Проверен',
//                'url'       => ['toggle'],
//                'attribute' => 'checked',
////                'onValue' => User::CHECKED_ACTIVE,
////                'onLabel' => 'active',
////                'offLabel' => 'active',
////                'contentOptions' => ['style' => 'text-align: center;width: 50px'],
//                'onLabel' => 'Active',
//                'offLabel' => 'Not active',
//                'contentOptions' => ['class' => 'text-center'],
//                'afterToggle' => 'function(r, data){if(r){console.log("done", data)};}',
//                'filter' => [
//                    0 => 'Active',
//                    1 => 'Not active'
//                ]
//            ],
            [
                'class'     => \app\components\toggle\ToggleColumn::className(),
                'header' => 'Проверен',
                'url'       => ['toggle'],
                'attribute' => 'checked',
                'onValue' => User::CHECKED_ACTIVE,
                'trClassNot' => 'active-tr-rlt',
                'trClass' => 'active-raw',
//                'filter'    => Sale::getRltArray(),
                'contentOptions' => ['style' => 'text-align: center;width: 50px'],
            ],
            //'secret_key',
            //'auth_key',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{edit} {pays} {food} {visits}',
                'buttons' => [
                    'edit' => function ($url) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-cutlery"> Редактировать</span><br>',
                            $url,
                            [
                                'title' => 'Редактировать',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                    'pays' => function ($url) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-cutlery"> Платежи</span><br>',
                            $url,
                            [
                                'title' => 'Платежи',
                                'data-pjax' => '0',
                            ]
                        );
                    },
//                    'food' => function ($url) {
//                        return Html::a(
//                            '<span class="glyphicon glyphicon-cutlery"> Питание</span><br>',
//                            $url,
//                            [
//                                'title' => 'Download',
//                                'data-pjax' => '0',
//                            ]
//                        );
//                    },
//                    'visits' => function ($url) {
//                        return Html::a(
//                            '<span class="glyphicon glyphicon-sort"> Посещения</span>',
//                            $url,
//                            [
//                                'title' => 'Посещения',
//                                'data-pjax' => '0',
//                            ]
//                        );
//                    },
                ],
            ],
        ],
    ]); ?>
    <?/*php elseif(Yii::$app->user->can('moder')): ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => [
                'class' => 'table table-striped',
            ],
            'options' => [
                'class' => 'table-responsive',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id',
                'login',
//            'password_hash',
                'email:email',
                'username',
//                'lastname',
//            'middle_name',
//                'school',
                'school_class',
                //'birthday',
                //'status',
                //'secret_key',
                //'auth_key',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{edit} {food} {visits}',
                    'buttons' => [
                        'edit' => function ($url) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-cutlery"> Редактировать</span><br>',
                                $url,
                                [
                                    'title' => 'Редактировать',
                                    'data-pjax' => '0',
                                ]
                            );
                        },
//                        'food' => function ($url) {
//                            return Html::a(
//                                '<span class="glyphicon glyphicon-cutlery"> Питание</span><br>',
//                                $url,
//                                [
//                                    'title' => 'Download',
//                                    'data-pjax' => '0',
//                                ]
//                            );
//                        },
//                        'visits' => function ($url) {
//                            return Html::a(
//                                '<span class="glyphicon glyphicon-sort"> Посещения</span>',
//                                $url,
//                                [
//                                    'title' => 'Посещения',
//                                    'data-pjax' => '0',
//                                ]
//                            );
//                        },
                    ],
                ],
            ],
        ]); ?>
    <?php elseif(Yii::$app->user->can('teacher')): ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => [
                'class' => 'table table-striped',
            ],
            'options' => [
                'class' => 'table-responsive',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

            'id',
            'login',
//            'password_hash',
            'email:email',
            'username',
//            'lastname',
//            'middle_name',
            'school',
            'school_class',
//                'birthday',
//                'status',
                //'secret_key',
                //'auth_key',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{edit}',
                    'buttons' => [
                        'edit' => function ($url) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-cutlery"> Редактировать</span><br>',
                                $url,
                                [
                                    'title' => 'Редактировать',
                                    'data-pjax' => '0',
                                ]
                            );
                        },
                    ],
                ],
            ],
        ]); ?>
    <?php endif;*/ ?>

</div>
