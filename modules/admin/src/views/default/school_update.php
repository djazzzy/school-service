<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Scholls */

$this->title = 'Редактировать школу: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Scholls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scholls-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formscholl', [
        'model' => $model,
    ]) ?>

</div>
