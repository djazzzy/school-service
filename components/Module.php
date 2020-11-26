<?php

namespace app\components;

use Yii;
use yii\web\ForbiddenHttpException;

abstract class Module extends \yii\base\Module
{

    public function init()
    {
        parent::init();
    }
}