# Progress

Показывать текущий статус выполнения операции или задачи. [Примеры и API](https://www.iviewui.com/components/progress-en)

## Опции

* `body` *(string)* - пользовательский статус прогресса;
* `percent` *(int|string)* - процент. Используйте строковое значение для создания двухстороннего связывания;
* `status` *(string)* - статусы индикатора выполнения:
    * `Progress::STATUS_NORMAL` или `'normal'` (По умолчанию);
    * `Progress::STATUS_ACTIVE` или `'active'`;
    * `Progress::STATUS_WRONG` или `'wrong'`;
    * `Progress::STATUS_SUCCESS` или `'success'`;
* `strokeWidth` *(int)* - ширина индикатора выполнения. Ед. изм: px. По умолчанию `10`;
* `hideInfo` *(bool)* - Скрыть иконку статуса. По умолчанию `false`;
* `vertical` *(bool)* - Отображать в вертикальном направлении. По умолчанию `false`.

## Пример

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Progress;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-progress">
    <?php Vue::begin() ?>

    <div style="height: 100px">
        <?= Progress::widget([
            'percent' => 25,
            'status' => Progress::STATUS_ACTIVE,
            'strokeWidth' => 20,
            'hideInfo' => true,
            'vertical' => true,
        ]) ?>
    </div>
    
    <?php Vue::end() ?>
</div>
```

Вы можете обернуть содержимое между вызовом `begin()` и `end()`. 
В этом случае содержимое будет использоваться в качестве пользовательской иконки статуса:

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Progress;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-progress">
    <?php Vue::begin() ?>

    <?php Progress::begin([
        'options' => [
            'id' => 'progress'
        ]
    ]); ?>
    <span>test</span>
    <?php Progress::end(); ?>
    
    <?php Vue::end() ?>
</div>
```