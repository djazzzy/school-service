<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use djazzy\admin\models\UserForm;;

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

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput(['type' => 'date']); ?>

<!--    --><?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_upl')->fileInput(['class' => 'choose-photo__input'])->label('Выбрать фотографию', ['class' => ' btn btn-primary choose-photo_label']) ?>

    <?php if(Yii::$app->user->can('admin')): ?>
        <?= $form->field($model, 'school')->dropDownList($schools, ['options' =>[ '10' => ['Selected' => true]]]) ?>

        <?= $form->field($model, 'contract_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'key_card')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'role')->dropDownList(UserForm::$role) ?>

        <?= $form->field($model, 'get_status_food')->checkbox() ?>

        <?= $form->field($model, 'get_status_visit')->checkbox() ?>

    <?php elseif(Yii::$app->user->can('moder')): ?>

        <?= $form->field($model, 'key_card')->textInput(['maxlength' => true]) ?>

    <?php else: ?>

    <?php endif; ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>