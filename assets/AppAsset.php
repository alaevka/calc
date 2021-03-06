<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css",
        "css/font-icons/entypo/css/entypo.css",
        "https://fonts.googleapis.com/css?family=Exo+2&subset=latin,cyrillic",
        "css/colorpicker.css",
        "css/bootstrap.css",
        "css/neon-core.css",
        "css/neon-theme.css",
        "css/neon-forms.css",
        "css/custom.css",
        "css/skins/white.css"
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $js = [
        "js/gsap/main-gsap.js",
        //"js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js",
        //"js/bootstrap.js",
        "js/colorpicker.js",
        "js/joinable.js",
        "js/resizeable.js",
        "js/neon-api.js",
        "js/jquery.validate.min.js",
        "/js/toastr.js",
        "js/neon-login.js",
        "js/neon-custom.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
