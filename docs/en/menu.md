# Menu

Renders navigation menu for web pages. [Demo and API](https://www.iviewui.com/components/menu-en)

## Options

 * `items` *(array)* - List of items in the menu component. 
Each array element represents a single menu item which can be either a string or an array with the following structure: 
который может быть либо строкой, либо массивом со следующей структурой:
    * `name` *(string)* - unique identifier of menu-item (required);
    * `label` *(string)* - the menu item label *(required)*;
    * `active` *(boolean)* - whether the item should be on active state or not;
    * `encode` *(boolean)* - whether the label will be HTML-encoded. 
    If set, supersedes the `encodeLabels` option for only this item.
    * `items` *(array)* - List of items in the sub-menu.
    If a menu item is a string, it will be rendered directly without HTML encoding.
 * `mode` *(string)* - The mode of the menu:
	* `Menu::MODE_VERTICAL` or `'vertical'` - Vertical head navigation menu *(default)*;
	* `Menu::MODE_HORIZONTAL` or `'horizontal'` - Horizontal navigation menu;
 * `theme` *(string)* - Theme:
	 * `Menu::THEME_LIGHT` or `'light'` - light theme *(default)*;
	 * `Menu::THEME_DARK` or `'dark'` - dark theme;
	 * `Menu::THEME_PRIMARY` or `'primary'` - primary theme. Can only be used when `mode` = `Menu::MODE_HORIZONTAL`
* `openNames` *(array)* - the array of expanded Submenu's name;
* `accordion` *(boolean)* - enable accordion mode or not. If `true`, only one Submenu can be expanded at the same time;
* `width` *(string)* - the width of the navigation menu. It only works when `mode` = `Menu::MODE_VERTICAL`.
We recommend you to set it to `auto` if you're using layouts like `Col`
* `encodeLabel` *(boolean)* - whether the nav items labels should be HTML-encoded;
* `events` *(array)* - the Menu component events: 
	* `on-select` - Emit when select(click) the menu-item;
	* `on-open-change` - Emit when expand / fold the Submenu.

## Example

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Menu;
use antkaz\vue\Vue;
use yii\web\JsExpression;

IViewAsset::register($this);
?>

<div class="iview-menu">
    <?php Vue::begin([
        'clientOptions' => [
            'methods' => [
                'select' => new JsExpression("function(name) { console.log('Select item ' + name) }")
            ]
        ]
    ]) ?>

    <?= Menu::widget([
        'items' => $items,
        'mode' => Menu::MODE_HORIZONTAL,
        'accordion' => true,
        'encodeLabel' => false,
        'events' => [
            'on-select' => 'select'
        ]
    ]); ?>

    <?php Vue::end() ?>
</div>
```