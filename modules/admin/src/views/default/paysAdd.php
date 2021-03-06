<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cash */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cash-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'snils')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '999-999-999 99',
        'clientOptions' => [
            'removeMaskOnSubmit' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'value')->textInput() ?>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>