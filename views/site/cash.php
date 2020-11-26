<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = 'Баланс';

\yii\web\YiiAsset::register($this);
?>
<h2>Баланс</h2>
<div class="students-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <div class="card-body shadow">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Дата/Время</th>
                    <th>Изменение баланса</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Дата/Время</th>
                    <th>Изменение баланса</th>
                </tr>
                </tfoot>
                <tbody>


                <?php foreach ($student->cash as $cash): ?>

                    <tr>
                        <td><? echo $cash->date;?></td>
                        <td><? echo $cash->value;?> ₽</td>
                    </tr>


                <?php endforeach; ?>
                <?php foreach ($student->food as $food): ?>

                    <tr>
                        <td><? echo $food->date;?></td>
                        <td>-<? echo $food->price;?> ₽</td>
                    </tr>


                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
