# Avatar

This widget renders the Avatar. [Demo and API](https://www.iviewui.com/components/avatar-en)

Avatars can be used to represent people or object, which supports image, iView-Icon, or letter

## Options

* `body` *(string)* - avatar body;
* `shape` *(string)* - avatar shape:
    * `Avatar::SHAPE_CIRCLE` or `'circle'` (Default);
    * `Avatar::SHAPE_SQUARE` or `'square'`;
* `size` *(string)* - avatar size:
    * `Avatar::SIZE_DEFAULT` or `'default'`;
    * `Avatar::SIZE_LARGE` or `'large'`;
    * `Avatar::SIZE_SMALL` or `'small'`;
* `src` *(string)* - the address of a image avatar;
* `icon` *(string)* - The icon type of a icon avatar. The list of icons can be viewed [here](https://www.iviewui.com/components/icon-en).

## Example

```php
<?php

use antkaz\iview\Avatar;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-avatar">
    <?php Vue::begin() ?>

    <?= Avatar::widget([
        'body' => 'Avatar',
        'size' => Avatar::SIZE_LARGE,
        'options' => [
            'style' => [
                'background' => '#87d068'
            ]
        ]
    ]) ?>

    <?php Vue::end() ?>
</div>
```
