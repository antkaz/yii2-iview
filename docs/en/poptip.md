# Tooltip

This widget renders the IView Poptip. [Demo and API](https://www.iviewui.com/components/poptip-en)

Poptip is simlar to Tooltip. It has many common configurations. The difference is Poptip contains more content in a card style, such as link, table and button.

Poptip can also contain a confirm dialog. Different to Modal. It'll be shown beside the nearest element, so it's relatively lighter.

## Options

* `body` *(string)* - the body content in the Poptip component;
* `trigger` *(string)* - the trigger. Optional value (In `confirm` mode, only `click` works):
    * `Poptip::TRIGGER_CLICK` or `'click'` (default);
    * `Poptip::TRIGGER_HOVER` or `'hover'`;
    * `Poptip::TRIGGER_FOCUS` or `'focus'`;
* `title` *(string)* - the title of Poptip;
* `content` *(string)* - the content of Poptip. In `confirm` mode, it'll be ignored;
* `placement` *(string)* - to set the position. Supports automatic recognition after 2.12.0. Position can be one of 
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
* `width` *(string|int)* - The width of the Зoptip. The minimal width allowed is 150px. The maximum width by default in `confirm` mode is 300px;
* `confirm` *(bool)* - enable confirm mode or not. Default `false`;
* `okText` *(string)* - text in OK button. It only works in `confirm` mode. Default `Ok`;
* `cancelText` *(string)* - text in Cancel button. It only works in `confirm` mode. Default `Cancel`;
* `transfer` *(bool)* - whether to append the layer in body. When used in Tabs or a fixed Table column, suggests adding this property, 
it will not be affected by the parent style, resulting in better results. Default `false`;
* `popperClass` *(string)* - setting class-name for Poptip, it is useful when using `transfer`;
* `slot` *(array)* - Poptip Slot:
    * `'title'` *(string)* - title. It'll convert title prop;
    * `'titleOptions'` *(array)* - the HTML tag with attributes in terms of name-value pairs;
    * `'content'` *(string)* - the contents of the Poptip. It'll convert content props. It'll be ignored in `confirm` mode;
    * `'contentOptions'` *(array)* - the HTML tag with attributes in terms of name-value pairs;
    
## Example

```php
<?php

use antkaz\iview\Button;
use antkaz\iview\IViewAsset;
use antkaz\iview\Poptip;

IViewAsset::register($this);
?>
<div class="iview-poptip">

     <div>
    
        <?= Poptip::widget([
            'placement' => 'top',
            'body' => Button::widget(['label' => 'Button']),
            'title' => 'Title',
            'content' => 'Poper content'
        ]) ?>
    
    </div>

</div>
```

You can wrap content between calls `begin()` and `end()` as shown in the following example:

```php
<?php

use antkaz\iview\Button;
use antkaz\iview\IViewAsset;
use antkaz\iview\Poptip;

IViewAsset::register($this);
?>
<div class="iview-tooltip">

    <?php Poptip::begin([
        'placement' => 'right'
    ]) ?>
    
    <?= Button::widget(['label' => 'Table']) ?>

    <div class="api" slot="content">
        <table class="table">
            <thead>
            <tr>
                <th>Version</th>
                <th>Update Time</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>0.9.5</td>
                <td>2016-10-26</td>
                <td>Add new components <code>Tooltip</code> and <code>Poptip</code></td>
            </tr>
            <tr>
                <td>0.9.4</td>
                <td>2016-10-25</td>
                <td>Add new components <code>Modal</code></td>
            </tr>
            <tr>
                <td>0.9.2</td>
                <td>2016-09-28</td>
                <td>Add new components <code>Select</code></td>
            </tr>
            </tbody>
        </table>
    </div>

    <?php Poptip::end() ?>

</div>
```