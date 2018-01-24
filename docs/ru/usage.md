# Использование

После установки расширения, просто используйте его в своем коде:

```php
<?php

use \antkaz\iview\IView;
use \yii\web\JsExpression;
?>
<div class="iview">
    <?php IView::begin([
        'vueOptions' => [
            'data' => new JsExpression('function() { return {visible: false};}'),
            'methods' => [
                'show' => new JsExpression('function() {this.visible = true;}')
            ]
        ]
    ]); ?>
    
    <i-button @click="show">Click me!</i-button>
    <Modal v-model="visible" title="Welcome">Welcome to iView</Modal>

    <?php IView::end() ?>
</div>
```

В приведенном выше примере отображается кнопка. При нажатии на эту кнопку открывается модальное окно.