<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\helpers\Html;

/**
 * Renders the Avatar component
 *
 * @see https://www.iviewui.com/components/avatar-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Avatar extends Widget
{
    /**
     * Avatar shape.
     */
    const SHAPE_CIRCLE = 'circle';
    const SHAPE_SQUARE = 'square';

    /**
     * Avatar size
     */
    const SIZE_DEFAULT = 'default';
    const SIZE_LARGE = 'large';
    const SIZE_SMALL = 'small';

    /**
     * @var string The body content in the Avatar component.
     */
    public $body;

    /**
     * @var string To set the shape of avatar, options include `circle`, `square`. Default `circle`.
     */
    public $shape;

    /**
     * @var string To set the size of avatar, options include `large`, `small`, `default`.
     */
    public $size;

    /**
     * @var string The address of a image avatar.
     */
    public $src;

    /**
     * @var string The icon type of a icon avatar.
     *
     */
    public $icon;

    /**
     * @inheritdoc
     */
    protected function initOptions()
    {
        parent::initOptions();

        $this->options['shape'] = $this->shape ?: false;
        $this->options['size'] = $this->size ?: false;
        $this->options['src'] = $this->src ?: false;
        $this->options['icon'] = $this->icon ?: false;

    }

    /**
     * Renders the widget
     *
     * @return string Returns the rendering result
     */
    protected function renderWidget()
    {
        if ($this->content) {
            $this->body .= $this->content;
        }

        return Html::tag('avatar', $this->body, $this->options);
    }
}