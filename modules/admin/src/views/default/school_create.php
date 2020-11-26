<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Scholls */

$this->title = 'Создать Школу';
$this->params['breadcrumbs'][] = ['label' => 'Scholls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Создать Школу">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formscholl', [
        'model' => $model,
    ]) ?>

</div>
