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
 * Class ButtonGroup combined multiple Button together into ButtonGroup to get a buttons set.
 *
 * @see https://www.iviewui.com/components/button-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class ButtonGroup extends Widget
{
    /**
     * Button sizes.
     */
    const SIZE_LARGE = 'large';
    const SIZE_DEFAULT = 'default';
    const SIZE_SMALL = 'small';

    /**
     * Button shapes.
     */
    const SHAPE_CIRCLE = 'circle';

    /**
     * @var string ButtonGroup size, options include `large`, `small`, `default`, optional.
     */
    public $size;

    /**
     * @var string ButtonGroup shape, options include `circle`, optional.
     */
    public $shape;

    /**
     * @var bool For vertical ButtonGroup.
     */
    public $vertical = false;

    /**
     * Renderes a buttons group
     *
     * @return string Buttons group
     */
    public function run()
    {
        $content = ob_get_clean();
        $options = ArrayHelper::merge($this->options, $this->componentProps);

        $buttonGroup = Html::beginTag('button-group', $options);
        $buttonGroup .= $content;
        $buttonGroup .= Html::endTag('button-group');

        return $buttonGroup;
    }

    /**
     * @inheritdoc
     */
    protected function initBuffering()
    {
        ob_start();
        ob_implicit_flush(false);
    }

    /**
     * @inheritdoc
     */
    protected function initComponentProps()
    {
        if ($this->size) {
            $this->componentProps['size'] = $this->size;
        }

        if ($this->shape) {
            $this->componentProps['shape'] = $this->shape;
        }

        if ($this->vertical) {
            $this->componentProps['vertical'] = true;
        }
    }
}