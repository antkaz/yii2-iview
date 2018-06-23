# Tabs

This widget renders the IView Tads. [Demo and API](https://www.iviewui.com/components/tabs-en)

Tabs make it easy to switch between different views.

## Options

* `items` *(array)* - list of items in the tabs component. Each array element represents a single tab item which can be either a string or an array with the following structure:
    * `name` *(string)* - used to identify the current panel, corresponding to the value, the default for its index;
    * `label` *(string)* - the display text of the tab, supports the Render function;    
    * `content` *(string)* - content of the current panel;    
    * `icon` *(string)* - icon of tab;    
    * `disabled` *(bool)* - whether to disable the tab;    
    * `closable` *(bool)* - whether to close the tab，only effective when type=`card`;    
* `value` *(string)* - activates the name of the tab panel. Defaults to the first name;
* `type` *(string)* - the basic style of the tab:
    * `Tabs::TYPE_LINE` or `'line'` (default);
    * `Tabs::TYPE_VARD` or `'card'`;
* `size` *(string)* - size (only effective when the type is `line`):
    * `Tabs::SIZE_DEFAULT` or `'default'` (default);
    * `Tabs::SIZE_SMALL` or `'small'`;
* `closable` *(bool)* - whether to close the tab, only effective when the 'type' is `card`. Default `false`;
* `animated` *(bool)* - whether to use the CSS3 animation. Default `false`;
* `captureFocus` *(bool)* - whether form components in Tabs automatically get focus. Default `false`;
* `events` *(array)* - tabs events:
    * `on-click` - emitted when tab is clicked. Return `name`;
    * `on-tab-remove` - emitted when tab is closed. Return `name`.
 
## Example

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tabs;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-tabs">

    <?php Vue::begin() ?>

    <?= Tabs::widget([
        'type' => Tabs::TYPE_CARD,
        'animated' => true,
        'size' => Tabs::SIZE_DEFAULT,
        'captureFocus' => true,
        'items' => [
            [
                'label' => 'one',
                'content' => 'panel one',
                'name' => 'one',
                'closable' => true,
            ],
            [
                'label' => 'two',
                'content' => 'panel two',
                'name' => 'two',
                'disabled' => true,
                'icon' => 'checkmark',
            ],
            '<tab-pane name="three" label="three">panel three</tab-pane>',
        ],
    ]) ?>

    <?php Vue::end() ?>
</div>
```

You can wrap content between calls `begin()` and `end()` as shown in the following example:

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tabs;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-tabs">

    <?php Vue::begin() ?>

    <?php Tabs::begin([
        'value' => '1',
    ]) ?>

    <tab-pane label="1" name="1">one</tab-pane>
    <tab-pane label="2" name="2">two</tab-pane>
    <tab-pane label="3" name="3">three</tab-pane>

    <?php Tabs::end() ?>

    <?php Vue::end() ?>
</div>
```