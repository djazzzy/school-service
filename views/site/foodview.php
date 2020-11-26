<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = $model->id;

\yii\web\YiiAsset::register($this);
?>
<a class="btn btn-primary btn-log" href="/site/food">Назад</a>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <h2></h2>
    <?php if ($foodgroup): ?>
        <div class="card-body shadow mb-4">
            <h2>Обед</h2>
            <div class="table-custom">
                <div class="column-custom">
                    <div class="raw-custom raw-title">Дата</div>
                    <div class="raw-custom raw-value"><? echo $date;?></div>
                </div>
                <div class="column-custom">
                    <div class="raw-custom raw-title">Блюдо</div>
                    <?php foreach ($foodgroup as $food): ?>

                        <div class="raw-custom raw-value"><? echo $food->menu->name;?></div>
                        <? $sum+= $food->price*$food->count;?>
                    <?php endforeach;?>
                </div>
                <div class="column-custom">
                    <div class="raw-custom raw-title">Цена</div>
                    <?php foreach ($foodgroup as $food): ?>

                        <div class="raw-custom raw-value"><? echo $food->price;?></div>
                    <?php endforeach;?>
                </div>
                <div class="column-custom">
                    <div class="raw-custom raw-title">Количество</div>
                    <?php foreach ($foodgroup as $food): ?>

                        <div class="raw-custom raw-value"><? echo $food->count;?></div>
                    <?php endforeach;?>
                </div>
                <div class="column-custom">
                    <div class="raw-custom raw-title">Стоимость</div>
                    <div class="raw-custom raw-value"><?php echo $sum;?> руб</div>
                </div>
            </div>
        </div>
    <?php else: ?>
    <?php endif; ?>

<!--    --><?php //if ($foodgroup2): ?>
<!--        <div class="card-body shadow mb-4">-->
<!--            <h2>Поздний завтрак</h2>-->
<!--            <div class="table-custom">-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Дата</div>-->
<!--                    <div class="raw-custom raw-value">--><?// echo $date;?><!--</div>-->
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Блюдо</div>-->
<!--                    --><?php //foreach ($foodgroup2 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->menu->title;?><!--</div>-->
<!--                        --><?// $sum2+= $food->price*$food->count;?>
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Цена</div>-->
<!--                    --><?php //foreach ($foodgroup2 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->price;?><!--</div>-->
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Количество</div>-->
<!--                    --><?php //foreach ($foodgroup2 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->count;?><!--</div>-->
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Стоимость</div>-->
<!--                    <div class="raw-custom raw-value">--><?php //echo $sum2;?><!-- руб</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    --><?php //else: ?>
<!--    --><?php //endif; ?>
<!---->
<!--    --><?php //if ($foodgroup3): ?>
<!--        <div class="card-body shadow mb-4">-->
<!--            <h2>Обед</h2>-->
<!--            <div class="table-custom">-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Дата</div>-->
<!--                    <div class="raw-custom raw-value">--><?// echo $date;?><!--</div>-->
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Блюдо</div>-->
<!--                    --><?php //foreach ($foodgroup3 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->menu->title;?><!--</div>-->
<!--                        --><?// $sum3+= $food->price*$food->count;?>
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Цена</div>-->
<!--                    --><?php //foreach ($foodgroup3 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->price;?><!--</div>-->
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Количество</div>-->
<!--                    --><?php //foreach ($foodgroup3 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->count;?><!--</div>-->
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Стоимость</div>-->
<!--                    <div class="raw-custom raw-value">--><?php //echo $sum3;?><!-- руб</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    --><?php //else: ?>
<!--    --><?php //endif; ?>
<!---->
<!--    --><?php //if ($foodgroup4): ?>
<!--        <div class="card-body shadow mb-4">-->
<!--            <h2>Второй обед</h2>-->
<!--            <div class="table-custom">-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Дата</div>-->
<!--                    <div class="raw-custom raw-value">--><?// echo $date;?><!--</div>-->
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Блюдо</div>-->
<!--                    --><?php //foreach ($foodgroup4 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->menu->title;?><!--</div>-->
<!--                        --><?// $sum4+= $food->price*$food->count;?>
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Цена</div>-->
<!--                    --><?php //foreach ($foodgroup4 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->price;?><!--</div>-->
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Количество</div>-->
<!--                    --><?php //foreach ($foodgroup4 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->count;?><!--</div>-->
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Стоимость</div>-->
<!--                    <div class="raw-custom raw-value">--><?php //echo $sum4;?><!-- руб</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    --><?php //else: ?>
<!--    --><?php //endif; ?>
<!---->
<!--    --><?php //if ($foodgroup5): ?>
<!--        <div class="card-body shadow mb-4">-->
<!--            <h2>Ужин</h2>-->
<!--            <div class="table-custom">-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Дата</div>-->
<!--                    <div class="raw-custom raw-value">--><?// echo $date;?><!--</div>-->
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Блюдо</div>-->
<!--                    --><?php //foreach ($foodgroup5 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->menu->title;?><!--</div>-->
<!--                        --><?// $sum5+= $food->price*$food->count;?>
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Цена</div>-->
<!--                    --><?php //foreach ($foodgroup5 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->price;?><!--</div>-->
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Количество</div>-->
<!--                    --><?php //foreach ($foodgroup5 as $food): ?>
<!---->
<!--                        <div class="raw-custom raw-value">--><?// echo $food->count;?><!--</div>-->
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--                <div class="column-custom">-->
<!--                    <div class="raw-custom raw-title">Стоимость</div>-->
<!--                    <div class="raw-custom raw-value">--><?php //echo $sum5;?><!-- руб</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    --><?php //else: ?>
<!--    --><?php //endif; ?>

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
