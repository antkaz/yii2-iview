<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Button;

/**
 * Test case for antkaz\iview\Button.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class ButtonTest extends TestCase
{

    /**
     * @dataProvider dataProvider
     *
     * @param $config Button widget configs.
     * @param $expected Expected HTML code.
     */
    public function testButtonOptions($config, $expected)
    {
        $button = Button::widget($config);

        $this->assertEqualsWithoutLE($expected, $button);
    }

    /**
     * Data provider for testButtonOptions.
     *
     * @return array test data.
     */
    public function dataProvider()
    {
        return [
            'Types' => [
                [
                    'label' => 'Primary',
                    'type' => Button::TYPE_PRIMARY,
                ],
                '<i-button type="primary" id="w0">Primary</i-button>'
            ],
            'Icons & Shapes' => [
                [
                    'label' => 'Icons & Shapes',
                    'shape' => Button::SHAPE_CIRCLE,
                    'icon' => 'ios-search'
                ],
                '<i-button id="w1" shape="circle" icon="ios-search">Icons & Shapes</i-button>'
            ],
            'Size' => [
                [
                    'label' => 'Size',
                    'size' => Button::SIZE_LARGE
                ],
                '<i-button id="w2" size="large">Size</i-button>'
            ],
            'Long Button' => [
                [
                    'label' => 'Long Button',
                    'long' => true
                ],
                '<i-button id="w3" long>Long Button</i-button>'
            ],
            'Loading & Disabled' => [
                [
                    'label' => 'Loading & Disabled',
                    'loading' => true,
                    'disabled' => true
                ],
                '<i-button id="w4" disabled loading>Loading & Disabled</i-button>'
            ],
            'htmlType & encodeLabel' => [
                [
                    'label' => '<b>Encode</b>',
                    'encodeLabel' => true,
                    'htmlType' => Button::HTML_TYPE_SUBMIT
                ],
                '<i-button id="w5" html-type="submit">&lt;b&gt;Encode&lt;/b&gt;</i-button>'
            ]
        ];
    }
}