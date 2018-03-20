# Collapse

Выводит виджет Collapse. [Примеры и API](https://www.iviewui.com/components/collapse-en)

Используется для сворачивания / разворачивания области содержимого.

## Опции

 * `items` *(array)* - Список панелей в виджете. Каждый элемент массива представляет собой одну панель со следующей структурой:
    * `name` *(string)* - имя текущей панели соответствует значению Collapse. Значение индекса будет использовано, если оно не заполнено;
    * `label` *(string)* - заголовок панели;
    * `encode` *(boolean)* - будет ли метка закодирована в HTML. Если установлено, то будет заменять опцию `encodeLabels` только для этого элемента;
    * `content` *(string)* - описание содержимого;
* `encodeLabel` *(boolean)* - будут ли заголовки панелей закодированы в HTML;
* `vModel` *(string)* - директива для создания двухстороннего связывания;
* `value` *(string|array)* - имя активной панели. Используйте `vModel` для включения двухстороннего связывания;
* `accordion` *(boolean)* - Включить режим аккордеона или нет. В этом режиме вы можете раскрыть только одну панель. По умолчанию `false`;
* `events` *(array)* - события Collapse: 
	* `on-change` - срабатывает, когда меняется панель. Возврат ключ панели(-ей), которые были развернуты.

## Пример

```php
<?php

use antkaz\iview\Collapse;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-collapse">
    <?php Vue::begin() ?>

    <?= Collapse::widget([
        'id' => 'collapse',
        'value' => 'first',
        'items' => [
            ['label' => 'title 1', 'content' => 'panel 1', 'name' => 'first'],
            ['label' => 'title 2', 'content' => 'panel 2', 'name' => 'second'],
        ],
    ]) ?>

    <?php Vue::end() ?>
</div>
```