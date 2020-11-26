<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории Меню';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать категорию', ['createmenucat'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{updatemenucat} {deletemenucat}',
                'buttons' => [
                    'updatemenucat' => function ($url) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-cutlery"> Редактировать</span><br>',
                            $url,
                            [
                                'title' => 'Редактировать',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                    'deletemenucat' => function ($url) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-cutlery"> Удалить</span><br>',
                            $url,
                            [
                                'title' => 'Удалить',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>


</div>