<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SignupForm */
/* @var $form ActiveForm */

$this->title = 'Регистрация';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="signup">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-control-sm'],
    ]); ?>

        <?= $form->field($model, 'login')->textInput([
            'template' => '<div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>'
        ]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password2')->passwordInput() ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'lastname') ?>
        <?= $form->field($model, 'middle_name') ?>
        <?= $form->field($model, 'school')->dropdownList( $schools, ['options' =>[ '9' => ['Selected' => true]]])?>
        <?= $form->field($model, 'school_class') ?>
        <?= $form->field($model, 'birthday')?>
        <?= $form->field($model, 'email')->input('email')?>
<!--        --><?php
//        echo '<label>Start Date/Time</label>';
//        echo DateTimePicker::widget([
//            'name' => 'datetime_10',
//            'options' => ['placeholder' => 'Select operating time ...'],
//            'convertFormat' => true,
//            'pluginOptions' => [
//                'format' => 'd-M-Y',
//                'startDate' => '01-Mar-2014 12:00 AM',
//                'todayHighlight' => true
//            ]
//        ]); ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ])->hint('Нажмите чтобы обновить картинку') ?>
        <?= $form->field($model, 'accept')->checkbox(['checked' => false])->label('Я согласен с &nbsp<a class="" target="_blank" href="https://drive.google.com/file/d/1Uu3Bh7YNIKbh0rVJZCte-LKIdU9_9Xfs/view?usp=sharing">Договором по оказанию услуг питания учащихся<a/> и <a class="" target="_blank" href="https://drive.google.com/file/d/1qly9cOKv0ftE1K0rppH89Fi8acabho-U/view?usp=sharing"> Политикой конфиденциальности<a/> &nbsp');  ?>

        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

    <?php
    if($model->scenario === 'emailActivation'):
        ?>
        <i>*На указанный емайл будет отправлено письмо для активации аккаунта.</i>
    <?php
    endif;
    ?>

</div><!-- signup -->
