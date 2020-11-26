<?php

/* @var $this yii\web\View */

$this->title = 'Школьныe сервисы';
$logstatus = Yii::$app->user->isGuest;
?>
<div class="start-page">

    <div class="preamble">
        <div class="preamble__content">
            <h1 class="preamble__header">Школьные сервисы</h1>
            <div class="preamble__button">
                <a class="btn btn-primary btn-log" href="/site/signin">Войти<a/>
                <a class="btn btn-primary btn-log" href="/site/about">О нас<a/>
            </div>
<!--            <div class="preamble__button">-->
<!--                <a class="btn btn-primary btn-log" href="/site/signup">Зарегистрироваться<a/>-->
<!--            </div>-->
        </div>
    </div>
</div>
