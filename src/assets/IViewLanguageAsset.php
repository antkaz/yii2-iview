<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview\assets;


use yii;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class IViewLanguageAsset
 *
 * Registers IView language
 *
 * @author Anton Kazarionv <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class IViewLanguageAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@npm/iview/dist/locale';

    /**
     * @inheritdoc
     */
    public $jsOptions = [
        'depends' => 'antkaz\iview\assets\IViewAsset',
        'position' => View::POS_HEAD
    ];

    /**
     * @var string
     */
    public $language;

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        if ($this->language) {
            if (file_exists(Yii::getAlias($this->sourcePath . "/{$this->language}.js"))) {
                $this->js[] = "{$this->language}.js";
            }
        }

        parent::registerAssetFiles($view);
    }

}