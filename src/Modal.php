<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\base\InvalidConfigException;
use yii\helpers\Html;

/**
 * Renders the Modal component
 *
 * @see https://www.iviewui.com/components/modal-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Modal extends Widget
{
    /**
     * @var string The body content in the Modal component.
     */
    public $body;

    /**
     * @var string Directive to create two-way data bindings
     */
    public $vModel;

    /**
     * @var bool Display Modal or not.
     * Use v-model attribute in options to enable two-way binding.
     * Default `false`.
     */
    public $value;

    /**
     * @var string The title of Modal. It is invalid if header slot is set.
     */
    public $title;

    /**
     * @var bool Display the close button at the right top corner or not.
     * ESC clicking-close will also be disabled if closable is set to false.
     * Default `true`.
     */
    public $closable;

    /**
     * @var bool Allow mask-closing operation (Click mask layer around the Modal to close it) or not.
     * Default `true`.
     */
    public $maskClosable;

    /**
     * @var bool Show loading status or not when clicking confirm button.
     * If it is set to `true`, Modal has to be close manually by setting `visible` to `false`.
     * Default `false`.
     */
    public $loading;

    /**
     * @var bool Allow scrolling or not.
     * Default `false`.
     */
    public $scrollable;

    /**
     * @var string OK button's text.
     * Default `OK`
     */
    public $okText;

    /**
     * @var string Cancel button's text.
     * Default `Cancel`
     */
    public $cancelText;

    /**
     * @var int|string The width of Modal.
     * The width is responsive: It'll change to auto when the size of the screen is smaller than 768px.
     * It will be displayed as a percentage when the value less than 100, otherwise it is a pixel.
     * Default `520`
     */
    public $width;

    /**
     * @var string Set layer's style or adjust its position. The prop sets .ivu-modal's style.
     */
    public $styles;

    /**
     * @var string Set Modal's wrapper - .ivu-modal-wrap's class name.
     * It can be used to assist to realise custom styles like vertical center.
     */
    public $className;

    /**
     * @var array Custom transition. The first transition is Modal itself, the second is the background.
     * Default `['ease', 'fade']`
     */
    public $transitionNames;

    /**
     * @var array Modal Slot
     * - header: string, Custom header;
     * - close: string, Custom right-top closing area;
     * - footer: string, Custom footer.
     */
    public $slot;

    /**
     * Initializes the IView component properties.
     *
     * @throws \yii\base\InvalidConfigException
     */
    protected function initOptions()
    {
        parent::initOptions();

        if ($this->transitionNames && !is_array($this->transitionNames)) {
            throw new InvalidConfigException("'transitionNames' property is not array.");
        }

        $this->options['v-model'] = $this->vModel ?: false;
        $this->options['value'] = $this->value ? true : false;
        $this->options['title'] = $this->title ?: false;
        $this->options[':closable'] = ($this->closable === false) ? 'false' : false;
        $this->options[':mask-closable'] = ($this->maskClosable === false) ? 'false' : false;
        $this->options['loading'] = $this->loading ? true : false;
        $this->options['scrollable'] = $this->scrollable ? true : false;
        $this->options['@ok-text'] = $this->okText ?: false;
        $this->options['@cancel-text'] = $this->cancelText ?: false;
        $this->options['width'] = $this->width ?: false;
        $this->options[':styles'] = $this->styles ?: false;
        $this->options['class-name'] = $this->className ?: false;
        $this->options[':transition-names'] = $this->transitionNames ?: false;
    }

    /**
     * Renders the widget
     *
     * @return string Returns the rendering result
     */
    protected function renderWidget()
    {
        if ($this->wrapperContent) {
            $this->body .= $this->wrapperContent;
        }

        return $this->renderModal();
    }

    /**
     * Prepares and returns the Alert widget
     *
     * @return string
     */
    private function renderModal()
    {
        $body = '';

        if (isset($this->slot['header'])) {
            $body .= Html::tag('p', $this->slot['header'], ['slot' => 'header']);
        }

        if (isset($this->slot['close'])) {
            $body .= Html::tag('p', $this->slot['close'], ['slot' => 'close']);
        }

        if (isset($this->slot['footer'])) {
            $body .= Html::tag('p', $this->slot['footer'], ['slot' => 'footer']);
        }

        $body .= $this->body;

        return Html::tag('modal', $body, $this->options);
    }
}