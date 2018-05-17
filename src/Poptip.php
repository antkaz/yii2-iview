<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Renders the Poptip component
 *
 * @see https://www.iviewui.com/components/poptip-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Poptip extends Widget
{
    const TRIGGER_HOVER = 'hover';
    const TRIGGER_CLICK = 'click';
    const TRIGGER_FOCUS = 'focus';

    /**
     * @var string The body content in the Tooltip component.
     */
    public $body;

    /**
     * @var string The trigger. Optional value: `hover`, `click`, `focus`. In confirm mode, only `click` works.
     * Default `click`
     */
    public $trigger;

    /**
     * @var string The title of Poptip.
     */
    public $title;

    /**
     * @var string The content of Poptip. In confirm mode, it'll be ignored.
     */
    public $content;

    /**
     * @var string To set the position, which can be one of `top`, `top-start`, `top-end`, `bottom`, `bottom-start`,
     * `bottom-end`, `left`, `left-start`, `left-end`, `right`, `right-start`, `right-end`.
     * Supports automatic recognition after 2.12.0.
     */
    public $placement;

    /**
     * @var string|int the width of the poptip.
     * The minimal width allowed is 150px. The maximum width by default in confirm mode is 300px.
     */
    public $width;

    /**
     * @var bool Enable confirm mode or not. Default `false`.
     */
    public $confirm = false;

    /**
     * @var string Text in OK button. It only works in confirm mode. Default `Ok`.
     */
    public $okText;

    /**
     * @var string Text in Cancel button. It only works in confirm mode. Default `Cancel`.
     */
    public $cancelText;

    /**
     * @var bool Whether to append the layer in body.
     * When used in Tabs or a fixed Table column, suggests adding this property,
     * it will not be affected by the parent style, resulting in better results.
     * Default `false`.
     */
    public $transfer = false;

    /**
     * @var string Setting class-name for Poptip, it is useful when using transfer.
     */
    public $popperClass;

    /**
     * @var array Poptip slot:
     * - title: string, Title. It'll convert title prop;
     * - TitleOptions: array, the HTML tag with attributes in terms of name-value pairs.
     * - content: string, The content of the Poptip. It'll convert content props. It'll be ignored in confirm mode;
     * - contentOptions: array, the HTML tag with attributes in terms of name-value pairs.
     */
    public $slot = [];

    /**
     * @inheritdoc
     */
    public function initOptions()
    {
        parent::initOptions();

        $this->options['trigger'] = $this->trigger ?: false;
        $this->options['title'] = $this->title ?: false;
        $this->options['content'] = $this->content ?: false;
        $this->options['placement'] = $this->placement ?: false;
        $this->options['width'] = $this->width ?: false;
        $this->options['confirm'] = $this->confirm ? true : false;
        $this->options['ok-text'] = $this->okText ?: false;
        $this->options['cancel-text'] = $this->cancelText ?: false;
        $this->options['transfer'] = $this->transfer ? true : false;
        $this->options['popper-class'] = $this->popperClass ?: false;
    }

    /**
     * @inheritdoc
     */
    protected function renderWidget()
    {
        return $this->renderPoptip();
    }

    /**
     * Prepares and returns the Poptip widget.
     *
     * @return string
     */
    private function renderPoptip()
    {
        $content = '';

        if (!empty($this->slot)) {
            $slotTitle = ArrayHelper::getValue($this->slot, 'title', '');
            $slotContent = ArrayHelper::getValue($this->slot, 'content', '');
            $this->slot['titleOptions']['slot'] = 'title';
            $this->slot['contentOptions']['slot'] = 'content';

            $content = $this->body;
            $content .= !empty($slotTitle) ? Html::tag('div', $slotTitle, $this->slot['titleOptions']) : '';
            $content .= !empty($slotContent) ? Html::tag('div', $slotContent, $this->slot['contentOptions']) : '';
        } else {
            $content = $this->body . $this->wrapperContent;
        }


        return Html::tag('poptip', $content, $this->options);
    }
}