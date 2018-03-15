# Alert

Renders the IView Alert. [Demo and API](https://www.iviewui.com/components/alert-en)

## Options

* `body` *(string)* - alert body;
* `type` *(string)* - alert style:
    * `Alert::TYPE_INFO` or `'info'` (default);
    * `Alert::TYPE_SUCCESS` or `'success'`;
    * `Alert::TYPE_WARNING` or `'warning'`;
    * `Alert::TYPE_ERROR` or `'error'`;
* `showIcon` *(bool)* - show Icon or not. Default `false`;
* `closable` *(bool)* - closable or not. Default `false`;
* `slot` *(array)* - Alert slot:
    * `'icon'` *(string)* - customized icon content;
    * `'desc'` *(string)* - alert assistant text description;
    * `'close'` *(string)* - customized close content;
* `events` *(array)* - the Alert component events:
    * `on-close` - emit when close the alert.

## Example

```php
<?php

use antkaz\iview\Alert;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;
use yii\web\JsExpression;

IViewAsset::register($this);
?>

<div class="iview-alert">
    <?php Vue::begin([
        'clientOptions' => [
            'methods' => [
                'log' => new JsExpression("function() { console.log('Close alert') }")
            ]
        ]
    ]) ?>

    <?= Alert::widget([
        'body' => 'Title',
        'type' => Alert::TYPE_SUCCESS,
        'showIcon' => true,
        'closable' => true,
        'slot' => [
            'icon' => 'ios-lightbulb-outline',
            'desc' => 'Alert description',
            'close' => 'close'
        ],
        'events' => [
           'on-close' => 'log'
        ],
    ]) ?>

    <?php Vue::end() ?>
</div>
```

You can wrap content between calls `begin()` and `end()` as shown in the following example:

```php
<?php

use antkaz\iview\Alert;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>

<div class="iview-alert">
    <?php Vue::begin() ?>

    <?php Alert::begin([
        'type' => Alert::TYPE_SUCCESS,
        'showIcon' => true,
        'closable' => true,
    ]) ?>

    An info prompt
    <template slot="desc">Content of prompt. Content of prompt. Content of prompt. Content of prompt.</template>

    <?php Alert::end() ?>

    <?php Vue::end() ?>
</div>
```