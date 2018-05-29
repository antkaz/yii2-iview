# Carousel

This widget renders the IView Carousel. [Demo and API](https://www.iviewui.com/components/carousel-en)

Usually used on a set of pictures or cards. Use Carousel to take in the content when lack of space.

## Options

* `items` *(array)* - list of CarouselItem in the Carousel widget;
* `value` *(int)* - index of the slider, starts from 0. Use v-model to enable a two-way binding on data. Default `0`;
* `height` *(string|int)* - the height of the carousel, `auto` or specific height value. Unit: px. Default `auto`;
* `loop` *(bool)* - enable loop. Default `false`;
* `autoplay` *(bool)* - enable auto play. Default `false`;
* `autoplaySpeed` *(int)* - time interval of the auto play. Unit: ms. Default `2000`;
* `dots` *(string)* - position of the in indicator:
    * `Carousel::DOTS_INSIDE` or `'inside'` (default);
    * `Carousel::DOTS_OUTSIDE` or `'outside'`;
    * `Carousel::DOTS_NONE` or `'none'`;
* `radiusDot` *(bool)* - enable radius dot type. Default `false`;
* `trigger` *(string)* - The way to activate the indicator:
    * `Carousel::TRIGGER_CLICK` or `'click'` (default);
    * `Carousel::TRIGGER_HOVER` or `'hover'`;
* `arrow` *(string)* - when to show switch arrow button:
    * `Carousel::ARROW_HOVER` or `'hover'` (default);
    * `Carousel::ARROW_ALWAYS` or `'always'`;
    * `Carousel::ARROW_NEWER` or `'never'`;
* `easing` *(string)* - animation effects. Default `ease`;
* `events` *(array)* - the Carousel widget events: 
	* `on-change` - emit when slide is changed. Transmit two arguments: Current activated slider index, previous slider index. Return `oldValue`, `value`.
    
## Example

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

You can wrap content between calls `begin()` and `end()` as shown in the following example:

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