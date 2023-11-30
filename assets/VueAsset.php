<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class VueAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'https://cdn.jsdelivr.net/npm/vuetify@3.4.0/dist/vuetify.min.css',
    ];
    public $js = [
        'https://unpkg.com/vue@3/dist/vue.global.js',
        'https://cdn.jsdelivr.net/npm/vuetify@3.4.0/dist/vuetify.min.js'
    ];
    public $forceCopy = true;
    // public $depends = [
    //     'yii\web\YiiAsset',
    //     'yii\bootstrap5\BootstrapAsset'
    // ];
}
