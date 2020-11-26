<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use djazzy\admin\models\UserForm;
use kartik\datetime\DateTimePicker;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'login')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999-999-999 99',
        'clientOptions' => [
            'removeMaskOnSubmit' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'password2')->passwordInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school')->dropDownList($schools, ['options' =>[ '10' => ['Selected' => true]]]) ?>

    <?= $form->field($model, 'school_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput(['type' => 'date']); ?>

    <?= $form->field($model, 'key_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->dropDownList(UserForm::$role) ?>

    <?= $form->field($model, 'image_upl')->fileInput(['class' => 'choose-photo__input'])->label('Выбрать фотографию', ['class' => ' btn btn-primary choose-photo_label']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>