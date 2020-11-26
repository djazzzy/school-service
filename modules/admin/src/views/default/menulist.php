<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать блюдо', ['menucreate'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'weight',
            'price',
            'category',
            'active',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{menuupdate}',
                'buttons' => [
                    'menuupdate' => function ($url) {
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


</div>
