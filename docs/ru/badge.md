# Badge

Виджет выводит компонент Badge. [Примеры и API](https://www.iviewui.com/components/badge-en)

В основном используется для установки угловой метки для уведомления о количестве непрочитанных сообщений, напоминающих пользователю о чтении.

## Опции

* `body` *(string)* - тело значка;
* `count` *(int|string)* - количество. Будет показано ${overflowCount}+ если число в значке больше `overflowCount`. Не показывается, если 0. 
Используйте строковое значение для создания двухсторонней связи;
* `overflowCount` *(int|string)* - максимальное количество, которое разрешено показывать. Используйте строковое значение для создания двухсторонней связи. По умолчанию `99`;
* `dot` *(bool)* - показывает только красную точку без числа. Установите `count` в 0 чтобы скрыть точку. По умолчанию `false`;
* `className` *(string)* - имя настраиваемого класса. Не действительно, если `dot` установлен в `true`.

## Примеры

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Badge;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-badge">
    <?php Vue::begin() ?>

    <?= Badge::widget([
        'body' => 'Avatar',
        'dot' => true,
    ]) ?>

    <?php Vue::end() ?>
</div>
```

Вы можете обернуть содержимое между вызовом `begin()` и `end()` как показано на примере ниже:

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Badge;
use antkaz\iview\Avatar;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-badge">
    <?php Vue::begin() ?>

    <?php Badge::begin([
        'dot' => true,
    ]) ?>
    
    <?= Avatar::widget([
            'body' => 'Avatar',
            'options' => [
                'style' => [
                    'background' => '#87d068'
                ]
            ]
        ]) ?>
    
    <?php Badge::end() ?>


    <?php Vue::end() ?>
</div>
```
