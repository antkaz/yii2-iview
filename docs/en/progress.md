# Progress

Show current progress status of the operation or task. [Demo and API](https://www.iviewui.com/components/progress-en)

## Options

* `body` *(string)* - customize how to show Progress's status;
* `percent` *(int|string)* - percentage. Use string for creating two-way data bindings;
* `status` *(string)* - progress's status:
    * `Progress::STATUS_NORMAL` or `'normal'` (default);
    * `Progress::STATUS_ACTIVE` or `'active'`;
    * `Progress::STATUS_WRONG` or `'wrong'`;
    * `Progress::STATUS_SUCCESS` or `'success'`;
* `strokeWidth` *(int)* - the width of the progress bar. Unit: px. Default `10`;
* `hideInfo` *(bool)* - Hide value/status icon. Default `false`;
* `vertical` *(bool)* - Whether to display in the vertical direction. Default `false`.

## Example

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

You can wrap content between calls `begin()` and `end()`. In this case, the content will be used as a custom status icon:

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