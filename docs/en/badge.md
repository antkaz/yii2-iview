# Badge

This widget renders the Badge component. [Demo and API](https://www.iviewui.com/components/badge-en)

Mainly used to set a corner mark to notice the count of unread messages, remind user to read.

## Options

* `body` *(string)* - badge body;
* `count` *(int|string)* - count to be shown. Show ${overflowCount}+ if bigger than `overflowCount`. Hide if 0. Use string for creating two-way data bindings;
* `overflowCount` *(int|string)* - maximal count that is allowed to be shown. Use string for creating two-way data bindings. Default `99`;
* `dot` *(bool)* - only a red dot without count. Set `count` to 0 to hide the dot. Default `false`;
* `className` *(string)* - customized class name, Invalid if `dot` set true.

## Example

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Badge;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-badge">
    <?php Vue::begin() ?>

    <?= Badge::widget([
        'body' => 'Avatar',
        'dot' => true,
    ]) ?>

    <?php Vue::end() ?>
</div>
```

You can wrap content between calls `begin()` and `end()` as shown in the following example:

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Badge;
use antkaz\iview\Avatar;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-badge">
    <?php Vue::begin() ?>

    <?php Badge::begin([
        'dot' => true,
    ]) ?>
    
    <?= Avatar::widget([
            'body' => 'Avatar',
            'options' => [
                'style' => [
                    'background' => '#87d068'
                ]
            ]
        ]) ?>
    
    <?php Badge::end() ?>


    <?php Vue::end() ?>
</div>
```
