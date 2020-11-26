<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        [
            'href' => 'favicon.png',
            'rel' => 'icon',
            'sizes' => '63x63',
        ],
//        'css/site.css',
        //'css/fonts.css',
        'css/sb-admin-2.css',
        'js/arcticmodal/jquery.arcticmodal-0.3.css',
        'js/arcticmodal/themes/simple.css',
    ];
    public $js = [
        'js/sb-admin-2.js',
        'js/bootstrap/js/bootstrap.bundle.min.js',
        'js/jquery-easing/jquery.easing.min.js',
//        'js/chart.js/Chart.min.js',
//        'js/demo/chart-area-demo.js',
//        'js/demo/chart-pie-demo.js',
//        '//yandex.st/jquery/1.9.1/jquery.min.js',
        'js/arcticmodal/jquery.arcticmodal-0.3.min.js',
        '//yandex.st/jquery/cookie/1.0/jquery.cookie.min.js',
        'js/was.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];
}
