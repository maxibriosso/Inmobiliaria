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
        'css/kartik-v-bootstrap-fileinput/css/fileinput.min.css',
        'lineicons/style.css',
        'css/jquery.steps.css',
        'css/estilo.css',
        'css/responsive.css',
    ];
    public $js = [
        //'js/jquery.js',
        'js/jquery.nicescroll.js',
        'js/jquery.dcjqaccordion.js',
        'js/jquery.steps.min.js',
        'js/wow.min.js',
        'js/bootstrap-select.js',
        /*'js/kartik-v-bootstrap-fileinput/js/plugins/canvas-to-blob.min.js',
        'js/kartik-v-bootstrap-fileinput/js/plugins/sortable.min.js',
        'js/kartik-v-bootstrap-fileinput/js/plugins/purify.min.js',
        'js/kartik-v-bootstrap-fileinput/js/fileinput.min.js',
        'js/bootstrap.js',
        'js/kartik-v-bootstrap-fileinput/themes/fa/theme.js',
        'js/kartik-v-bootstrap-fileinput/js/locales/es.js',
        //boostrap.js
        //'js/kartik-v-bootstrap-fileinput/js/fileinput_locale_es.js',*/
        'js/admin.js',
        'js/altaImagenes.js',
        'js/modificarImagenes.js',
        'js/modificarRemateImagenes.js',       
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}
