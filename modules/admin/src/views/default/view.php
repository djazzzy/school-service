<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добваить еще посещение', ['visits', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Добваить еще еду', ['food', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'login',
//            'password_hash',
            'email:email',
            'username',
            'school',
            'school_class',
            'birthday',
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
//            'status',
//            'secret_key',
//            'auth_key',
        ],
    ]) ?>

</div>
