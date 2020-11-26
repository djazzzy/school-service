<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Школы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scholls-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить Школу', ['schoolcreate'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            'address',
            'inn',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{schoolupdate} {schooldelete}',
                'buttons' => [
                    'schoolupdate' => function ($url) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-cutlery">Редактировать</span><br>',
                            $url,
                            [
                                'title' => 'Download',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                    'schooldelete' => function ($url) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-sort">Удалить</span>',
                            $url,
                            [
                                'title' => 'Посещения',
                                'data-pjax' => '0',
                            ]
                        );
                    },
                ],
            ],
        ],
    ]); ?>


</div>
