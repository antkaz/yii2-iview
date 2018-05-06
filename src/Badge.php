<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\helpers\Html;

/**
 * Renders the Badge component
 *
 * Mainly used to set a corner mark to notice the count of unread messages, remind user to read.
 *
 * @see https://www.iviewui.com/components/badge-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Badge extends Widget
{
    /**
     * @var string The body content in the Badge component.
     */
    public $body;

    /**
     * @var int|string Count to be shown. Show ${overflowCount}+ if bigger than overflowCount. Hide if 0.
     * Use string for creating two-way data bindings.
     */
    public $count;

    /**
     * @var int|string Maximal count that is allowed to be shown. Use string for creating two-way data bindings.
     * Default `99`.
     */
    public $overflowCount;

    /**
     * @var bool Only a red dot without count. Set count to 0 to hide the dot.
     */
    public $dot = false;

    /**
     * @var string Customized class name, invalid in dot mode.
     */
    public $className;

    /**
     * @inheritdoc
     */
    protected function initOptions()
    {
        parent::initOptions();

        $this->options['count'] = $this->count ?: false;
        $this->options['overflow-count'] = $this->overflowCount ?: false;
        $this->options['dot'] = $this->dot ? true: false;
        $this->options['class-name'] = $this->className ?: false;
    }

    /**
     * Renders the widget.
     *
     * @return string Returns the rendering result
     */
    protected function renderWidget()
    {
        if ($this->wrapperContent) {
            $this->body .= $this->wrapperContent;
        }

        return Html::tag('badge', $this->body, $this->options);
    }
}