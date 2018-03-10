# Alert

Позволяет вывести компонент предупреждения IView. [Пример и API](https://www.iviewui.com/components/alert-en)

## Опции

* `body` *(string)* - текст алерта;
* `type` *(string)* - тип алерта:
    * `Alert::TYPE_INFO` или `'info'` (по умолчанию);
    * `Alert::TYPE_SUCCESS` или `'success'`;
    * `Alert::TYPE_WARNING` или `'warning'`;
    * `Alert::TYPE_ERRили` или `'errили'`;
* `showIcon` *(bool)* - будет показывать иконку или нет. По умолчанию `false`;
* `closable` *(bool)* - будет показывать кнопку закрытия или нет. По умолчанию `false`;
* `slot` *(array)* - слот алерта:
    * `'icon'` *(string)* - задает пользовательскую икноку;
    * `'desc'` *(string)* - содержимое алерта. В этом случае тект алерта будет выступать в качестве заголовка;
    * `'close'` *(string)* - задает пользовательский текст для кнопки закрытия;
* `events` *(array)* - содержит список событий:
    * `on-close` - возникает, когда алерт будет закрыт.

## Пример

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


Вы можете обернуть содержимое между вызовами `begin()` и `end()`, как показано в следующем примере:

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