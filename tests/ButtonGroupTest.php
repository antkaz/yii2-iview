<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Button;
use antkaz\iview\ButtonGroup;

/**
 * Test case for antkaz\iview\ButtonGroup.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class ButtonGroupTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $config
     * @param $expected
     */
    public function testButtonGroupOptions($config, $expected)
    {
        ob_start();
        ButtonGroup::begin($config);
        echo Button::widget([
            'label' => 'Button',
            'options' => [
                'id' => 'btn'
            ]
        ]);
        ButtonGroup::end();

        $buttonGroup = ob_get_clean();

        $this->assertEqualsWithoutLE($expected, $buttonGroup);
    }

    /**
     * Data provider for testButtonGroupOptions
     *
     * @return array test data.
     */
    public function dataProvider()
    {
        return [
            'Size' => [
                [
                    'size' => ButtonGroup::SIZE_LARGE,
                    'options' => [
                        'id' => 'btn-group'
                    ]
                ],
                '<button-group id="btn-group" size="large"><i-button id="btn">Button</i-button></button-group>'
            ],
            'Shape' => [
                [
                    'shape' => ButtonGroup::SHAPE_CIRCLE,
                    'options' => [
                        'id' => 'btn-group'
                    ]
                ],
                '<button-group id="btn-group" shape="circle"><i-button id="btn">Button</i-button></button-group>'
            ],
            'Vertical' => [
                [
                    'vertical' => true,
                    'options' => [
                        'id' => 'btn-group'
                    ]
                ],
                '<button-group id="btn-group" vertical><i-button id="btn">Button</i-button></button-group>'
            ]
        ];
    }
}
