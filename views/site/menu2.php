<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FoodForb2 */
/* @var $form yii\widgets\ActiveForm */
//debug($model);
$model->title = ["Борщ", "Компот"];
?>

<div class="food-forb2-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->checkboxList(['Борщ' => 'Борщ', 'Компот' => 'Компот', 'Рис' => 'Рис', 'Курица' => 'Курица']) ?>

<!--    --><?//= $form->field($model, 'forbidden')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'forbidden[]')->checkboxList(['1' => 'Item A', '2' => 'Item B', '3' => 'Item C']);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>