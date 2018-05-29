<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\iview;

use yii\base\InvalidConfigException;
use yii\helpers\Html;

/**
 * Renders the Carousel component
 *
 * @see https://www.iviewui.com/components/carousel-en
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\iview
 */
class Carousel extends Widget
{
    const DOTS_INSIDE = 'inside';
    const DOTS_OUTSIDE = 'outside';
    const DOTS_NONE = 'none';

    const TRIGGER_CLICK = 'click';
    const TRIGGER_HOVER = 'hover';

    const ARROW_HOVER = 'hover';
    const ARROW_ALWAYS = 'always';
    const ARROW_NEWER = 'newer';

    /**
     * @var array List of CarouselItem in the Carousel widget.
     */
    public $items;

    /**
     * @var int Index of the slider, starts from 0. Use v-model to enable a two-way binding on data. Default `0`.
     */
    public $value;

    /**
     * @var string|int The height of the carousel, 'auto' or specific height value. Unit: px. Default `auto`.
     */
    public $height;

    /**
     * @var bool Enable loop. Default `false`.
     */
    public $loop = false;

    /**
     * @var bool Enable auto play. Default `false`.
     */
    public $autoplay = false;

    /**
     * @var int Time interval of the auto play. Unit: ms. Default `2000`
     */
    public $autoplaySpeed;

    /**
     * @var string Position of the in indicator. Optional value: `inside`, `outside`, `none`.
     */
    public $dots;

    /**
     * @var bool Enable radius dot type. Default `false`.
     */
    public $radiusDot = false;

    /**
     * @var string The way to activate the indicator. Optional value: `click`, `hover`. Default `click`.
     */
    public $trigger;

    /**
     * @var string When to show switch arrow button. Optional value: `hover`, `always`, `never`. Default `hover`.
     */
    public $arrow;

    /**
     * @var string Animation Effects. Default `ease`.
     */
    public $easing;

    /**
     * @inheritdoc
     */
    public function initOptions()
    {
        parent::initOptions();

        $this->options['value'] = $this->value ?: false;
        $this->options['height'] = $this->height ?: false;
        $this->options['loop'] = $this->loop ? true : false;
        $this->options['autoplay'] = $this->autoplay ? true : false;
        $this->options['autoplay-speed'] = $this->autoplaySpeed ?: false;
        $this->options['dots'] = $this->dots ?: false;
        $this->options['radius-dot'] = $this->radiusDot ? true : false;
        $this->options['trigger'] = $this->trigger ?: false;
        $this->options['arrow'] = $this->arrow ?: false;
        $this->options['easing'] = $this->easing ?: false;
    }

    /**
     * Renders the widget.
     *
     * @return string Returns the rendering result.
     */
    protected function renderWidget()
    {
        if ($this->items === null) {
            return $this->renderCarousel($this->wrapperContent);
        }

        return $this->renderCarousel($this->prepareContent());
    }

    /**
     * Prepared content from items.
     *
     * @return string The HTML code.
     * @throws InvalidConfigException
     */
    private function prepareContent()
    {
        if (!is_array($this->items)) {
            throw new InvalidConfigException("The 'items' option are not an array");
        }

        $content = '';
        foreach ($this->items as $item) {
            $content .= Html::tag('carousel-item', $item);
        }

        return $content;
    }

    /**
     * Returns the HTML code for the Carousel widget.
     *
     * @param string $content Carousel items.
     *
     * @return string The HTML code.
     */
    private function renderCarousel($content)
    {
        return Html::tag('carousel', $content, $this->options);
    }
}