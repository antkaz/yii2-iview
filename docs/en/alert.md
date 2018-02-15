# Alert

Renders the IView Alert. [Demo and API](https://www.iviewui.com/components/alert-en)

## Options

* `body` *(string)* - alert body;
* `type` *(string)* - alert style:
    * `Alert::TYPE_INFO` or `'info'` (default);
    * `Alert::TYPE_SUCCESS` or `'success'`;
    * `Alert::TYPE_WARNING` or `'warning'`;
    * `Alert::TYPE_ERRor` or `'error'`;
* `showIcon` *(bool)* - show Icon or not. Default `false`;
* `closable` *(bool)* - closable or not. Default `false`;
* `slot` *(array)* - Alert slot:
    * `'icon'` *(string)* - customized icon content;
    * `'desc'` *(string)* - alert assistant text description;
    * `'close'` *(string)* - customized close content;
* `iViewEvent` *(array)* - the Alert component events:
    * `on-close` - emit when close the alert.

## Example

```php
<?php
use antkaz\iview\Alert;
?>
<div class="iview-alert">

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
        'iViewEvents' => [
            'on-close' => '(event) => {console.log(event);}'
        ]
    ]) ?>

</div>
```
You can wrap content between calls `begin()` and `end()` as shown in the following example:

```php
<?php
use antkaz\iview\Alert;
?>
<div class="iview-card">

    <?php Alert::begin([
        'type' => Alert::TYPE_SUCCESS,
        'showIcon' => true,
        'closable' => true,
    ]) ?>
        <p slot="title">Alert content</p>
    <?php Aleert::end() ?>

</div>