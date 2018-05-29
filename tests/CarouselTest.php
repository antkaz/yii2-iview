<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Carousel;

/**
 * Test case for antkaz\iview\Carousel.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class CarouselTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array  $config
     * @param string $expected
     */
    public function testCarouselOptions($config, $expected)
    {
        $carousel = Carousel::widget($config);

        $this->assertEqualsWithoutLE($expected, $carousel);
    }

    /**
     * Tests the contents enclosed in the begin() and end() in the Carousel widget.
     */
    public function testCarouselContent()
    {
        ob_start();

        Carousel::begin([
            'id' => 'carousel-widget',
            'arrow' => Carousel::ARROW_ALWAYS,
            'trigger' => Carousel::TRIGGER_CLICK,
            'dots' => Carousel::DOTS_NONE
        ]);

        echo '<carousel-item>one</carousel-item>';
        echo '<carousel-item>two</carousel-item>';
        echo '<carousel-item>three</carousel-item>';

        Carousel::end();

        $tooltip = ob_get_clean();
        $expected = '<carousel id="carousel-widget" dots="none" trigger="click" arrow="always">' .
            '<carousel-item>one</carousel-item>' .
            '<carousel-item>two</carousel-item>' .
            '<carousel-item>three</carousel-item>' .
            '</carousel>';

        $this->assertEqualsWithoutLE($expected, $tooltip);
    }

    /**
     * Data provider for testCarouselOptions.
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'items & value' => [
                [
                    'id' => 'carousel',
                    'items' => [
                        'one',
                        'two'
                    ],
                    'value' => '1'
                ],
                '<carousel id="carousel" value="1"><carousel-item>one</carousel-item><carousel-item>two</carousel-item></carousel>'
            ],
            'height & loop' => [
                [
                    'id' => 'carousel',
                    'items' => [
                        'one'
                    ],
                    'height' => '100px',
                    'loop' => true
                ],
                '<carousel id="carousel" height="100px" loop><carousel-item>one</carousel-item></carousel>'
            ],
            'autoplay & autoplaySpeed' => [
                [
                    'id' => 'carousel',
                    'items' => [
                        'one'
                    ],
                    'autoplay' => true,
                    'autoplaySpeed' => 1000
                ],
                '<carousel id="carousel" autoplay autoplay-speed="1000"><carousel-item>one</carousel-item></carousel>'
            ],
            'dots & radiusDot' => [
                [
                    'id' => 'carousel',
                    'items' => [
                        'one'
                    ],
                    'dots' => Carousel::DOTS_INSIDE,
                    'radiusDot' => true
                ],
                '<carousel id="carousel" dots="inside" radius-dot><carousel-item>one</carousel-item></carousel>'
            ],
            'trigger & arrow & easing' => [
                [
                    'id' => 'carousel',
                    'items' => [
                        'one'
                    ],
                    'trigger' => Carousel::TRIGGER_HOVER,
                    'arrow' => Carousel::ARROW_HOVER,
                    'easing' => 'ease'
                ],
                '<carousel id="carousel" trigger="hover" arrow="hover" easing="ease"><carousel-item>one</carousel-item></carousel>'
            ],
        ];
    }
}
