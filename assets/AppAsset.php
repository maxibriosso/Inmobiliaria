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
        'css/fileinput.css',
        'lineicons/style.css',
        'css/estilo.css',
        'css/inmobiliaria.css',
        'css/responsive.css',
        'css/jquery.steps.css',
        
    ];
    public $js = [
        'js/jquery-2.1.4.min.js',
        'js/bootstrap.js',
        'js/jquery.nicescroll.js',
        'js/jquery.dcjqaccordion.js',
        'js/jquery.steps.min.js',
        'js/wizard.js',
        'js/wow.min.js',
        'js/bootstrap-select.js',
        'js/file/fileinput.js',
        'js/inmobiliaria.js',
        'js/admin.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
