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
        'css/bootstrap-fileinput/css/fileinput.min.css',
        'lineicons/style.css',
        'css/jquery.steps.css',
        'css/flexslider.css',
        'css/owl.carousel.css',
        'css/estilo.css',
        'css/inmobiliaria.css',
        'css/responsive.css',
    ];
    public $js = [
/*        'js/jquery-2.1.4.min.js',*/
        'js/bootstrap.js',
        'js/jquery.nicescroll.js',
        'js/jquery.dcjqaccordion.js',
        'js/jquery.steps.min.js',
        'js/wow.min.js',
        'js/bootstrap-select.js',
        'js/jquery.flexslider.js',
        'js/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js',
        'js/bootstrap-fileinput/js/fileinput.min.js',
        'js/bootstrap-fileinput/js/fileinput_locale_es.js',
        'js/owl.carousel.min.js',
        'js/jquery.sequence.min.js',
        'js/inmobiliaria.js',
        'js/admin.js',
        'http://maps.google.com/maps/api/js?sensor=false',
        'js/localizacionMapa.js',
        'js/altaImagenes.js',
        
        
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
