# Carousel

Виджет выводит карусель IView. [Примеры и API](https://www.iviewui.com/components/carousel-en)

Обычно используется на множестве изображений или карточек.

## Options

* `items` *(array)* - элементы виджета CarouselItem;
* `value` *(int)* - индекс слайдера, начинается с 0. Используйте v-model для двухстороннего связывания данных. По умолчанию `0`;
* `height` *(string|int)* - высота карусели, `auto` или конкретное значение. Ед. изм.: px. По умолчанию `auto`;
* `loop` *(bool)* - включить цикл. По умолчанию `false`;
* `autoplay` *(bool)* - включить авто воспроизведение. По умолчанию `false`;
* `autoplaySpeed` *(int)* - временной интервал автовоспроизведения. Ед. изм: ms. По умолчанию `2000`;
* `dots` *(string)* - положение индикатора:
    * `Carousel::DOTS_INSIDE` или `'inside'` (По умолчанию);
    * `Carousel::DOTS_OUTSIDE` или `'outside'`;
    * `Carousel::DOTS_NONE` или `'none'`;
* `radiusDot` *(bool)* - включить круглые точки. По умолчанию `false`;
* `trigger` *(string)* - способ активации индикатора:
    * `Carousel::TRIGGER_CLICK` или `'click'` (По умолчанию);
    * `Carousel::TRIGGER_HOVER` или `'hover'`;
* `arrow` *(string)* - когда показывать стрелки:
    * `Carousel::ARROW_HOVER` или `'hover'` (По умолчанию);
    * `Carousel::ARROW_ALWAYS` или `'always'`;
    * `Carousel::ARROW_NEWER` или `'never'`;
* `easing` *(string)* - эффект анимации. По умолчанию `ease`;
* `events` *(array)* - события виджета: 
	* `on-change` - срабатывает, когда слайд изменен. Принимает 2 аргумента: индекс текущего слайда, индекс предыдущего слайда. Возвращает `oldValue`, `value`.
    
## Примеры

```php
<?php

use antkaz\iview\Carousel;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-carousel">

    <?php Vue::begin() ?>

    <?= Carousel::widget([
        'items' => [
            'one',
            'two',
            'free'
        ],
        'height' => '200px',
        'autoplay' => true,
        'radiusDot' => true
    ]) ?>

    <?php Vue::end() ?>
</div>
```

Вы можете обернуть содержимое между вызовами `begin()` and `end()` как показано на примере ниже:

```php
<?php

use antkaz\iview\Carousel;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-carousel">

    <?php Vue::begin() ?>

    <?php Carousel::begin() ?>
    

    <carousel-item>one</carousel-item>
    <carousel-item>two</carousel-item>
    <carousel-item>three</carousel-item>
    
    <?php Carousel::end() ?>

    <?php Vue::end() ?>
</div>
```