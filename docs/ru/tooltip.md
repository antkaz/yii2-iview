# Tooltip

Виджет выводит компонент IView Tooltip. [Примеры и API](https://www.iviewui.com/components/tooltip-en)

Простая текстовая всплывающая подсказка

Подсказка показывается когда курсор мыши на элементе и скрывается, когда курсор мыши пропадает с элемента. Tooltip не поддерживает сложный текст и операции.

Он может предоставить подскажку для кнопки / текста / операции, которые могут охватывать использование системы по умолчанию.

## Опции

* `body` *(string)* - содержимое виджета;
* `content` *(string)* - текст подсказки;
* `placement` *(string)* - позиция подсказки. Поддерживает автоматическое распознование после iview.js v2.12.0. Позиция может быть 
    * `top`, 
    * `top-start`, 
    * `top-end`, 
    * `bottom`, 
    * `bottom-start`, 
    * `bottom-end`, 
    * `left`, 
    * `left-start`, 
    * `left-end`, 
    * `right`, 
    * `right-start`, 
    * `right-end`;
* `disabled` *(bool|string)* - отключить всплывающую подсказку. Используйте строку для создания двухстороннего связывания. По умолчанию `false`;
* `delay` *(int)* - задержка отображения в милисекундах;
* `always` *(bool)* - всегда отображать. по умолчанию `false`;
* `transfer` *(bool)* - добавить слой в тело. При использовании в таблицах или в фиксированной таблице столбцов предлагается добавить это свойство,
это не повлияет на родительский стиль, но приведет к лучшим результатам. По умолчанию `false`;
* `slot` *(array)* - Tooltip слот:
    * `'default'` *(string)* - содержимое;
    * `'content'` *(string)* - текст подсказки. Когда этот слот определен, то параметр `content` будет переопределен;
    * `'contentOptions'` *(array)* - HTML-атрибуты для блока с подсказкой (slot='content');
    
## Примеры

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tooltip;

IViewAsset::register($this);
?>
<div class="iview-tooltip">

    <?= tooltip::widget([
        'delay' => 100,
        'placement' => 'top',
        'slot' => [
            'default' => \antkaz\iview\Button::widget(['label' => 'Button']),
            'content' => 'This is tooltip in button'
        ],
    ]) ?>

</div>
```

Вы можете обернуть содержимое между вызовом `begin()` и `end()` как показано в примере ниже:

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tooltip;

IViewAsset::register($this);
?>
<div class="iview-tooltip">

    <?php Tooltip::begin([
        'content' => 'This is tooltip'
    ]) ?>

    <p>This is content</p>

    <?php Tooltip::end() ?>

</div>
```