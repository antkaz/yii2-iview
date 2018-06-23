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
 * Renders the Tabs component.
 *
 * @see https://www.iviewui.com/components/tabs-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Tabs extends Widget
{
    const TYPE_LINE = 'line';
    const TYPE_CARD = 'card';

    const SIZE_DEFAULT = 'default';
    const SIZE_SMALL = 'small';

    /**
     * @var string
     */
    public $body;

    /**
     * @var array List of items in the tabs component.
     *
     * Each array element represents a single tab item which can be either a string
     * or an array with the following structure:
     * - name: string, used to identify the current panel, corresponding to the value, the default for its index;
     * - label: string, the display text of the tab, supports the Render function;
     * - content: string, content of the current panel;
     * - icon: string, icon of tab;
     * - disabled: bool, whether to disable the tab;
     * - closable: bool, whether to close the tab，only effective when type=`card`.
     */
    public $items = [];

    /**
     * @var string Activates the name of the tab panel. Defaults to the first name.
     */
    public $value;

    /**
     * @var string The basic style of the tab，Optional value: `line` and `card`. Default `line`.
     */
    public $type;

    /**
     * @var string Size, Optional value: `default` and `small`, only effective when the type is `line`.
     * Default `default`.
     */
    public $size;

    /**
     * @var bool Whether to close the tab, only effective when the 'type' is `card`. Default `false`.
     */
    public $closable = false;

    /**
     * @var bool Whether to use the CSS3 animation. Default `false`.
     */
    public $animated = false;

    /**
     * @var bool Whether form components in Tabs automatically get focus. Default `false`.
     */
    public $captureFocus = false;

    /**
     * @inheritdoc
     */
    public function initOptions()
    {
        parent::initOptions();

        $this->options['value'] = $this->value ?: false;
        $this->options['type'] = $this->type ?: false;
        $this->options['size'] = $this->size ?: false;
        $this->options['closable'] = $this->closable ? true : false;
        $this->options[':animated'] = $this->animated ? false : 'false';
        $this->options['capture-focus'] = $this->captureFocus ? true : false;
    }

    /**
     * Renders the widget
     *
     * @return string Returns the rendering result
     */
    protected function renderWidget()
    {
        if (!empty($this->items)) {
            $content = $this->prepareTabs();
        } else {
            $content = $this->wrapperContent;
        }

        return $this->renderTabs($content);
    }

    /**
     * Prepared content from items.
     *
     * @return string The HTML code.
     * @throws InvalidConfigException
     */
    private function prepareTabs()
    {
        if (!is_array($this->items)) {
            throw new InvalidConfigException("The 'items' option are not an array");
        }

        $tabs = [];

        foreach ($this->items as $item) {
            if (is_array($item)) {
                $tabs[] = $this->prepareItem($item);
            } elseif (is_string($item)) {
                $tabs[] = $item;
            }
        }

        return implode(PHP_EOL, $tabs);
    }

    /**
     * Prepared Tab item.
     *
     * @param array $item
     *
     * @return string The HTML code.
     */
    private function prepareItem(array $item)
    {
        $options['name'] = ArrayHelper::getValue($item, 'name', false);
        $options['label'] = ArrayHelper::getValue($item, 'label', false);
        $options['icon'] = ArrayHelper::getValue($item, 'icon', false);
        $options['disabled'] = !empty($item['disabled']) ? true : false;
        $options['closable'] = !empty($item['closable']) ? true : false;
        $content = ArrayHelper::getValue($item, 'content', '');

        return Html::tag('tab-pane', $content, $options);
    }

    /**
     * Returns the HTML code for the Tabs widget.
     *
     * @param $content
     *
     * @return string
     */
    private function renderTabs($content)
    {
        return Html::tag('tabs', $content, $this->options);
    }
}