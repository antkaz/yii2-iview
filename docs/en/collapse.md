# Collapse

Renders the collapse widget. [Demo and API](https://www.iviewui.com/components/collapse-en)

Used to fold/spread the content area.

## Options

 * `items` *(array)* - List of panels in the collapse widget. Each array element represents a single panel with the following structure:
    * `name` *(string)* - the name of current panel, corresponds with value of Collapse. Index value will be used if not filled;
    * `label` *(string)* - header of the panel;
    * `encode` *(boolean)* - whether the label will be HTML-encoded. If set, supersedes the `encodeLabels` option for only this item;
    * `content` *(string)* - description content;
* `encodeLabel` *(boolean)* - whether the collpase items labels should be HTML-encoded;
* `vModel` *(string)* - directive to create two-way data bindings;
* `value` *(string|array)* - the name of the activated panel. Use `vModel` to enable a two-way binding;
* `accordion` *(boolean)* - Enable accordion effect or not. In this mode, you can only spread one panel each time. Default `false`;
* `events` *(array)* - collapse events: 
	* `on-change` - emit when panel is switched. Return the key of the spread panel(s) in an array.

## Example

```php
<?php

use antkaz\iview\Collapse;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-collapse">
    <?php Vue::begin() ?>

    <?= Collapse::widget([
        'id' => 'collapse',
        'value' => 'first',
        'items' => [
            ['label' => 'title 1', 'content' => 'panel 1', 'name' => 'first'],
            ['label' => 'title 2', 'content' => 'panel 2', 'name' => 'second'],
        ],
    ]) ?>

    <?php Vue::end() ?>
</div>
```