<?php

namespace app\components;

use Yii;
use yii\web\Controller;

/**
 * BackendController is base class for backend controllers
 * @package app\backend\components
 */
class BackendController extends Controller
{
//    public $layout = "@admin/views/layouts/main";
//
//    public function init()
//    {
//        parent::init();
//
//        \Yii::$container->set('yii\grid\SerialColumn', [
//            'contentOptions' => ['style' => 'text-align: center;width: 50px'],
//        ]);
//
//        \Yii::$container->set('yii\grid\ActionColumn', [
//            'contentOptions' => ['class' => 'update-delete'],
//        ]);
//
//        \Yii::$container->set('ipick\admin\widgets\CKEditor', [
//            'options' => ['rows' => 6],
//            // 'cdnBaseUrl' => 'https://cdn.ckeditor.com/4.9.2/full-all/',
//            'preset' => 'custom',
//            'clientOptions' => [
//                'customConfig' => '/ckeditor/config.js',
//                'toolbar' => [
//                    [
//                        'name' => 'row1',
//                        'items' => [
//                            'Source', '-', 'savebtn', /*'Save',*/ 'Preview', 'Print', '-',
//                            'Cut', 'Copy', 'Paste', 'PasteText', '-',
//                            'Find','-',
//                            'Bold', 'Italic', 'Link', /*'Underline', 'Strike', */'-',
//                            'Subscript', 'Superscript', '-',
//                            'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'list', 'indent', 'blocks', 'align', 'bidi', '-',
//                            'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-',
//                            'Image', 'Table', '-',
//                            'Format', 'FontSize', 'Maximize',
//                            /*'LineHeight',*/
//                        ],
//                    ],
//                    '/',
//                    [
//                        'name' => 'row2',
//                        'items' => [
//                            'Youtube', '-', /*'btgrid', */'AddLayout', 'Imap', /*'BootstrapTabs', '-', 'Slideshow',*/
//                        ],
//                    ]
//                ],
//                // 'contentsCss' => '/css/static.css',
//            ],
//        ]);
//
//        $this->configurateKCfinder();
//    }
//
//    public function beforeAction($action)
//    {
//        if (!parent::beforeAction($action)) {
//            return false;
//        }
//
//        \ipick\main\models\common\History::addSale(getallheaders());
//
//        return true;
//    }
//
//    public function configurateKCfinder($value='')
//    {
//        $kcfOptions = array_merge(\iutbay\yii2kcfinder\KCFinder::$kcfDefaultOptions, [
//            'uploadURL' => Yii::getAlias('@web').'/web/uploads/static',
//            'encoding' => 'UTF-8',
//            'access' => [
//                'files' => [
//                    'upload' => true,
//                    'delete' => true,
//                    'copy' => true,
//                    'move' => true,
//                    'rename' => true,
//                ],
//                'dirs' => [
//                    'create' => true,
//                    'delete' => true,
//                    'rename' => true,
//                ],
//            ],
//        ]);
//        \Yii::$app->session->set('KCFINDER', $kcfOptions);
//    }
}