# Меню

Отображает навигационное меню для веб-страниц. [Примеры и API](https://www.iviewui.com/components/menu-en)

## Опции

 * `items` *(array)* - Массив элементов компонента Меню. 
Каждый элемент массива представляет собой один элемент меню, 
который может быть либо строкой, либо массивом со следующей структурой:
    * `name` *(string)* - уникальный идентификатор пункта меню (обязательный);
    * `label` *(string)* - метка пункта меню *(обязательный)*;
    * `active` *(boolean)* - будет ли пункт меню активным или нет;
    * `encode` *(boolean)* - будет ли метка закодирована в HTML. 
    Если установлено, заменяет параметр `encodeLabels` только для этого элемента.
    * `items` *(array)* - массив элементов подменю.
    Если элемент меню является строкой, он будет отображаться непосредственно без кодировки HTML.
 * `mode` *(string)* - мод меню:
	* `Menu::MODE_VERTICAL` или `'vertical'` - вертикальное меню *(по умолчанию)*;
	* `Menu::MODE_HORIZONTAL` или `'horizontal'` - горизонтальное меню;
 * `theme` *(string)* - Цветовая тема:
	 * `Menu::THEME_LIGHT` или `'light'` - легкая тема *(по умолчанию)*;
	 * `Menu::THEME_DARK` или `'dark'` - темная тема;
	 * `Menu::THEME_PRIMARY` или `'primary'` - основная тема. Может быть использована только если параметр `mode` = `Menu::MODE_HORIZONTAL`
* `openNames` *(array)* - массив имен раскрытых элементов подменю
* `accordion` *(boolean)* - Включить режим аккордеона или нет. Если `true`, только одно подменю можно развернуть одновременно;
* `width` *(string)* - ширина меню. Работает только если `mode` = `Menu::MODE_VERTICAL`. Рекомендуется использовать `auto`, если в макете используется `Col`. По умолчанию `240px`;
* `encodeLabel` *(boolean)* - будут ли метки закодирована в HTML;
* `events` *(array)* - события компонента Меню: 
	* `on-select` - возникает, когда выбирается пункт меню;
	* `on-open-change` - возникает, когда разворачивается/сворачивается подменю.

## Пример

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Menu;
use antkaz\vue\Vue;
use yii\web\JsExpression;

IViewAsset::register($this);
?>

<div class="iview-menu">
    <?php Vue::begin([
        'clientOptions' => [
            'methods' => [
                'select' => new JsExpression("function(name) { console.log('Select item ' + name) }")
            ]
        ]
    ]) ?>

    <?= Menu::widget([
        'items' => $items,
        'mode' => Menu::MODE_HORIZONTAL,
        'accordion' => true,
        'encodeLabel' => false,
        'events' => [
            'on-select' => 'select'
        ]
    ]); ?>

    <?php Vue::end() ?>
</div>
```