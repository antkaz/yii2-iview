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
 * Renders the Tooltip component
 *
 * @see https://www.iviewui.com/components/tooltip-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Tooltip extends Widget
{
    /**
     * @var string The body content in the Tooltip component.
     */
    public $body;

    /**
     * @var string Prompt text.
     */
    public $content;

    /**
     * @var string To set the position, which can be one of `top`, `top-start`, `top-end`, `bottom`, `bottom-start`,
     * `bottom-end`, `left`, `left-start`, `left-end`, `right`, `right-start`, `right-end`.
     * Supports automatic recognition after 2.12.0.
     */
    public $placement;

    /**
     * @var bool|string Whether to disable the Tooltip. Default `false`.
     */
    public $disabled = false;

    /**
     * @var int Delay display in milliseconds.
     */
    public $delay;

    /**
     * @var bool Whether it is always visible. Default `false`.
     */
    public $always = false;

    /**
     * @var bool Whether to append the layer in body. When used in Tabs or a fixed Table column, suggests adding this
     * property, it will not be affected by the parent style, resulting in better results.
     */
    public $transfer = false;

    /**
     * @var array Tooltip slot:
     * - default: string, main content;
     * - content: string, the contents of the Tooltip, when this slot is defined, overwrites the props content.
     * - contentOptions: array, the HTML tag with attributes in terms of name-value pairs
     */
    public $slot = [];

    /**
     * @inheritdoc
     */
    public function initOptions()
    {
        parent::initOptions();

        $this->options['content'] = $this->content ?: false;
        $this->options['placement'] = $this->placement ?: false;
        if (is_bool($this->disabled)) {
            $this->options['disabled'] = $this->disabled ? true : false;
        } else {
            $this->options[':disabled'] = $this->disabled ?: false;
        }
        $this->options[':delay'] = $this->delay ? (int)$this->delay : false;
        $this->options['always'] = $this->always ? true : false;
        $this->options['transfer'] = $this->transfer ? true : false;
    }

    /**
     * @inheritdoc
     */
    protected function renderWidget()
    {
        if ($this->wrapperContent) {
            $this->body .= $this->wrapperContent;
        }

        return $this->renderTooltip();
    }

    /**
     * Prepares and returns the tooltip widget.
     *
     * @return string
     */
    private function renderTooltip()
    {
        $content = $this->body;

        if (empty($content)) {
            $content = ArrayHelper::getValue($this->slot, 'default', '');
            $contentSlot = ArrayHelper::getValue($this->slot, 'content', '');
            $this->slot['contentOptions']['slot'] = 'content';
            $content .= Html::tag('div', $contentSlot, $this->slot['contentOptions']);
        }


        return Html::tag('tooltip', $content, $this->options);
    }
}