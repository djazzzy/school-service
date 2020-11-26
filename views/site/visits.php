<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Проходная</h2>

    <div class="card-body shadow">
        <div class="table-responsive ">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Школа</th>
                    <th>Время</th>
                    <th>Событие</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Школа</th>
                    <th>Время</th>
                    <th>Событие</th>
                </tr>
                </tfoot>
                <tbody>

                <?php foreach ($student->visits as $vis): ?>

                    <tr>
                        <td><? echo $vis->school;?></td>
                        <td><? echo $vis->date;?></td>
                        <td><? echo $vis->event;?></td>
                    </tr>


                <?php endforeach; ?>
                </tbody>
            </table>
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
