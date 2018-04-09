# Tag

This widget renders the IView Tag. [Demo and API](https://www.iviewui.com/components/tag-en)

Tag for categorizing or markuping

## Options

* `body` *(string)* - the body content in the Tag component;
* `closable` *(bool)* - tag can be closed. Default `false`;
* `checkable` *(bool)* - tag can be selected. Default `false`;
* `type` *(string)* - tag style type, the optional value for the:
    * `Tag::TYPE_BORDER` or `'border'`;
    * `Tag::TYPE_DOT` or `'dot'`;
* `color` *(string)* - tag color, default values for `blue`, `green`, `red`, `yellow`, `default`, you can set custom color;
* `events` *(array)* - tag events:
    * `on-close` - emitted when closed. Return `event`, `name`.
    
## Example

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tag;
use antkaz\vue\Vue;
use yii\web\JsExpression;

IViewAsset::register($this);
?>
<div class="iview-tag">
    <?php Vue::begin([
        'clientOptions' => [
            'data' => [
                'show' => true
            ],
            'methods' => [
                'handleClose' => new JsExpression('function() {this.show = false}')
            ]
        ]
    ]) ?>

    <?= Tag::widget([
        'body' => 'tag',
        'closable' => true,
        'checkable' => true,
        'options' => [
            'v-if' => 'show'
        ],
        'events' => [
            'on-close' => 'handleClose'
        ]
    ]); ?>

    <?php Vue::end() ?>
</div>
```