<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\modules\service\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ServiceAppAsset extends AssetBundle
{
    public $forceCopy = true; // Only use this in dev mode
    
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = "@app/modules/service";
    //public $forceCopy = true;
    // public $css = [
    //     'css/site.css',
    // ];
    public $js = [
        'vuejs/App.js'
    ];
    // ใส่ module จะทำให้ไม่ load js 2 รอบ
    public $jsOptions = [
        'type'=>'module'
    ];

    public $publishOptions = [
        'only' => [
            'vuejs/*'
        ]
    ];
    // public $depends = [
    //     'yii\web\YiiAsset',
    //     'yii\bootstrap5\BootstrapAsset'
    // ];
    
}
