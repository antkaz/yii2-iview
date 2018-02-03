<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\base\Widget as YiiWidget;

/**
 * Base class for IView widgets.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
abstract class Widget extends YiiWidget
{
    use IViewTrait;

    /**
     * @var string Current contents of the buffer
     */
    protected $content;

    /**
     * @inheritdoc
     */
    protected function initBuffering()
    {
        ob_start();
        ob_implicit_flush(false);
    }

    /**
     * The method gets the current contents of the buffer, puts it in the `content` property,
     * deletes the current output buffer, and calls the renderWidget
     *
     * @return string The result of calling renderWidget
     */
    final public function run()
    {
        $this->content = ob_get_clean();

        return $this->renderWidget();
    }

    /**
     * Renders the widget
     *
     * @return string Returns the rendering result
     */
    abstract protected function renderWidget();
}