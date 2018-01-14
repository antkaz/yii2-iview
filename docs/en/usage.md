# Usage

After installing the extension, just use it in your code:

```php
<?php

use \antkaz\iview\IView;
?>
<div class="iview">
    <?php IView::begin([
        'clientOptions' => [
            'data' => [
                'visible' => false
            ],
            'methods' => [
                'show' => new \yii\web\JsExpression('function() {this.visible = true;}')
            ]
        ]
    ]); ?>
        <i-button @click="show">Click me!</i-button>
        <Modal v-model="visible" title="Welcome">Welcome to iView</Modal>
    
    <?php IView::end() ?>
</div>
```

The above example displays a button. Clicking this button opens a modal window.