<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php if( Yii::$app->session->hasFlash('my-success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('my-success'); ?>
    </div>
<?php endif;?>

<div class="user-form">

<!--    --><?php //debug($model) ?>
<!--    --><?php //debug($upload->image->name) ?>
    <div class="profile card shadow mb-4">
        <div class="card-body profile-body d-flex">
            <div class="profile-photo__wrap">
                <?php $form = ActiveForm::begin([
                    'fieldConfig' => ['options' => ['class' => 'form_custom']],
                ]); ?>
                <div class="profile-photo">
                    <?php if($model->image): ?>
                        <div class="img-profile-form">
                            <img class="img-profile__form-img" src="/img/profile/<?= $model->image?>" alt="">
                        </div>
                    <?php else: ?>
                        <div class="img-profile-form">
                            <img class="img-profile__form-img" src="/img/student.jpg">
                        </div>
                    <?php endif; ?>
                    <div class="profile_block">
                        <?= $form->field($model, 'image_upl')->fileInput(['class' => 'choose-photo__input'])->label('Выбрать фотографию', ['class' => ' btn btn-primary choose-photo_label']) ?>
                        <!--                    <button class="btn btn-success">Сохранить</button>-->
                    </div>
                </div>
                <!--            --><?php //ActiveForm::end(); ?>
            </div>

            <div class="profile-info ml-auto mr-5">
                <div class="profile-info__raw mb-2 mt-5">СНИЛС:
                    <?=
                    snilsFormat($model->login);
                    ?>

                </div>
                <div class="profile-info__raw">Договор №:
                    <?= $model->contract_id?>
                </div>
            </div>
        </div>

        
    </div>

    <div class="profile card shadow mb-4">
        <div class="card-body justify-content-between">

<!--            --><?php //$form = ActiveForm::begin([
//                'options' => ['class' => 'd-flex flex-wrap justify-content-between'],
//                'fieldConfig' => ['options' => ['class' => 'form_custom']],
//            ]); ?>

            <div class="d-flex flex-wrap justify-content-between form-wrap">

            <!--    --><?//= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

<!--                --><?//= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

<!--                --><?//= $form->field($model, 'middle_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'school')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'school_class')->textInput(['maxlength' => true]) ?>

            <!--    --><?//= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>

            <!--    --><?//= $form->field($model, 'secret_key')->textInput(['maxlength' => true]) ?>
            </div>

<!--            <div class="form-group">-->
<!--                --><?//= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-success']) ?>
<!--            </div>-->

            <button class="btn btn-success">Сохранить</button>

            <?php ActiveForm::end(); ?>
        </div>
    </div>



</div>
