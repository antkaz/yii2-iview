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
* `iViewEvent` *(array)* - содержит список событий:
    * `on-close` - возникает, когда алерт будет закрыт.

## Пример

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


Вы можете обернуть содержимое между вызовами `begin()` и `end()`, как показано в следующем примере:

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
```