<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\helpers\Html;

/**
 * Renders the Progress component.
 *
 * @see https://www.iviewui.com/components/progress-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Progress extends Widget
{
    const STATUS_NORMAL = 'normal';
    const STATUS_ACTIVE = 'active';
    const STATUS_WRONG = 'wrong';
    const STATUS_SUCCESS = 'success';

    /**
     * @var string Customize how to show Progress's status.
     */
    public $body;

    /**
     * @var int|string Percentage. Use string for creating two-way data bindings.
     */
    public $percent;

    /**
     * @var string Progress's status. Optional value: `normal`, `active`, `wrong`, `success`. Default `normal`.
     */
    public $status;

    /**
     * @var int The width of the progress bar. Unit: px. Default 10.
     */
    public $strokeWidth;

    /**
     * @var bool Hide value/status icon. Default `false`.
     */
    public $hideInfo;

    /**
     * @var bool Whether to display in the vertical direction. Default `false`.
     */
    public $vertical;

    /**
     * @inheritdoc
     */
    protected function initOptions()
    {
        parent::initOptions();

        $this->options[':percent'] = $this->percent ?: false;
        $this->options['status'] = $this->status ?: false;
        $this->options[':stroke-width'] = $this->strokeWidth ?: false;
        $this->options['hide-info'] = $this->hideInfo ? true : false;
        $this->options['vertical'] = $this->vertical ? true : false;
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
        return Html::tag('i-progress', $this->body, $this->options);
    }
}