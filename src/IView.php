<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\helpers\Html;
use yii\base\Widget as YiiWidget;

/**
 * Render an IView components
 *
 * For example,
 *
 * ```php
 * echo IView::begin([
 *     'clientOptions' => [
 *         'data' => [
 *             'visible' => false
 *         ],
 *         'methods' => [
 *             'show' => new \yii\web\JsExpression('function() {this.visible = true;}')
 *         ]
 *     ]
 * ]); ?>
 *
 * <i-button @click="show">Click me!</i-button>
 * <Modal v-model="visible" title="Welcome">Welcome to iView</Modal>
 *
 * <?php IView::end() ?>
 * ```
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class IView extends YiiWidget
{
    use IViewTrait;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        $this->registerJs();

        ob_start();
        ob_implicit_flush(false);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $content = ob_get_clean();

        echo Html::beginTag('div', $this->options);
        echo $content;
        echo Html::endTag('div');
    }
}
