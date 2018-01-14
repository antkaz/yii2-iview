# Использование

После установки расширения, просто используйте его в своем коде:

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

В приведенном выше примере отображается кнопка. При нажатии на эту кнопку открывается модальное окно.