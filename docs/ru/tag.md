# Tag

Виджет выводит тег IView. [Пример и API](https://www.iviewui.com/components/tag-en)

## Опции

* `body` *(string)* - содержимое тега;
* `closable` *(bool)* - тег может быть закрыт. По умолчанию `false`;
* `checkable` *(bool)* - тег может быть выделен. По умолчанию `false`;
* `type` *(string)* - тип тега, можно задать следующее значение:
    * `Tag::TYPE_BORDER` или `'border'`;
    * `Tag::TYPE_DOT` или `'dot'`;
* `color` *(string)* - цвет тега, по умолчанию значения `blue`, `green`, `red`, `yellow`, `default`. Вы можете задать свой цвет;
* `events` *(array)* - события:
    * `on-close` - срабатывает, когда тег закрывается. Возвращает `event`, `name`.
    
## Пример

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Tag;
use antkaz\vue\Vue;
use yii\web\JsExpression;

IViewAsset::register($this);
?>
<div class="iview-tag">
    <?php Vue::begin([
        'clientOptions' => [
            'data' => [
                'show' => true
            ],
            'methods' => [
                'handleClose' => new JsExpression('function() {this.show = false}')
            ]
        ]
    ]) ?>

    <?= Tag::widget([
        'body' => 'tag',
        'closable' => true,
        'checkable' => true,
        'options' => [
            'v-if' => 'show'
        ],
        'events' => [
            'on-close' => 'handleClose'
        ]
    ]); ?>

    <?php Vue::end() ?>
</div>
```