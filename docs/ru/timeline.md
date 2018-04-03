# Timeline

Выводит компонент временной шкалы (Timeline). [Примеры и API](https://www.iviewui.com/components/timeline-en)

Используется для вертикального отображения последовательности информации, упорядоченной по времени.

## Опции

* `pending` *(boolean)* - указывает, является ли последний элемент призрачным узлом. По умолчанию `false`.;
 * `items` *(array)* - список элементов виджета Timeline. Каждый элемент массива представляет один элемент временной шкалы со следующей структурой:
    * `content` *(string)* - описание содержимого;
    * `color` *(string)* - цвет круга. Можно использовать   `blue`, `red`, `green` или свой вариант. По умолчанию `blue`;
    * `dot` *(string)* - пользовательский элемент метки времени.

## Пример

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Timeline;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-timeline">
    <?php Vue::begin() ?>

    <?= Timeline::widget([
        'pending' => true,
        'items' => [
            'First timelime item',
            [
                'content' => 'Second timeline item',
                'color' => 'red',
                'dot' => '<icon type="ionic"></icon>'
            ]
        ],
    ]) ?>

    <?php Vue::end() ?>
</div>
```