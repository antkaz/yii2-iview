<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Poptip;

/**
 * Test case for antkaz\iview\Poptip.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class PoptipTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array  $config
     * @param string $expected
     */
    public function testPoptipOptions($config, $expected)
    {
        $poptip = Poptip::widget($config);

        $this->assertEqualsWithoutLE($expected, $poptip);
    }

    /**
     * Tests the contents enclosed in the begin() and end() in the Poptip widget
     */
    public function testPoptipContent()
    {
        ob_start();

        Poptip::begin([
            'id' => 'poptip',
            'title' => 'title',
            'content' => 'content'
        ]);
        echo '<p>This is content</p>';
        Poptip::end();

        $poptip = ob_get_clean();
        $expected = '<poptip id="poptip" title="title" content="content"><p>This is content</p></poptip>';

        $this->assertEqualsWithoutLE($expected, $poptip);
    }

    /**
     * Data provider for testPoptipOptions
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Default' => [
                [
                    'id' => 'poptip',
                    'body' => 'text',
                    'title' => 'title',
                    'content' => 'content'
                ],
                '<poptip id="poptip" title="title" content="content">text</poptip>'
            ],
            'Trigger & Placement' => [
                [
                    'id' => 'poptip',
                    'body' => 'text',
                    'title' => 'title',
                    'content' => 'content',
                    'trigger' => Poptip::TRIGGER_HOVER,
                    'placement' => 'top'
                ],
                '<poptip id="poptip" title="title" trigger="hover" content="content" placement="top">text</poptip>'
            ],
            'Width & PopperClass' => [
                [
                    'id' => 'poptip',
                    'body' => 'text',
                    'title' => 'title',
                    'content' => 'content',
                    'width' => '200',
                    'popperClass' => 'popper'
                ],
                '<poptip id="poptip" width="200" title="title" content="content" popper-class="popper">text</poptip>'
            ],
            'Confirm & Buttons' => [
                [
                    'id' => 'poptip',
                    'body' => 'text',
                    'title' => 'title',
                    'content' => 'content',
                    'confirm' => true,
                    'okText' => 'OK',
                    'cancelText' => 'Cancel'
                ],
                '<poptip id="poptip" title="title" content="content" confirm ok-text="OK" cancel-text="Cancel">text</poptip>'
            ],
            'Transfer & Slot' => [
                [
                    'id' => 'poptip',
                    'body' => 'text',
                    'transfer' => true,
                    'slot' => [
                        'title' => 'title',
                        'content' => 'content',
                        'titleOptions' => [
                            'class' => 'title-class'
                        ],
                        'contentOptions' => [
                            'class' => 'content-class'
                        ]
                    ]
                ],
                '<poptip id="poptip" transfer>' .
                'text' .
                '<div class="title-class" slot="title">title</div>' .
                '<div class="content-class" slot="content">content</div>' .
                '</poptip>'
            ]
        ];
    }
}