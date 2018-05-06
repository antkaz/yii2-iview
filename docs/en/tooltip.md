# Tooltip

This widget renders the IView Tooltip. [Demo and API](https://www.iviewui.com/components/tooltip-en)

A simple text popup tip.

The tip shows while mouse enter, and hides while mouse leave. The Tooltip doesn't support complex text and operation.

It can provide an explanation of button/text/operation that can cover the usage of the default system title.

## Options

* `body` *(string)* - the body content in the Tooltip component;
* `content` *(string)* - prompt text;
* `placement` *(string)* - To set the position. Supports automatic recognition after 2.12.0. Position can be one of 
    * `top`, 
    * `top-start`, 
    * `top-end`, 
    * `bottom`, 
    * `bottom-start`, 
    * `bottom-end`, 
    * `left`, 
    * `left-start`, 
    * `left-end`, 
    * `right`, 
    * `right-start`, 
    * `right-end`;
* `disabled` *(bool|string)* - whether to disable the Tooltip. Use string to create two-way data bindings. Default `false`;
* `delay` *(int)* - delay display in milliseconds;
* `always` *(bool)* - whether it is always visible. Default `false`;
* `transfer` *(bool)* - whether to append the layer in body. When used in Tabs or a fixed Table column, suggests adding this property, 
it will not be affected by the parent style, resulting in better results. Default `false`;
* `slot` *(array)* - Tooltip Slot:
    * `'default'` *(string)* - main content;
    * `'content'` *(string)* - the contents of the Tooltip, when this slot is defined, overwrites the props content;
    * `'contentOptions'` *(array)* - the HTML tag with attributes in terms of name-value pairs;
    
## Example

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tooltip;

IViewAsset::register($this);
?>
<div class="iview-tooltip">

    <?= tooltip::widget([
        'delay' => 100,
        'placement' => 'top',
        'slot' => [
            'default' => \antkaz\iview\Button::widget(['label' => 'Button']),
            'content' => 'This is tooltip in button'
        ],
    ]) ?>

</div>
```

You can wrap content between calls `begin()` and `end()` as shown in the following example:

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tooltip;

IViewAsset::register($this);
?>
<div class="iview-tooltip">

    <?php Tooltip::begin([
        'content' => 'This is tooltip'
    ]) ?>

    <p>This is content</p>

    <?php Tooltip::end() ?>

</div>
```