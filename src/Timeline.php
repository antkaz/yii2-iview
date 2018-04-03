<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Renders the Timeline component.
 *
 * @see https://www.iviewui.com/components/progress-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Timeline extends Widget
{
    /**
     * @var boolean Indicates if the last item is a ghost node. Default `false`.
     */
    public $pending = false;

    /**
     * @var array List of timelineItems in the Timelime widget.
     * Each array element represents a single timeline item with the following structure:
     * - content: string, description content;
     * - color: string, circle color. Can choose between `blue`, `red`, `green`, or custom defined. Default `blue`;
     * - dot: string, custom defined timeline item content.
     */
    public $items = [];

    /**
     * @inheritdoc
     */
    public function initOptions()
    {
        parent::initOptions();

        $this->options['pending'] = $this->pending ? true : false;
    }

    /**
     * Renders the widget.
     *
     * @return string Returns the rendering result.
     */
    protected function renderWidget()
    {
        return $this->renderItems();
    }

    /**
     * Renders Timeline items.
     *
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    private function renderItems()
    {
        if (!is_array($this->items)) {
            throw new InvalidConfigException("The 'items' option are not an array");
        }

        $items = [];

        foreach ($this->items as $item) {
            if (is_string($item)) {
                $item = ['content' => $item];
            }
            $items[] = $this->renderItem($item);
        }

        return Html::tag('timeline', implode(PHP_EOL, $items), $this->options);
    }

    /**
     * Renders a single timeline item.
     *
     * @param array $item
     *
     * @return string
     */
    private function renderItem(array $item)
    {
        $content = ArrayHelper::remove($item, 'content', '');
        $dot = ArrayHelper::remove($item, 'dot', '');

        if ($dot) {
            $dot = Html::tag('i', $dot, ['slot' => 'dot']);
        }

        return Html::tag('timeline-item', $dot . $content, $item);
    }
}