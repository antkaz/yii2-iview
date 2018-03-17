# Avatar

Этот виджет выводит компонент Avatar. [Примеры и API](https://www.iviewui.com/components/avatar-en)

Аватары могут использоваться для представления людей или объектов, которые поддерживают изображение, значок iView или букву.

## Опции

* `body` *(string)* - содержимое аватара;
* `shape` *(string)* - форма аватара:
    * `Avatar::SHAPE_CIRCLE` or `'circle'` (По умолчанию);
    * `Avatar::SHAPE_SQUARE` or `'square'`;
* `size` *(string)* - размер аватара:
    * `Avatar::SIZE_DEFAULT` or `'default'`;
    * `Avatar::SIZE_LARGE` or `'large'`;
    * `Avatar::SIZE_SMALL` or `'small'`;
* `src` *(string)* - адрес изображения для аватара;
* `icon` *(string)* - иконка аватара. Список иконок можете посмотреть [здесь](https://www.iviewui.com/components/icon-en).

## Пример

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
