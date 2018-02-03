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
 * Class Menu renders a Menu IView component.
 *
 * @see https://www.iviewui.com/components/menu-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Menu extends Widget
{
    /**
     * Menu modes.
     */
    const MODE_VERTICAL = 'vertical';
    const MODE_HORIZONTAL = 'horizontal';

    /**
     * Menu Themes.
     */
    const THEME_DARK = 'dark';
    const THEME_LIGHT = 'light';
    const THEME_PRIMARY = 'primary';

    /**
     * @var string|int The name of the menu item that is active.
     */
    private $activeName;

    /**
     * @var array List of items in the menu component.
     *
     * Each array element represents a single menu item which can be either a string
     * or an array with the following structure:
     * - name: string, required, unique identifier of menu-item;
     * - label: string, required, the menu item label;
     * - active: bool, optional, whether the item should be on active state or not;
     * - encode: bool, optional, whether the label will be HTML-encoded.
     *   If set, supersedes the $encodeLabels option for only this item;
     * - items: array, optional, list of items in the submenu.
     *
     * If a menu item is a string, it will be rendered directly without HTML encoding.
     */
    public $items;

    /**
     * @var string The mode of the menu. Optional: horizontal, vertical.
     */
    public $mode = self::MODE_VERTICAL;

    /**
     * @var string Theme. Optional: light, dark, primary. Primary can only be used when mode="horizontal".
     */
    public $theme = self::THEME_LIGHT;

    /**
     * @var array The array of expanded Submenu's name.
     */
    public $openNames;

    /**
     * @var bool Enable accordion mode or not. If true, only one Submenu can be expanded at the same time.
     */
    public $accordion = false;

    /**
     * @var string The width of the navigation menu. It only works when mode="vertical".
     * We recommend you to set it to auto if you're using layouts like Col.
     */
    public $width = '240px';

    /**
     * @var bool Whether the nav items labels should be HTML-encoded.
     */
    public $encodeLabel = true;

    /**
     * Initializes the IView component properties.
     *
     * @throws InvalidConfigException
     */
    protected function initComponentProps()
    {
        if (!in_array($this->mode, [self::MODE_VERTICAL, self::MODE_HORIZONTAL])) {
            throw new InvalidConfigException();
        }

        if (!in_array($this->theme, [self::THEME_LIGHT, self::THEME_DARK, self::THEME_PRIMARY])) {
            throw new InvalidConfigException();
        }

        if ($this->theme == self::THEME_PRIMARY && $this->mode != self::MODE_HORIZONTAL) {
            throw new InvalidConfigException('Primary theme can only be used when mode="horizontal"');
        }

        $this->componentProps['mode'] = $this->mode;
        $this->componentProps['theme'] = $this->theme;
        $this->componentProps['accordion'] = $this->accordion;
        $this->componentProps['width'] = $this->width;
        if (!empty($this->openNames) && is_array($this->openNames)) {
            $this->componentProps['open-names'] = $this->openNames;
        }
    }

    /**
     * Renders Menu component.
     *
     * @return string
     */
    protected function renderWidget()
    {
        $menu = $this->renderItems($this->items);
        return Html::tag('div', $menu, $this->options);
    }

    /**
     * Renders menu items.
     *
     * @param array $items List of items in the menu component.
     * @return string The rendering result.
     * @throws InvalidConfigException
     */
    protected function renderItems($items = [])
    {
        if (!is_array($items)) {
            throw new InvalidConfigException("The 'items' option are not an array");
        }

        $menuItems = [];
        foreach ($items as $key => $item) {
            if (isset($item['items']) && is_array($item['items'])) {
                $menuItems[] = $this->renderSubmenu($item);
            } else {
                $menuItems[] = $this->renderItem($item);
            }
        }

        if ($this->activeName) {
            $this->componentProps['active-name'] = $this->activeName;
        }

        return Html::tag('i-menu', implode(PHP_EOL, $menuItems), $this->componentProps);
    }

    /**
     * Renders the submenu items.
     *
     * @param $item menu item containing submenu items.
     * @return string The rendering result.
     */
    protected function renderSubmenu($item)
    {
        $submenu = [];

        $submenu[] = $this->renderItem($item, true);
        foreach ($item['items'] as $subItem) {
            $submenu[] = $this->renderItem($subItem);
        }

        return Html::tag('submenu', implode(PHP_EOL, $submenu), ['name' => $item['name']]);
    }

    /**
     * Renders menu item.
     *
     * @param $item Menu item.
     * @param bool $slot Renders menu item as slot.
     * @return string The rendering result.
     * @throws InvalidConfigException
     */
    protected function renderItem($item, $slot = false)
    {
        if (is_string($item)) {
            return $item;
        }

        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' options is required");
        }

        if (!isset($item['name'])) {
            throw new InvalidConfigException("The 'name' options is required");
        }

        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabel;
        $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];

        if (isset($item['active'])) {
            $this->activeName = $item['name'];
            ArrayHelper::remove($item, 'active');
        }

        if ($slot) {
            return Html::tag('template', $label, ['slot' => 'title']);
        }

        return Html::tag('menu-item', $label, ['name' => $item['name']]);
    }

}