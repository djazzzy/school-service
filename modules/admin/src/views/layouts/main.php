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
            <div class="d-flex mr-auto ml-md-3 my-2 my-md-0 mw-100 overflow-auto">
                <?= Html::a('Ученики', ['index'], ['class' => 'btn btn-primary btn-log mr-1']) ?>


                <?php if(Yii::$app->user->can('admin')): ?>
                    <?= Html::a('Школы', ['schoolindex'], ['class' => 'btn btn-primary btn-log mr-1']) ?>
                    <?= Html::a('Новый пользователь', ['create'], ['class' => 'btn btn-primary btn-log mr-1']) ?>
                    <?= Html::a('Меню', ['menulist'], ['class' => 'btn btn-primary btn-log mr-1']) ?>
                    <?= Html::a('Категории меню', ['menucategory'], ['class' => 'btn btn-primary btn-log mr-1']) ?>
                <?php else: ?>

                <?php endif; ?>

            </div>
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?echo Yii::$app->user->identity->username;?></span>

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
