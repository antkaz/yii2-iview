<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Alert;

/**
 * Test case for antkaz\iview\Alert.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class AlertTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array $config
     * @param string $expected
     */
    public function testAlertOptions($config, $expected)
    {
        $alert = Alert::widget($config);

        $this->assertEqualsWithoutLE($expected, $alert);
    }

    /**
     * Tests the contents enclosed in the begin() and end() in Alert widget
     */
    public function testAlertContent()
    {
        ob_start();

        Alert::begin([
            'body' => 'Alert',
            'options' => [
                'id' => 'alert'
            ]
        ]);
        echo '<span slot="desc"><i>Message</i></span>';
        Alert::end();

        $alert = ob_get_clean();
        $expected = '<alert id="alert">Alert<span slot="desc"><i>Message</i></span></alert>';

        $this->assertEqualsWithoutLE($expected, $alert);
    }

    /**
     * Data provider for testAlertOptions
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Type' => [
                [
                    'body' => 'Alert',
                    'type' => Alert::TYPE_SUCCESS,
                    'options' => [
                        'id' => 'alert'
                    ]
                ],
                '<alert type="success" id="alert">Alert</alert>'
            ],
            'Show icon' => [
                [
                    'body' => 'Alert',
                    'showIcon' => true,
                    'options' => [
                        'id' => 'alert'
                    ]
                ],
                '<alert id="alert" show-icon>Alert</alert>'
            ],
            'Closable' => [
                [
                    'body' => 'Alert',
                    'closable' => true,
                    'options' => [
                        'id' => 'alert'
                    ]
                ],
                '<alert id="alert" closable>Alert</alert>'
            ],
            'Slot' => [
                [
                    'body' => 'Alert',
                    'slot' => [
                        'icon' => 'ios-lightbulb-outline',
                        'desc' => 'Test slot',
                        'close' => 'Close'
                    ],
                    'options' => [
                        'id' => 'alert'
                    ]
                ],
                '<alert id="alert">'
                . 'Alert'
                . '<icon type="ios-lightbulb-outline" slot="icon"></icon>'
                . '<span slot="desc">Test slot</span>'
                . '<span slot="close">Close</span>'
                . '</alert>'
            ],
        ];
    }

}
