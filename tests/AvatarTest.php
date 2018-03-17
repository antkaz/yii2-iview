<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Avatar;

/**
 * Test case for antkaz\iview\Avatar.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class AvatarTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array $config
     * @param string $expected
     */
    public function testAvatarOptions($config, $expected)
    {
        $widget = Avatar::widget($config);

        $this->assertEqualsWithoutLE($expected, $widget);
    }

    /**
     * Tests the contents enclosed in the begin() and end() in Avatar widget.
     */
    public function testAlertContent()
    {
        ob_start();

        Avatar::begin([
            'options' => [
                'id' => 'avatar'
            ]
        ]);
        echo 'Avatar';
        Avatar::end();

        $widget = ob_get_clean();
        $expected = '<avatar id="avatar">Avatar</avatar>';

        $this->assertEqualsWithoutLE($expected, $widget);
    }

    /**
     * Data provider for testAvatarOptions.
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Empty options' => [
                [],
                '<avatar id="w0"></avatar>'
            ],
            'Shape & Size' => [
                [
                    'shape' => Avatar::SHAPE_SQUARE,
                    'options' => [
                        'id' => 'avatar'
                    ]
                ],
                '<avatar id="avatar" shape="square"></avatar>'
            ],
            'Icon' => [
                [
                    'icon' => 'person',
                    'options' => [
                        'id' => 'avatar'
                    ]
                ],
                '<avatar id="avatar" icon="person"></avatar>'
            ],
            'src' => [
                [
                    'src' => 'https://i.loli.net/2017/08/21/599a521472424.jpg',
                    'options' => [
                        'id' => 'avatar'
                    ]
                ],
                '<avatar id="avatar" src="https://i.loli.net/2017/08/21/599a521472424.jpg"></avatar>'
            ],
            'Custom body' => [
                [
                    'body' => 'Avatar',
                    'options' => [
                        'id' => 'avatar'
                    ]
                ],
                '<avatar id="avatar">Avatar</avatar>'
            ],
            'Style' => [
                [
                    'body' => 'Avatar',
                    'options' => [
                        'id' => 'avatar',
                        'style' => [
                            'background' => '#87d068'
                        ]
                    ]
                ],
                '<avatar id="avatar" style="background: #87d068;">Avatar</avatar>'
            ]
        ];
    }
}
