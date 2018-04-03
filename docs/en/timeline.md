# Timeline

Renders the timeline widget. [Demo and API](https://www.iviewui.com/components/timeline-en)

Used to vertically display a series of information ordered by time.

## Options

* `pending` *(boolean)* - indicates if the last item is a ghost node. Default `false`.;
 * `items` *(array)* - List of timelineItems in the Timelime widget. Each array element represents a single timeline item with the following structure:
    * `content` *(string)* - description content;
    * `color` *(string)* - circle color. Can choose between `blue`, `red`, `green`, or custom defined. Default `blue`;
    * `dot` *(string)* - custom defined timeline item content.

## Example

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\iview\Timeline;
use antkaz\vue\Vue;

IViewAsset::register($this);
?>
<div class="iview-timeline">
    <?php Vue::begin() ?>

    <?= Timeline::widget([
        'pending' => true,
        'items' => [
            'First timelime item',
            [
                'content' => 'Second timeline item',
                'color' => 'red',
                'dot' => '<icon type="ionic"></icon>'
            ]
        ],
    ]) ?>

    <?php Vue::end() ?>
</div>
```