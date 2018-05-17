# Tooltip

Виджет выводит компонент IView Poptip. [Примеры и API](https://www.iviewui.com/components/poptip-en)

Poptip аналогичен Tooltip и имеет много общих параметров. Разница заключается в том, что Poptip содержит больше стилей карты, такие как ссылка, таблица, кропка.

Poptip так же может содержать диалоговое окно подтверждения. В отличие от модального окна, Poptip будет показан рядом с ближайшим элементом, поэтому он относительно легче.

## Параметры

* `body` *(string)* - объект для подсказки;
* `trigger` *(string)* - триггер. Может принимать значение (В режиме `confirm` работет только `click`):
    * `Poptip::TRIGGER_CLICK` или `'click'` (по умолчанию);
    * `Poptip::TRIGGER_HOVER` или `'hover'`;
    * `Poptip::TRIGGER_FOCUS` или `'focus'`;
* `title` *(string)* - заголовок Poptip;
* `content` *(string)* - содержимое Poptip. В режиме `confirm` будет игнорироваться;
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
* `width` *(string|int)* - ширина Зoptip. Минимальная ширина может быть 150px. Максимальная ширина в режиме `confirm` 300px;
* `confirm` *(bool)* - включить режим подтверждения. По умолчанию `false`;
* `okText` *(string)* - текст кнопки ОК. Работает только в режиме `confirm`. По умолчанию `Oк`;
* `cancelText` *(string)* - Текст кнопки Отмена. Работает только в режиме `confirm`. По умолчанию `Отмена`;
* `transfer` *(bool)* - добавить слой в тело. При использовании в таблицах или в фиксированной таблице столбцов предлагается добавить это свойство,
это не повлияет на родительский стиль, но приведет к лучшим результатам. По умолчанию `false`;
* `popperClass` *(string)* - имя класса для Poptip, Полезно при использовании `transfer`;
* `slot` *(array)* - слоты Poptip:
    * `'title'` *(string)* - заголовок. Будет преобразовано в свойство Poptip;
    * `'titleOptions'` *(array)* - HTML-атрибуты слота title;
    * `'content'` *(string)* - содержимое Poptip. Будет преобразовано в свойство Poptip. В режиме `confirm` будет игнорироваться;
    * `'contentOptions'` *(array)* - HTML-атрибуты слота `title`;
    
## Примеры

```php
<?php

use antkaz\iview\Button;
use antkaz\iview\IViewAsset;
use antkaz\iview\Poptip;

IViewAsset::register($this);
?>
<div class="iview-poptip">

     <div>
    
        <?= Poptip::widget([
            'placement' => 'top',
            'body' => Button::widget(['label' => 'Button']),
            'title' => 'Title',
            'content' => 'Poper content'
        ]) ?>
    
    </div>

</div>
```

Вы можете обернуть содержимое между вызовом `begin()` и `end()` как показано в примере ниже:

```php
<?php

use antkaz\iview\Button;
use antkaz\iview\IViewAsset;
use antkaz\iview\Poptip;

IViewAsset::register($this);
?>
<div class="iview-tooltip">

    <?php Poptip::begin([
        'placement' => 'right'
    ]) ?>
    
    <?= Button::widget(['label' => 'Table']) ?>

    <div class="api" slot="content">
        <table class="table">
            <thead>
            <tr>
                <th>Version</th>
                <th>Update Time</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>0.9.5</td>
                <td>2016-10-26</td>
                <td>Add new components <code>Tooltip</code> and <code>Poptip</code></td>
            </tr>
            <tr>
                <td>0.9.4</td>
                <td>2016-10-25</td>
                <td>Add new components <code>Modal</code></td>
            </tr>
            <tr>
                <td>0.9.2</td>
                <td>2016-09-28</td>
                <td>Add new components <code>Select</code></td>
            </tr>
            </tbody>
        </table>
    </div>

    <?php Poptip::end() ?>

</div>
```