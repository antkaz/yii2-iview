<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview\assets;


use yii\web\AssetBundle;

/**
 * Class IViewAsset
 *
 * Registers IView
 *
 * @see https://www.iviewui.com/
 *
 * @author Anton Kazarionv <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class IViewAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/iview/dist';

    /**
     * @inheritdoc
     */
    public $css = [
        'styles/iview.css',
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        YII_ENV_DEV ? 'iview.js' : 'iview.min.js',

    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'antkaz\iview\assets\VueAsset',
    ];
}