<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */
debug($model);
?>

<div class="students-form">

    <? foreach ($students as $model){
     $form = ActiveForm::begin(); ?>

    <!--    --><?//= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>
    <!---->
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <!---->
    <!--    --><?//= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
    <!---->
        <?= $form->field($model, 'school')->textInput(['maxlength' => true]) ?>
    <!---->
        <?= $form->field($model, 'school_class')->textInput(['maxlength' => true]) ?>
    <!---->
    <!--    --><?//= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>
    <!---->
    <!--    --><?//= $form->field($model, 'status')->textInput() ?>

    <!--    --><?//= $form->field($model, 'secret_key')->textInput(['maxlength' => true]) ?>

    <!--    --><?//= $form->field($visits, 'student_id')->textInput(['maxlength' => true]) ?>

    <?php
    //        $student_id = $vis_id;
    //        debug($vis_id);
    ?>

<!--    --><?//= $form->field($visits, 'school')->dropdownList( $schools, ['options' =>[ '10' => ['Selected' => true]]])?>

<!--    --><?//= $form->field($visits, 'event')->dropdownList( $items, ['options' =>[ '2' => ['Selected' => true]]])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end();
    }?>

</div>
