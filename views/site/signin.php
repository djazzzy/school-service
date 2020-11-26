<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
?>

<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row center">
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Заполните поля для входа:</h1>
                            </div>
                            <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'layout' => 'horizontal',
                                'fieldConfig' => [
                                    'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                                    'labelOptions' => ['class' => 'col-lg-12 control-label'],
                                ],
                            ]); ?>

                            <?= $form->field($model, 'login')->widget(\yii\widgets\MaskedInput::className(), [
                                'mask' => '999-999-999 99',
                                'clientOptions' => [
                                    'removeMaskOnSubmit' => true,
                                ]
                            ]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <?= $form->field($model, 'rememberMe')->checkbox([
                                'template' => "<div class=\"col-lg-offset-1 col-lg-12\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            ]) ?>

                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-11">
                                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                </div>
                            </div>

                            <?php ActiveForm::end(); ?>
<!--                            <hr>-->
<!--                            <div class="text-center">-->
<!--                                <a class="small" href="/site/signup">Зарегистрироваться</a>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

