# Usage

After installing the extension, just use it in your code:

```php
<?php

use antkaz\iview\IViewAsset;
use antkaz\vue\Vue;
use \yii\web\JsExpression;

IViewAsset::register($this);
?>

<div class="iview">
    <?php Vue::begin([
        'clientOptions' => [
            'data' => [
                'visible' => false
            ],
            'methods' => [
                'show' => new JsExpression('function() {this.visible = true;}')
            ]
        ]
    ]) ?>

    <i-button @click="show">Click me!</i-button>
    <Modal v-model="visible" title="Welcome">Welcome to iView</Modal>

    <?php Vue::end() ?>
</div>
```

The above example displays a button. Clicking this button opens a modal window.