<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii;
use antkaz\iview\assets\IViewAsset;
use yii\helpers\Json;
use yii\web\View;
use yii\base\InvalidConfigException;
use yii\web\JsExpression;

/**
 * IViewTrait contains basic properties and methods that use all the IView components.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
trait IViewTrait
{
    /**
     * @var array The HTML tag attributes for the widget container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @var array The IView component properties.
     */
    public $componentProps = [];

    /**
     * @var array The options for the Vue.
     *
     * @see https://vuejs.org/v2/api/#Options-Data for informations about the supported options.
     */
    public $vueOptions = [];

    /**
     * @var array The Iview component events.
     */
    public $iViewEvents = [];

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
     * Initializes the component.
     *
     * This method will initializes the properties and events of the iview component.
     * After will be registered the Iview asset bundle.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();

        $this->initOptions();
        $this->initComponentProps();
        $this->initEvents();
        $this->registerJs();
        $this->initBuffering();
    }

    /**
     * Initializes the HTML tag attributes for the widget container tag.
     */
    public function initOptions()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * Initializes the IView component properties.
     */
    protected function initComponentProps()
    {}

    /**
     * Initializes the IView component events.
     */
    protected function initEvents()
    {
        if (empty($this->iViewEvents)) {
            return;
        }

        if (!is_array($this->iViewEvents)) {
            throw new InvalidConfigException("The 'clientEvents' option are not an array");
        }

        foreach ($this->iViewEvents as $eventName => $handler) {
            $function = $handler instanceof JsExpression ? $handler : new JsExpression($handler);
            $method = str_replace('-', '', $eventName) . $this->getId();
            $this->componentProps["@$eventName"] = $method;
            $this->vueOptions['methods'][$method] = $function;
        }
    }

    /**
     * Registers a specific asset bundles.
     */
    protected function registerJs()
    {
        $this->registerIVIew();
        $this->registerVue($this->getId());
    }

    /**
     * Registers a specific the IView library asset bundle, initializes language.
     */
    protected function registerIVIew()
    {
        $view = $this->getView();

        $language = empty($this->language) ? Yii::$app->language : $this->language;

        $iview = IViewAsset::register($view);
        $iview->language = $language;

        $view->registerJs("iview.lang('" . $language . "')", View::POS_HEAD);
    }

    /**
     * Registers a specific VueJS framework asset bundle.
     *
     * @param string $id The ID of the widget container tag.
     */
    protected function registerVue($id)
    {
        $options = Json::htmlEncode($this->vueOptions);
        $js = "var {$id} = Vue.extend({$options});" . PHP_EOL;
        $js .= "new {$id}().\$mount('#{$id}')";
        $this->getView()->registerJs($js, View  ::POS_END);
    }

    /**
     * Turn on output buffering
     */
    protected function initBuffering()
    {}
}