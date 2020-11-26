<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'TITLE_PASSWORD_CHANGE');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'TITLE_PROFILE'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-form">

    <?php debug($model->image) ?>
<!--    --><?php //debug($upload->image->name) ?>

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?php //if($model->image): ?>
<!--        <img src="/uploads/--><?//= $model->image?><!--" alt="">-->
<!--    --><?php //endif; ?>

<!--    --><?//= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'school')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'school_class')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'secret_key')->textInput(['maxlength' => true]) ?>

<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
<!--    </div>-->

<!--    --><?php //ActiveForm::end(); ?>

<!--    --><?php //$form = ActiveForm::begin(); ?>

    <?php if(Yii::$app->user->identity->image): ?>
        <img class="img-profile rounded-circle" src="/img/profile/<?= Yii::$app->user->identity->image?>" alt="">
    <?php else: ?>
        <img class="img-profile rounded-circle" src="/img/student.jpg">
    <?php endif; ?>

    <?= $form->field($upload, 'image')->fileInput() ?>
    <button>Загрузить</button>

    <?php ActiveForm::end(); ?>

</div>
