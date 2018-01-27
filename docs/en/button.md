# Button

This widget renderes the Iview button. [Demo and API](https://www.iviewui.com/components/button-en)

## Button

### Options

* `label` *(string)* - button text;
* `encodeLabel` *(bool)* - whether the label will be HTML-encoded. Default `false`;
* `type` *(string)* - button type:
    * `Button::TYPE_GHOST` or `'ghost'`;
    * `Button::TYPE_DASHED` or `'dashed'`;
    * `Button::TYPE_TEXT` or `'text'`;
    * `Button::TYPE_PRIMARY` or `'primary'`;
    * `Button::TYPE_INFO` or `'info'`;
    * `Button::TYPE_SUCCESS` or `'success'`;
    * `Button::TYPE_WARNING` or `'warning'`;
    * `Button::TYPE_ERROR` or `'error'`;
* `size` *(string)* - button size:
    * `Button::SIZE_DEFAULT` or `'default'`;
    * `Button::SIZE_LARGE` or `'large'`;
    * `Button::SIZE_SMALL` or `'small'`;
* `shape` *(string)* - button shape:
    * `Button::SHAPE_CIRCLE` or `'circle'`;
* `long` *(bool)* - set the width of the button to 100%. Default `false`;
* `htmlType` *(string)* - set the button raw type:
    * `Button::HTML_TYPE_BUTTON` or `'button'`;
    * `Button::HTML_TYPE_SUBMIT` or `'submin'`;
    * `Button::HTML_TYPE_RESET` or `'reset'`;
* `disabled` *(bool)* - disable the button. Default `false`;
* `loading` *(bool)* - set the button to loading status. Default `false`;
* `icon` *(string)* - set the icons used in the button. The list of icons can be viewed [here](https://www.iviewui.com/components/icon-en).

### Example

```php
<?php
use antkaz\iview\Button;
?>
<div class="iview-button">
    
    <?= Button::widget([
        'label' => 'Submit',
        'type' => Button::TYPE_SUCCESS,
        'htmlType' => Button::HTML_TYPE_SUBMIT,
    ]) ?>

</div>
```

## ButtonGroup

### Options

* `size` *(string)* - ButtonGroup size:
    * `ButtonGroup::SIZE_DEFAULT` or `'default'`;
    * `ButtonGroup::SIZE_LARGE` or `'large'`;
    * `ButtonGroup::SIZE_SMALL` or `'small'`;
* `shape` *(string)* - ButtonGroup shape:
    * `ButtonGroup::SHAPE_CIRCLE` or `'circle'`;
* `vertical` *(bool)* - for vertical ButtonGroup. Default `false`.

### Example

```php
<?php
use antkaz\iview\Button;
use antkaz\iview\ButtonGroup;
?>
<div class="iview-button-group">

    <?php ButtonGroup::begin([
        'vertical' => true,
        'size' => ButtonGroup::SIZE_LARGE,
        'shape' => ButtonGroup::SHAPE_CIRCLE,
    ]) ?>

    <?= Button::widget([
        'label' => 'text'
    ]) ?>

    <?= Button::widget([
        'label' => 'Submit',
        'type' => Button::TYPE_SUCCESS,
        'htmlType' => Button::HTML_TYPE_SUBMIT,
    ]) ?>

    <?php ButtonGroup::end() ?>

</div>
```
