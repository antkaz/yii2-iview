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
 * Renders the Card component
 *
 * @see https://www.iviewui.com/components/alert-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Card extends Widget
{
    /**
     * @var string The body content in the Card component.
     */
    public $body;

    /**
     * @var bool Show the border or not, recommend setting to true when background color is gray. Default true.
     */
    public $bordered;

    /**
     * @var bool Disable mouse hover shadow. Default false.
     */
    public $disHover = false;

    /**
     * @var bool Card shadow, recommend using it when background color is gray. Default false.
     */
    public $shadow = false;

    /**
     * @var int Padding of the card. Unit: px. Default 16
     */
    public $padding;

    /**
     * @var string Custoimzed card title.
     */
    public $title;

    /**
     * @var array Card slot Extra:
     * - tag: string, container tag name. Default `p`;
     * - content: string, extra contents, shown at the right head corner by default;
     * - options: array, The HTML tag attributes for the extra container tag.
     */
    public $extra;

    /**
     * @inheritdoc
     */
    protected function initComponentProps()
    {
        if ($this->bordered === false) {
            $this->componentProps[':bordered'] = 'false';
        }
        $this->componentProps['dis-hover'] = $this->disHover ? true : false;
        $this->componentProps['shadow'] = $this->shadow ? true : false;
        $this->componentProps['padding'] = $this->padding ?: false;
    }

    /**
     * @inheritdoc
     */
    protected function renderWidget()
    {
        if ($this->content) {
            $this->body .= $this->content;
        }

        return $this->renderCard();
    }

    /**
     * Prepares and returns the card widget
     *
     * @return string
     */
    private function renderCard()
    {
        $body = '';

        if ($this->title) {
            $body .= Html::tag('p', $this->title, ['slot' => 'title']);
        }

        if (is_array($this->extra)) {
            $tag = isset($this->extra['tag']) ? $this->extra['tag'] : 'p';
            $content = isset($this->extra['content']) ? $this->extra['content'] : '';
            $options = ['slot' => 'extra'];

            if (isset($this->extra['options']) && is_array($this->extra['options'])) {
                $options = ArrayHelper::merge($options, $this->extra['options']);
            }

            $body .= Html::tag($tag, $content, $options);
        }

        $body .= $this->body;
        $options = ArrayHelper::merge($this->options, $this->componentProps);

        return Html::tag('card', $body, $options);
    }
}