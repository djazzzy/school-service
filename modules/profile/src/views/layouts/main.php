<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php $logstatus = Yii::$app->user->isGuest;


?>

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Topbar Search -->
            <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <?= Html::a('Ученики', ['index'], ['class' => 'btn btn-primary btn-log']) ?>
                <?= Html::a('Школы', ['schoolindex'], ['class' => 'btn btn-primary btn-log']) ?>

                <?php if(Yii::$app->user->can('admin')): ?>
                    <?= Html::a('Платежи', ['pays'], ['class' => 'btn btn-primary btn-log']) ?>
                <?php else: ?>

                <?php endif; ?>


<!--                <a href="/admin/default/index" class="btn btn-primary btn-log">Ученики</a>-->
<!--                <a href="/admin/default/schoolindex" class="btn btn-primary btn-log">Школы</a>-->
<!--                <a href="/admin/default/pays" class="btn btn-primary btn-log">Платежи</a>-->

            </div>
            <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            </div>

            <a class="btn btn-primary btn-log" href="/">Вернуться на сайт</a>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?= $content ?>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



</div>

<footer class="footer">
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
