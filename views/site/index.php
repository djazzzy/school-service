<?php

/* @var $this yii\web\View */

$this->title = 'Школьные сервисы';
$logstatus = Yii::$app->user->isGuest;
?>
<div class="site-index">

    <?php if($logstatus): ?>
        <p class="jumbotron"><a class="" href="/site/signin">Авторизируйтесь<a/> чтоб получить доступ к порталу</p>
    <?php else: ?>

    <div class="body-content">

        <div class="profile card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Данные ученика</h6>
            </div>
            <div class="card-body profile-body">
                <div class="card-body__name">
                    <p class="card-body__name-item"><?php echo Yii::$app->user->identity->username; ?></p>
                </div>
                <div class="card-body__school">

                    <?php if(Yii::$app->user->identity->school): ?>
<!--                        --><?// debug() ?>
<!--                        --><?// debug($student->school->title) ?>
                        <p class="card-body__school-item">Школа: <? echo $school->title ?></p>
                    <?php else: ?>

                    <?php endif; ?>

                    <?php if(Yii::$app->user->identity->school_class): ?>
                        <p class="card-body__school-item">Класс: <? echo Yii::$app->user->identity->school_class ?></p>
                    <?php else: ?>

                    <?php endif; ?>

<!--                    <p class="card-body__school-item">Класс:-->
<!--                        --><?php //if(Yii::$app->user->identity->school_class){
//                            echo Yii::$app->user->identity->school_class;
//                        }else{
////                            echo '<a href="/profile/" class="card-body__school-item text-warning">Заполните информацию в профиле<a>';
//                        }; ?>
<!---->
<!--                    </p>-->
                </div>
            </div>
        </div>
        <div class="top-card">
            <div class="food card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Последний прием пищи</h6>
                </div>
                <div class="card-body">
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
                            <div class="raw-custom raw-title">Стоимость</div>
                            <div class="raw-custom raw-value"><?php echo $sum;?> руб</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="visit card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Последнее посещение</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                        <tr>
                            <th>Время</th>
                            <th>Школа</th>
                            <th>Событие</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><? echo $visit->date;?></td>
                            <td><? echo $visit->school;?></td>
                            <td><? echo $visit->event;?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    <?php



    ?>
    </div>
    <?php endif; ?>
</div>
