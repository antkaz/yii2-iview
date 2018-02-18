# Modal

Выводит модальное окно. [Примеры и API](https://www.iviewui.com/components/modal-en)

Модальное окно отображается в плавающем слое. Он используется для указания пользователю определенных операций.
Модальное окно обеспечивает два режима использования: обычный компонент и с использованием инкапсулированного вызова экземпляра.

## Options

* `title` *(string)* - заголовок модального окна. Не действует, если задан `slot` `header`;
* `body` *(string)* - содержимое модального окна;
* `vModel` *(string)* - директива для создания вдухстороннего связывания;
* `value` *(bool)* - показать модальное окно или нет. Используйте свойство `vModel` для включения двухстороннего связывания. 
По умолчанию `false`;
* `closable` *(bool)* - отображать кноку закрытыя в правой части или нет. 
Закрытие по клавише ESC будет не доступно, если свойтсво установлено в false. По умолчанию `true`;
* `maskClosable` *(bool)* - разрешить операцию закрытия по маске (Клик по маске вокруг модального окна) или нет. По умолчанию `true`;
* `loading` *(bool)* - показать статус загрузки или нет при нажатии кнопки подтверждения.
Если установлено `true`, для закрытия модального окна необходимо установить директиву для двустороннего связывания в `false`. 
По умолчанию `false`;
* `scrollable` *(bool)* - разрешить скроллинг или нет. По умолчанию `false`;
* `okText` *(string)* - текст кнопки подтверждения. По умолчанию `OK`;
* `cancelText` *(string)* - текст кнопки отмены. По умолчанию `Cancel`;
* `width` *(int|string)* - ширина модального окна;
Это свойство изменится на `auto`, когда размер экрана меньше 768 пикселей. 
Оно будет отображаться в процентах, если меньше 100, в противном случае - это пиксель. По умолчанию `520`;
* `styles` *(string)* - задает стиль слоя. Свойство задает стиль для .ivu-modal;
* `className` *(string)* - имя класса для обертки модального окна - класса .ivu-modal-wrap. 
Оно может использоваться для пользовательских стилей, например как вертикальное выравнивание по центру;
* `transitionNames` *(array)* - пользовательский переход. Первый переход для модального окна, второй - для фона.
По умолчанию `['ease', 'fade']`;
* `slot` *(array)* - слоты модального окна:
    * `'header'` *(string)* - пользовательский заголовок;
    * `'close'` *(string)* - пользовательская область закрытия (в правом верхнем углу);
    * `'footer'` *(string)* - пользовательский подвал;
* `events` *(array)* - события модального окна:
    * `on-ok` - вызывается, когда нажата кнопка подтверждения;
    * `on-cancel` - вызывается, когда нажата кнопка отмены;
    * `on-visible-change` - вызывается каждый раз, когда изменяется статус отображения. Возвращает `true` / `false`

## Пример

```php
<?php

use antkaz\iview\Button;
use antkaz\iview\IViewAsset;
use antkaz\iview\Modal;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-modal">
    <?php Vue::begin([
        'data' => [
            'visible' => false
        ],
        'methods' => [
            'show' => 'function() {this.visible = true;}'
        ]
    ]) ?>

    <?= Button::widget([
        'label' => 'Show modal dialog',
        'events' => [
            'click' => 'show'
        ]
    ]) ?>

    <?= Modal::widget([
        'body' => '<p>Content of dialog</p><p>Content of dialog</p><p>Content of dialog</p>',
        'className' => 'custom-modal',
        'transitionNames' => ['ease', 'fade'],
        'title' => 'modal',
        'vModel' => 'visible'
    ]); ?>

    <?php Vue::end() ?>
</div>
```

Вы можете обернуть содержимое модального кона между вызовом `begin()` и `end()` как показано в следующем примере:

```php
<?php

use antkaz\iview\Button;
use antkaz\iview\IViewAsset;
use antkaz\iview\Modal;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>

<div class="iview-modal">
    <?php Vue::begin([
        'data' => [
            'visible' => false
        ],
        'methods' => [
            'show' => 'function() {this.visible = true;}'
        ]
    ]) ?>
    
    <?= Button::widget([
        'label' => 'Show modal dialog',
        'events' => [
            'click' => 'show'
        ]
    ]) ?>


    <?php Modal::begin([
        'title' => 'Modal'
    ]) ?>

    <p>Content of dialog</p>

    <?php Modal::end() ?>

    <?php Vue::end() ?>
</div>
```