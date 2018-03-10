# Card

This widget renders the IView Card. [Demo and API](https://www.iviewui.com/components/card-en)

## Options

* `body` *(string)* - card body;
* `bordered` *(bool)* - show the border or not, recommend setting to true when background color is gray. 
Default `true`;
* `disHover` *(bool)* - disable mouse hover shadow. Default `false`;
* `shadow` *(bool)* - card shadow, recommend using it when background color is gray. Default `false`;
* `padding` *(int)* - padding of the card. Unit: px. Default `16`;
* `title` *(string)* - custoimzed card title;
* `extra` *(array)* - card slot Extra:
    * `'tag'` *(string)* - container tag name. Default `p`;
    * `'content'` *(string)* - extra contents, shown at the right head corner by default;
    * `'options'` *(array)* - the HTML tag attributes for the extra container tag.

## Example

```php
<?php

use antkaz\iview\Card;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;

IViewAsset::register($this);

?>
<div class="iview-card">
    <?php Vue::begin() ?>

    <?= Card::widget([
        'title' => 'Card title',
        'extra' => [
            'tag' => 'a',
            'content' => 'Extra',
            'options' => [
                '@click.prevent' => 'change'
            ]
        ],
        'body' => 'Text card'
    ]) ?>

    <?php Vue::end() ?>
</div>
```

You can wrap content between calls `begin()` and `end()` as shown in the following example:

```php
<?php

use antkaz\iview\Card;
use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;

IViewAsset::register($this);

?>
<div class="iview-card">
    <?php Vue::begin() ?>

    <?php Card::begin([
        'shadow' => true
    ]) ?>

    <p slot="title">Card title</p>
    <p>Content card.</p>

    <?php Card::end() ?>

    <?php Vue::end() ?>
</div>
```