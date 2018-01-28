<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Renders the Alert component
 *
 * @see https://www.iviewui.com/components/alert-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Alert extends Widget
{
    const TYPE_INFO = 'info';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    const TYPE_ERROR = 'error';

    /**
     * @var string The body content in the alert component.
     */
    public $body;

    /**
     * @var string Alert style, alternative value: `info`, `success`, `warning`, `error`.
     */
    public $type;

    /**
     * @var bool Show Icon or not. Default `false`.
     */
    public $showIcon = false;

    /**
     * @var bool Closable or not. Default `false`.
     */
    public $closable = false;

    /**
     * @var array Alert slot:
     * - desc: string, alert assistant text description;
     * - icon: string, customized icon type. Required `showIcon`;
     * - close: string, customized close content Required `closable`.
     */
    public $slot = [];

    /**
     * @inheritdoc
     */
    protected function initComponentProps()
    {
        if ($this->type) {
            $this->componentProps['type'] = $this->type;
        }

        if ($this->showIcon) {
            $this->componentProps['show-icon'] = true;
        }

        if ($this->closable) {
            $this->componentProps['closable'] = true;
        }
    }

    /**
     * Renders the alert widget.
     *
     * @return string
     */
    public function run()
    {
        return $this->renderAlert();
    }

    /**
     * Prepares and returns the alert widget.
     *
     * @return string
     */
    private function renderAlert()
    {
        $body = $this->body;

        if (isset($this->slot['icon'])) {
            $body .= Html::tag('icon', '', [
                'type' => Html::encode($this->slot['icon']),
                'slot' => 'icon'
            ]);
        }

        if (isset($this->slot['desc'])) {
            $body .= Html::tag('span', $this->slot['desc'], ['slot' => 'desc']);
        }

        if (isset($this->slot['close'])) {
            $body .= Html::tag('span', $this->slot['close'], ['slot' => 'close']);
        }

        $options = ArrayHelper::merge($this->options, $this->componentProps);
        return Html::tag('alert', $body, $options);
    }
}