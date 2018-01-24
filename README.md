<p align="center">
    <a href="https://www.iviewui.com/" target="_blank" rel="external">
        <img src="https://file.iviewui.com/dist/76ecb6e76d2c438065f90cd7f8fa7371.png" >
    </a>
    <h1 align="center">IVIew Extension for Yii2</h1>
    <br>
</p>

This is the <a href="https://www.iviewui.com/" target="_blank">IView</a> UI extension based on <a href="https://vuejs.org/" target="_blank">Vue.js</a> for Yii2.
It allows you to use the components of the IView library in your application.

Documentation:
* [Russian](docs/ru/README.md)
* [English](docs/en/README.md)

# Installation

The preferred way to install this extension is through composer.

Run

```bash
php composer.phar require antkaz/yii2-iview
```

or add

```
"antkaz/yii2-iview": "dev-master"
```

to the **require** section of your `composer.json` file.

## Usage

After installing the extension, just use it in your code:

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

The above example displays a button. Clicking this button opens a modal window.
