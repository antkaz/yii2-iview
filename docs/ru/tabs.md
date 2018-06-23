# Tabs

Виджет выводит компонент IView Tads. [Примеры и API](https://www.iviewui.com/components/tabs-en)

Табы позволяют легко переключаться между различными представлениями.

## Параметры

* `items` *(array)* - Список вкладок компонента. Каждый элемент массива представляет собой один таб, который может быть либо строкой,
либо массивом со следующей структурой:
    * `name` *(string)* - используется для идентификации текущей панели, соответствующей `value`;
    * `label` *(string)* - текст вкладки. Поддерживает функцию Render;    
    * `content` *(string)* - сотедржимое вкладки;    
    * `icon` *(string)* - иконка вкладки;    
    * `disabled` *(bool)* - отключить вкладку;    
    * `closable` *(bool)* - влкадка закрываема. Только для type=`card`;    
* `value` *(string)* - имя активного таба. По умолчанию имя первой вкладки;
* `type` *(string)* - базовый стиль вкладок:
    * `Tabs::TYPE_LINE` или `'line'` (по умолчанию);
    * `Tabs::TYPE_VARD` или `'card'`;
* `size` *(string)* - размер (только для type=`line`):
    * `Tabs::SIZE_DEFAULT` или `'default'` (по умолчанию);
    * `Tabs::SIZE_SMALL` или `'small'`;
* `closable` *(bool)* - вкладки закрываемые. Только для 'type'=`card`. По умолчанию `false`;
* `animated` *(bool)* - использовать анимацию CSS3. По умоланию `false`;
* `captureFocus` *(bool)* - будут ли компоненты формы во вкладках автоматически получать фокус. По умолчанию `false`;
* `events` *(array)* - события:
    * `on-click` - срабатывает при клике на вкладку. Возвращает `name`;
    * `on-tab-remove` - срабатывает при закрытии вкладки. Возвращает `name`.
 
## Пример

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tabs;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-tabs">

    <?php Vue::begin() ?>

    <?= Tabs::widget([
        'type' => Tabs::TYPE_CARD,
        'animated' => true,
        'size' => Tabs::SIZE_DEFAULT,
        'captureFocus' => true,
        'items' => [
            [
                'label' => 'one',
                'content' => 'panel one',
                'name' => 'one',
                'closable' => true,
            ],
            [
                'label' => 'two',
                'content' => 'panel two',
                'name' => 'two',
                'disabled' => true,
                'icon' => 'checkmark',
            ],
            '<tab-pane name="three" label="three">panel three</tab-pane>',
        ],
    ]) ?>

    <?php Vue::end() ?>
</div>
```

Вы можете обернуть содержимое между вызовами `begin()` и `end()` как показано в следующем примере:

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tabs;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-tabs">

    <?php Vue::begin() ?>

    <?php Tabs::begin([
        'value' => '1',
    ]) ?>

    <tab-pane label="1" name="1">one</tab-pane>
    <tab-pane label="2" name="2">two</tab-pane>
    <tab-pane label="3" name="3">three</tab-pane>

    <?php Tabs::end() ?>

    <?php Vue::end() ?>
</div>
```