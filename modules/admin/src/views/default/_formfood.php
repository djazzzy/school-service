<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'school')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'school_class')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'status')->textInput() ?>

<!--    --><?//= $form->field($model, 'secret_key')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($food, 'student_id')->textInput(['maxlength' => true]) ?>

    <?php
//        $student_id = $vis_id;
        //debug($food);
    ?>

    <?= $form->field($food, 'food_id')->dropdownList( $items, ['options' =>[ '9' => ['Selected' => true]]])?>

    <?= $form->field($food, 'category')->dropdownList( $category, ['options' =>[ '9' => ['Selected' => true]]])?>

    <?= $form->field($food, 'count')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
