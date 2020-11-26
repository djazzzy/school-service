<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = 'Update Students: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="students-update">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    --><?php
//    debug($visits);
//    ?>

    <?= $this->render('_formuser', [
        'model' => $model,
        'food' => $food,
//        'visits' => $visits,
        'items' => $items,
        'schools' => $schools,
    ]) ?>

</div>
