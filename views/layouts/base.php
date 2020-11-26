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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-ekOryaXPbeCpWQNxMwSWVvQ0+1VrStoPJq54shlYhR8HzQgig1v5fas6YgOqLoKz" crossorigin="anonymous">
</head>
<body>
<?php $this->beginBody() ?>

<?php $logstatus = Yii::$app->user->isGuest;

?>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Школьные сервисы</div>
        </a>

<!--        --><?php //if($logstatus): ?>

        <?php if(Yii::$app->user->can('adminka')): ?>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-user-shield"></i>
                    <span>Admin</span></a>
            </li>
            <?php else: ?>

            <?php endif; ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Учебный процесс
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/site/visits"">
<!--                <i class="fas fa-fw fa-cog"></i>-->
                <i class="fad fa-door-open"></i>
                <span>Проходная</span>
            </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/site/food">
<!--                <i class="fas fa-fw fa-wrench"></i>-->
                <i class="far fa-utensils-alt"></i>
                <span>Питание</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/site/menu">
<!--                <i class="fad fa-utensils-alt"></i>-->
                <i class="far fa-utensils"></i>
<!--                <i class="fas fa-fw fa-wrench"></i>-->
                <span>Меню</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <?php if($logstatus): ?>

                    <?php else: ?>

                        <?php if($this->params['cash']): ?>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="cash-nav" href="/site/cash">
                                Баланс:
                                <?
                                $sum1 = 0;
                                foreach ($this->params['cash'] as $cash) {
                                    $sum1+= $cash['value'];
                                }
                                foreach ($this->params['student'] as $stud) {
                                    $sum2+= -$stud->price;
                                }
                                echo $sum1 + $sum2;
                                ?>
                                ₽
                            </a>
                        <li/>
                        <?php else: ?>
                        <?php endif; ?>

                        <!-- Nav Item - Alerts -->
<!--                        <li class="nav-item dropdown no-arrow mx-1">-->
<!--                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                <i class="fas fa-bell fa-fw"></i>-->
                                <!-- Counter - Alerts -->
<!--                                <span class="badge badge-danger badge-counter">3+</span>-->
<!--                            </a>-->
                            <!-- Dropdown - Alerts -->
<!--                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">-->
<!--                                <h6 class="dropdown-header">-->
<!--                                    Центр оповещений-->
<!--                                </h6>-->
<!--                                <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                                    <div class="mr-3">-->
<!--                                        <div class="icon-circle bg-primary">-->
<!--                                            <i class="fas fa-file-alt text-white"></i>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="small text-gray-500">15 Сентябрь, 2020</div>-->
<!--                                        <span class="font-weight-bold">Новые правила одежды для учащихся.</span>-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                                    <div class="mr-3">-->
<!--                                        <div class="icon-circle bg-success">-->
<!--                                            <i class="fas fa-donate text-white"></i>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="small text-gray-500">11 Сентябрь, 2020</div>-->
<!--                                        На вашем счету меньше 500 рублей. Пора пополнить счет.-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                                    <div class="mr-3">-->
<!--                                        <div class="icon-circle bg-warning">-->
<!--                                            <i class="fas fa-exclamation-triangle text-white"></i>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="small text-gray-500">7 Сентябрь, 2020</div>-->
<!--                                        Новые возможности портала.-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                                <a class="dropdown-item text-center small text-gray-500" href="#">Показать все оповещения</a>-->
<!--                            </div>-->
                        </li>

                    <?php endif; ?>



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <?php if($logstatus): ?>
                    <li class="btn-log-wrap">
                        <a class="btn btn-primary btn-log" href="/site/signin">Войти<a/>
                    </li>
                    <?php else: ?>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?echo Yii::$app->user->identity->username;?></span>
                                <?php if(Yii::$app->user->identity->image and file_exists('img/profile/' . Yii::$app->user->identity->image)): ?>
                                    <img class="img-profile rounded-circle profile-img__center" src="/img/profile/<?echo Yii::$app->user->identity->image;?>">
                                <?php else: ?>
                                    <img class="img-profile rounded-circle profile-img__center" src="/img/student.jpg">
                                <?php endif; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profile/">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Профиль
                                </a>
<!--                                <a class="dropdown-item" href="#">-->
<!--                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                                    Настройки-->
<!--                                </a>-->
<!--                                <a class="dropdown-item" href="#">-->
<!--                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                                    Активность-->
<!--                                </a>-->
<!--                                <div class="dropdown-divider"></div>-->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Выход
                                </a>
                            </div>
                        </li>
                    <?php endif; ?>


                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>&copy; Внедренческий центр Джигит <?= date('Y') ?></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<!--<div class="wrap">-->
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => [
//            ['label' => 'Домашняя страница', 'url' => ['/site/index']],
//            ['label' => 'Регистрация', 'url' => ['/site/signup'], 'visible' => $logstatus ],
//            $logstatus ? (
//                ['label' => 'Авторизация', 'url' => ['/site/signin']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Выйти (' . Yii::$app->user->identity->username . ') (' . $user_active .')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
//
//        ],
//    ]);
//    NavBar::end();
//    ?>
<!---->
<!--</div>-->



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Покинуть сайт?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Вы уверены что хотите покинуть сайт?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
                <?= Html::a("Выход", ['/site/logout'], [
                    'data' => ['method' => 'post'],
                    'class' => 'btn btn-primary',
                ]);?>
<!--                <a class="btn btn-primary" href="/site/logout">Logout</a>-->
            </div>
        </div>
    </div>
</div>

<div style="display: none;">
    <div class="box-modal" id="boxUserFirstInfo">
        <!--        <div class="box-modal_close arcticmodal-close">закрыть</div>-->
        <b">Добро пожаловать на портал.</b><br>
        <br>
        <div class="mb-3 ">
            Продолжая пользоваться порталом вы соглашаетесь с:
        </div>
        
        <input type="checkbox" class="my-checkbox" id="myCheckbox"><a class="" target="_blank" href="https://drive.google.com/file/d/1Uu3Bh7YNIKbh0rVJZCte-LKIdU9_9Xfs/view?usp=sharing"> Договором по оказанию услуг питания учащихся<a/> <br>

        <input type="checkbox" class="my-checkbox2" id="myCheckbox2"><a class="" target="_blank" href="https://drive.google.com/file/d/1qly9cOKv0ftE1K0rppH89Fi8acabho-U/view?usp=sharing"> Политикой конфиденциальности<a/>

        <div class="d-flex w-100 justify-content-center">
            <button disabled class="btn btn-log my-close" >Принять</<button>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
