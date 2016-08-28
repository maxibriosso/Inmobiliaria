<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'css/animate.css',
        'css/font-awesome.css',
        'css/nifty.min.css',
        'lineicons/style.css',
        'css/jquery.steps.css',
        'css/estilo.css',
        'css/responsive-back.css',
    ];
    public $js = [
        'js/bootstrap.js',
        'js/jquery.nicescroll.js',
        'js/jquery.dcjqaccordion.js',
        'js/jquery.steps.min.js',
        'js/wow.min.js',
        'js/bootstrap-select.js',
        'js/admin.js',
        //'js/altaImagenes.js',
        //'js/modificarImagenes.js',
        //'js/modificarRemateImagenes.js',       
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}
