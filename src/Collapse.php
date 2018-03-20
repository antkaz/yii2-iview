<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;

/**
 * Renders the Collapse component.
 *
 * Used to fold/spread the content area.
 *
 * @see https://www.iviewui.com/components/collapse-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Collapse extends Widget
{
    /**
     * @var array List of panels in the collapse widget.
     * Each array element represents a single panel with the following structure:
     * - name: string, the name of current panel, corresponds with value of Collapse.
     *   Index value will be used if not filled;
     * - label: string, header of the panel;
     * - encodeLabel: bool, whether the label will be HTML-encoded.
     *   If set, supersedes the $encodeLabels option for only this item;
     * - content: string, description content.
     */
    public $items = [];

    /**
     * @var bool Whether the collapse items labels should be HTML-encoded. Default `true`.
     */
    public $encodeLabel = true;

    /**
     * @var string Directive to create two-way data bindings.
     */
    public $vModel;

    /**
     * @var array|string The name of the activated panel. Use `vModel` to enable a two-way binding.
     */
    public $value;

    /**
     * @var bool Enable accordion effect or not. In this mode, you can only spread one panel each time. Default `false`.
     */
    public $accordion = false;

    /**
     * @inheritdoc
     */
    protected function initOptions()
    {
        parent::initOptions();

        $this->options['v-model'] = $this->vModel ?: false;
        if (is_array($this->value)) {
            $this->options[':value'] = $this->value;
        } else {
            $this->options['value'] = $this->value ?: false;
        }
        $this->options['accordion'] = $this->accordion ? true : false;
    }

    /**
     * Renders the widget
     *
     * @return string Returns the rendering result.
     */
    protected function renderWidget()
    {
        return $this->renderItems();
    }

    /**
     * Renders collapse items.
     *
     * @return string The rendering result.
     * @throws InvalidConfigException If the items are not an array.
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

        return Html::tag('collapse', implode(PHP_EOL, $items), $this->options);
    }

    /**
     * Renders a single collapsible panel.
     *
     * @param array $item A single item from `items`.
     * @return string The rendering result.
     */
    private function renderItem(array $item)
    {
        $label = ArrayHelper::remove($item, 'label', '');
        $encodeLabel = ArrayHelper::remove($item, 'encodeLabel', $this->encodeLabel);
        $label = $encodeLabel ? Html::encode($label) : $label;

        $content = ArrayHelper::remove($item, 'content', '');
        $content = Html::tag('p', $content, ['slot' => 'content']);

        return Html::tag('panel', $label . $content, $item);
    }
}