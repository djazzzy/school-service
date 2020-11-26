<?php

namespace djazzy\admin;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
//    use \ipick\admin\traits\ModuleTrait;

    public function bootstrap($app)
    {
        \Yii::setAlias('@admin', __DIR__);

        $app->i18n->translations['modules/admin/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'forceTranslation' => true,
            'basePath' => '@admin/messages',
            'fileMap' => [
                'modules/admin/module' => 'module.php',
            ],
        ];

//        $app->urlManager->registerModuleRules($this->getUrlRules());
    }

    /**
     * Возвращает список правил роутинга.
     *
     * @return array
     */
    public function getUrlRules()
    {
        return [
            [
                'class' => 'yii\web\GroupUrlRule',
                'prefix' => 'admin',
                'routePrefix' => 'admin',
                'rules' => [
                    '' => 'default/index',
                    '<_module:[\w\-]+>/<_controller:[\w\-]+>/<id:\d+>' => '<_module>/<_controller>/view',
                    '<_module:[\w\-]+>/<_controller:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_module>/<_controller>/<_a>',
                    '<_module:[\w\-]+>' => '<_module>/default/index',
                    '<_controller:[\w\-]+>/<_action:[\w\-]+>' => '<_controller>/<_action>',
                    '<_module:[\w\-]+>/<_controller:[\w\-]+>' => '<_module>/<_controller>/index',
                ],
            ],
        ];
    }
}