<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget as YiiWidget;
use yii\web\View;

/**
 * Base class for IView widgets.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
abstract class Widget extends YiiWidget
{
    /**
     * @var array The IView component properties.
     */
    public $options = [];

    /**
     * @var array The IView component events.
     */
    public $events = [];

    /**
     * @var string The language configuration (e.g. 'fr-FR', 'zh-CN').
     *
     * The format for the language/locale is
     * ll-CC where ll is a two or three letter lowercase code for a language according to ISO-639 and
     * CC is the country code according to ISO-3166.
     * If this property not set, then the current application language will be used.
     */
    public $language;

    /**
     * @var string Current contents of the buffer
     */
    protected $content;

    /**
     * Initializes the component.
     *
     * This method will initializes the properties and events of the iview component.
     * After will be registered the Iview asset bundle.
     * If you override this method, make sure you call the parent implementation first.
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();

        $this->initBuffering();
        $this->initOptions();
        $this->initEvents();
        $this->registerJs();
    }

    /**
     * Turn on output buffering
     */
    protected function initBuffering()
    {
        ob_start();
        ob_implicit_flush(false);
    }

    /**
     * Initializes the HTML tag attributes for the widget tag.
     */
    protected function initOptions()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * Initializes The IView component events.
     *
     * @throws InvalidConfigException
     */
    protected function initEvents()
    {
        if (!is_array($this->events)) {
            throw new InvalidConfigException("The 'events' option are not an array");
        }

        foreach ($this->events as $eventName => $methodName) {
            $this->options["@$eventName"] = $methodName;
        }
    }

    /**
     * Registers a specific asset bundles.
     */
    protected function registerJs()
    {
        $this->registerIVIew();
    }

    /**
     * Registers a specific the IView library asset bundle, initializes language.
     */
    protected function registerIVIew()
    {
        $view = $this->getView();

        $language = $this->language ?: Yii::$app->language;

        $iview = IViewAsset::register($view);
        $iview->language = $language;

        $view->registerJs("iview.lang('{$language}')", View::POS_HEAD);
    }

    /**
     * The method gets the current contents of the buffer, puts it in the `content` property,
     * deletes the current output buffer, and calls the renderWidget
     *
     * @return string The result of calling renderWidget
     */
    final public function run()
    {
        $this->content = ob_get_clean();

        return $this->renderWidget();
    }

    /**
     * Renders the widget
     *
     * @return string Returns the rendering result
     */
    abstract protected function renderWidget();
}