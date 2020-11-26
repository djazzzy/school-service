<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2>Питание</h2>


    <div class="card-body shadow">
        <div class="table-responsive ">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Выберите дату</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>


                <?php foreach ($final as $key => $food):
                    $sum = 0;?>

                    <tr>
                        <td><?= Html::a($key, ['foodview', 'date' => $key], ['class' => 'btn btn-primary']) ?></td>
                        <td><? foreach ($food as $foo){
                                $sum+= $foo->price*$foo->count;
                            }
                            echo $sum;?></td>
                    </tr>


                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
