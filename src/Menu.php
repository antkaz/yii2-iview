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
     * @var string The mode of the menu. Optional: `horizontal`, `vertical`. Default `vertical`.
     */
    public $mode;

    /**
     * @var string Theme. Optional: `light`, `dark`, `primary`.
     * Primary can only be used when mode="horizontal". Default `light`.
     */
    public $theme;

    /**
     * @var array The array of expanded Submenu's name.
     */
    public $openNames;

    /**
     * @var bool Enable accordion mode or not.
     * If true, only one Submenu can be expanded at the same time. Default false.
     */
    public $accordion;

    /**
     * @var string The width of the navigation menu. It only works when mode="vertical".
     * We recommend you to set it to auto if you're using layouts like Col. Default `240px`.
     */
    public $width;

    /**
     * @var bool Whether the nav items labels should be HTML-encoded.
     */
    public $encodeLabel = true;

    /**
     * @var string|int The name of the menu item that is active.
     */
    private $activeName;

    /**
     * Initializes the IView component properties.
     *
     * @throws InvalidConfigException
     */
    protected function initOptions()
    {
        parent::initOptions();

        if (
            $this->theme === self::THEME_PRIMARY
            && $this->mode !== self::MODE_HORIZONTAL
        ) {
            throw new InvalidConfigException('Primary theme can only be used when mode="horizontal"');
        }

        if (is_array($this->openNames)) {
            $this->options['open-names'] = $this->openNames;
        }

        $this->options['width'] = $this->width;
        $this->options['mode'] = $this->mode;
        $this->options['theme'] = $this->theme;
        $this->options['accordion'] = $this->accordion ? true : null;
    }

    /**
     * Renders Menu component.
     *
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    protected function renderWidget()
    {
        return $this->renderItems($this->items);
    }

    /**
     * Renders menu items.
     *
     * @param array $items List of items in the menu component.
     *
     * @return string The rendering result.
     * @throws \yii\base\InvalidConfigException
     */
    protected function renderItems($items = [])
    {
        if (!is_array($items)) {
            throw new InvalidConfigException("The 'items' option are not an array");
        }

        $menuItems = [];
        foreach ($items as $key => $item) {
            if (isset($item['items'])) {
                $menuItems[] = $this->renderSubmenu($item);
            } else {
                $menuItems[] = $this->renderItem($item);
            }
        }

        $this->options['active-name'] = $this->activeName ?: null;

        return Html::tag('i-menu', implode(PHP_EOL, $menuItems), $this->options);
    }

    /**
     * Renders the submenu items.
     *
     * @param $item menu item containing submenu items.
     *
     * @return string The rendering result.
     * @throws \yii\base\InvalidConfigException
     */
    protected function renderSubmenu($item)
    {
        if (!is_array($item['items'])) {
            throw new InvalidConfigException("The 'items' option are not an array");
        }

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
     * @throws \yii\base\InvalidConfigException
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