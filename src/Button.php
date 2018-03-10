<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\helpers\Html;

/**
 * Class Button renders a Iview button
 *
 * @see https://www.iviewui.com/components/button-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Button extends Widget
{
    /**
     * Button types.
     */
    const TYPE_GHOST = 'ghost';
    const TYPE_DASHED = 'dashed';
    const TYPE_TEXT = 'text';
    const TYPE_PRIMARY = 'primary';
    const TYPE_INFO = 'info';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    const TYPE_ERROR = 'error';

    /**
     * Button sizes.
     */
    const SIZE_DEFAULT = 'default';
    const SIZE_LARGE = 'large';
    const SIZE_SMALL = 'small';

    /**
     * HTML button types.
     */
    const HTML_TYPE_BUTTON = 'button';
    const HTML_TYPE_SUBMIT = 'submit';
    const HTML_TYPE_RESET = 'reset';

    /**
     * Button shapes.
     */
    const SHAPE_CIRCLE = 'circle';

    /**
     * @var string Button text.
     */
    public $label;

    /**
     * @var bool Whether the button label should be HTML-encoded. Default false.
     */
    public $encodeLabel = false;

    /**
     * @var string Button type, options include
     * `primary`, `ghost`, `dashed`, `text`, `info`, `success`, `warning`, `error`
     */
    public $type;

    /**
     * @var string Button size，options include `large`, `small`, `default`. Default `default`.
     */
    public $size;

    /**
     * @var string Button shape, options include `circle`.
     */
    public $shape;

    /**
     * @var bool Set the width of the button to 100%. Default false.
     */
    public $long;

    /**
     * @var string Set the `button` raw `type`，options include `button`, `submit`, `reset`.
     */
    public $htmlType;

    /**
     * @var bool Disable the button. Default false.
     */
    public $disabled;

    /**
     * @var bool Set the button to loading status. Default false.
     */
    public $loading;

    /**
     * @var string Set the icons used in the button.
     *
     * @see https://www.iviewui.com/components/icon-en
     */
    public $icon;

    /**
     * @inheritdoc
     */
    protected function initOptions()
    {
        parent::initOptions();

        $this->options['type'] = $this->type;
        $this->options['size'] = $this->size;
        $this->options['shape'] = $this->shape;
        $this->options['long'] = $this->long ? true : null;
        $this->options['html-type'] = $this->htmlType;
        $this->options['disabled'] = $this->disabled ? true : null;
        $this->options['loading'] = $this->loading ? true : null;
        $this->options['icon'] = $this->icon;
    }

    /**
     * Prepares text and options and rendered button
     *
     * @return string
     */
    protected function renderWidget()
    {
        $text = $this->encodeLabel ? Html::encode($this->label) : $this->label;

        return Html::tag('i-button', $text, $this->options);
    }
}