<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\helpers\Html;

/**
 * Renders the Timeline component.
 *
 * @see https://www.iviewui.com/components/progress-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Tag extends Widget
{
    const TYPE_BORDER = 'border';
    const TYPE_DOT = 'dot';

    /**
     * @var string The body content in the Tag component.
     */
    public $body;

    /**
     * @var bool Tag can be closed. Default `false`.
     */
    public $closable = false;

    /**
     * @var bool Tag can be selected. Default `false`.
     */
    public $checkable = false;

    /**
     * @var string Tag style type, the optional value for the `border`, `dot` or not fill.
     */
    public $type;

    /**
     * @var string Tag color, default values for `blue`, `green`, `red`, `yellow`, `default`, you can set custom color.
     */
    public $color;

    /**
     * @inheritdoc
     */
    public function initOptions()
    {
        parent::initOptions();

        $this->options['closable'] = $this->closable ? true : false;
        $this->options['checkable'] = $this->checkable ? true : false;
        $this->options['type'] = $this->type ?: false;
        $this->options['color'] = $this->color ?: false;
    }

    /**
     * @inheritdoc
     */
    protected function renderWidget()
    {
        return Html::tag('tag', $this->body, $this->options);
    }
}