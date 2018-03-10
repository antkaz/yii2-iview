# Кнопка

Данный виджет позволяет отобразить кнопку Iview. [Примеры и API](https://www.iviewui.com/components/button-en)

## Кнопка

### Опции

* `label` *(string)* - текст кнопки;
* `encodeLabel` *(bool)* - будет ли метка закодирована в HTML. По умолчанию `false`;
* `type` *(string)* - тип кнопки:
    * `Button::TYPE_GHOST` или `'ghost'`;
    * `Button::TYPE_DASHED` или `'dashed'`;
    * `Button::TYPE_TEXT` или `'text'`;
    * `Button::TYPE_PRIMARY` или `'primary'`;
    * `Button::TYPE_INFO` или `'info'`;
    * `Button::TYPE_SUCCESS` или `'success'`;
    * `Button::TYPE_WARNING` или `'warning'`;
    * `Button::TYPE_ERROR` или `'error'`;
* `size` *(string)* - размер кнопки:
    * `Button::SIZE_DEFAULT` или `'default'`;
    * `Button::SIZE_LARGE` или `'large'`;
    * `Button::SIZE_SMALL` или `'small'`;
* `shape` *(string)* - форма кнопки:
    * `Button::SHAPE_CIRCLE` или `'circle'`;
* `long` *(bool)* - задает кнопке ширину 100%. По умолчанию `false`;
* `htmlType` *(string)* - задает тип кнопки в атрибуте `type`:
    * `Button::HTML_TYPE_BUTTON` или `'button'`;
    * `Button::HTML_TYPE_SUBMIT` или `'submin'`;
    * `Button::HTML_TYPE_RESET` или `'reset'`;
* `disabled` *(bool)* - будет ли кнопка отключена. По умолчанию `false`;
* `loading` *(bool)* - будет ли кнопка в состоянии загрузки. По умолчанию `false`;
* `icon` *(string)* - задает иконку для кнопки. Список иконок пожно посмотреть [здесь](https://www.iviewui.com/components/icon-en).

### Пример

```php
<?php

use antkaz\iview\Button;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>

<div class="iview-button">
    <?php Vue::begin() ?>

    <?= Button::widget([
        'label' => 'text'
    ]) ?>

    <?= Button::widget([
        'label' => 'Submit',
        'type' => Button::TYPE_SUCCESS,
        'htmlType' => Button::HTML_TYPE_SUBMIT,
    ]) ?>

    <?php Vue::end() ?>
</div>
```

## Группа кнопок

### Опции

* `size` *(string)* - размер кнопок:
    * `ButtonGroup::SIZE_DEFAULT` или `'default'`;
    * `ButtonGroup::SIZE_LARGE` или `'large'`;
    * `ButtonGroup::SIZE_SMALL` или `'small'`;
* `shape` *(string)* - форма кнопок:
    * `ButtonGroup::SHAPE_CIRCLE` или `'circle'`;
* `vertical` *(bool)* - расположить кнопки вертикально. По умолчанию `false`.

### Пример

```php
<?php

use antkaz\iview\Button;
use antkaz\iview\ButtonGroup;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>

<div class="iview-button-group">
    <?php Vue::begin() ?>

    <?php ButtonGroup::begin([
        'vertical' => true,
        'size' => ButtonGroup::SIZE_LARGE,
        'shape' => ButtonGroup::SHAPE_CIRCLE,
    ]) ?>

    <?= Button::widget([
        'label' => 'text'
    ]) ?>

    <?= Button::widget([
        'label' => 'Submit',
        'type' => Button::TYPE_SUCCESS,
        'htmlType' => Button::HTML_TYPE_SUBMIT,
    ]) ?>

    <?php ButtonGroup::end() ?>

    <?php Vue::end() ?>
</div>
```
