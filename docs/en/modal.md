# Modal

Renders the IView Modal dialog. [Demo and API](https://www.iviewui.com/components/modal-en)

Modal dialog. It's shown in the floating layer. It's used to guide user do certain operations.
Modal provides two usages: normal component using & encapsulated instance calling.

## Options

* `title` *(string)* - the title of Modal. It is invalid if header slot is set;
* `body` *(string)* - modal dialog body;
* `vModel` *(string)* - directive to create two-way data bindings;
* `value` *(bool)* - display Modal or not. Use `vModel` attribute in options to enable two-way binding. Default `false`;
* `closable` *(bool)* - display the close button at the right top corner or not. ESC clicking-close will also be disabled if closable is set to false. Default `true`;
* `maskClosable` *(bool)* - allow mask-closing operation (Click mask layer around the Modal to close it) or not. Default `true`;
* `loading` *(bool)* - show loading status or not when clicking confirm button.
If it is set to `true`, modal has to be close manually by setting `visible` to `false`. Default `false`;
* `scrollable` *(bool)* - allow scrolling or not. Default `false`;
* `okText` *(string)* - OK button's text. Default `OK`;
* `cancelText` *(string)* - Cancel button's text. Default `Cancel`;
* `width` *(int|string)* - the width of Modal.
The width is responsive: It'll change to auto when the size of the screen is smaller than 768px.
It will be displayed as a percentage when the value less than 100, otherwise it is a pixel. Default `520`;
* `styles` *(string)* - set layer's style or adjust its position. The prop sets .ivu-modal's style;
* `className` *(string)* - set Modal's wrapper - .ivu-modal-wrap's class name. It can be used to assist to realise custom styles like vertical center;
* `transitionNames` *(array)* - custom transition. The first transition is Modal itself, the second is the background. Default `['ease', 'fade']`; 
* `slot` *(array)* - modal Slot:
    * `'header'` *(string)* - custom header;
    * `'close'` *(string)* - custom right-top closing area;
    * `'footer'` *(string)* - custom footer;
* `events` *(array)* - modal events:
    * `on-ok` - callback when clicking ok;
    * `on-cancel` - callback when clicking cancel;
    * `on-visible-change` - triggered when the display status changes. Return `true` / `false`.

## Example

```php
<?php

use antkaz\iview\Button;
use antkaz\iview\IViewAsset;
use antkaz\iview\Modal;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-modal">
    <?php Vue::begin([
        'data' => [
            'visible' => false
        ],
        'methods' => [
            'show' => 'function() {this.visible = true;}'
        ]
    ]) ?>

    <?= Button::widget([
        'label' => 'Show modal dialog',
        'events' => [
            'click' => 'show'
        ]
    ]) ?>

    <?= Modal::widget([
        'body' => '<p>Content of dialog</p><p>Content of dialog</p><p>Content of dialog</p>',
        'className' => 'custom-modal',
        'transitionNames' => ['ease', 'fade'],
        'title' => 'modal',
        'vModel' => 'visible'
    ]); ?>

    <?php Vue::end() ?>
</div>
```

You can wrap content between calls `begin()` and `end()` as shown in the following example:

```php
<?php

use antkaz\iview\Button;
use antkaz\iview\IViewAsset;
use antkaz\iview\Modal;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>

<div class="iview-modal">
    <?php Vue::begin([
        'data' => [
            'visible' => false
        ],
        'methods' => [
            'show' => 'function() {this.visible = true;}'
        ]
    ]) ?>
    
    <?= Button::widget([
        'label' => 'Show modal dialog',
        'events' => [
            'click' => 'show'
        ]
    ]) ?>


    <?php Modal::begin([
        'title' => 'Modal'
    ]) ?>

    <p>Content of dialog</p>

    <?php Modal::end() ?>

    <?php Vue::end() ?>
</div>
```