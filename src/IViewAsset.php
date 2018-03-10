<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;


use yii;
use yii\web\AssetBundle;
use yii\web\View;

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
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'antkaz\vue\VueAsset',
    ];

    /**
     * @var string The locale ID ('en-US', 'en-GB') for the language to be used by the iview.
     * If this property is empty, then the current application language will be used.
     */
    public $language;

    /**
     * @inheritdoc
     *
     * @throws \yii\base\InvalidArgumentException
     */
    public function init()
    {
        parent::init();

        $this->registerLanguage(Yii::$app->language);
    }

    /**
     * @inheritdoc
     *
     * @throws \yii\base\InvalidArgumentException
     */
    public function registerAssetFiles($view)
    {
        $language = $this->language ?: Yii::$app->language;
        $this->registerLanguage($language);

        parent::registerAssetFiles($view);
    }

    /**
     * Registers a language file if it exist
     *
     * @param string $language The locale ID
     * @throws \yii\base\InvalidArgumentException
     */
    private function registerLanguage($language)
    {
        if (file_exists(Yii::getAlias($this->sourcePath . "/locale/{$language}.js"))) {
            $this->js[] = "locale/{$language}.js";
        }
    }
}