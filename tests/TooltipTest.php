<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Tooltip;

/**
 * Test case for antkaz\iview\Tooltip.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class TooltipTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array  $config
     * @param string $expected
     */
    public function testTooltipOptions($config, $expected)
    {
        $tooltip = Tooltip::widget($config);

        $this->assertEqualsWithoutLE($expected, $tooltip);
    }

    /**
     * Tests the contents enclosed in the begin() and end() in the Tooltip widget
     */
    public function testTooltipContent()
    {
        ob_start();

        Tooltip::begin([
            'id' => 'tooltip',
            'content' => 'This is tooltip'
        ]);
        echo '<p>This is content</p>';
        Tooltip::end();

        $tooltip = ob_get_clean();
        $expected = '<tooltip id="tooltip" content="This is tooltip"><p>This is content</p></tooltip>';

        $this->assertEqualsWithoutLE($expected, $tooltip);
    }

    /**
     * Data provider for testTooltipOptions
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Body & Content' => [
                [
                    'id' => 'tooltip',
                    'body' => 'Content',
                    'content' => 'Tooltip message'
                ],
                '<tooltip id="tooltip" content="Tooltip message">Content</tooltip>'
            ],
            'Placement & Delay' => [
                [
                    'id' => 'tooltip',
                    'body' => 'Content',
                    'content' => 'Tooltip message',
                    'placement' => 'right',
                    'delay' => '500'
                ],
                '<tooltip id="tooltip" content="Tooltip message" placement="right" :delay="500">Content</tooltip>'
            ],
            'Always & Transfer' => [
                [
                    'id' => 'tooltip',
                    'body' => 'Content',
                    'content' => 'Tooltip message',
                    'always' => true,
                    'transfer' => true
                ],
                '<tooltip id="tooltip" content="Tooltip message" always transfer>Content</tooltip>'
            ],
            'Disabled is boolean' => [
                [
                    'id' => 'tooltip',
                    'body' => 'Content',
                    'content' => 'Tooltip message',
                    'disabled' => true
                ],
                '<tooltip id="tooltip" disabled content="Tooltip message">Content</tooltip>'
            ],
            'Disabled is string' => [
                [
                    'id' => 'tooltip',
                    'body' => 'Content',
                    'content' => 'Tooltip message',
                    'disabled' => 'disable'
                ],
                '<tooltip id="tooltip" content="Tooltip message" :disabled="disable">Content</tooltip>'
            ],
            'Slot' => [
                [
                    'id' => 'tooltip',
                    'slot' => [
                        'default' => 'Content',
                        'content' => 'Tooltip message',
                        'contentOptions' => [
                            'class' => 'tooltip'
                        ]
                    ]
                ],
                '<tooltip id="tooltip">Content<div class="tooltip" slot="content">Tooltip message</div></tooltip>'
            ]
        ];
    }
}