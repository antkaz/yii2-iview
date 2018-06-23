<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Tabs;

/**
 * Test case for antkaz\iview\Tabs.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class TabsTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array  $config
     * @param string $expected
     */
    public function testTabsOptions($config, $expected)
    {
        $tabs = Tabs::widget($config);

        $this->assertEqualsWithoutLE($expected, $tabs);
    }

    /**
     * Tests the contents enclosed in the begin() and end() in the Carousel widget.
     */
    public function testTabsContent()
    {
        ob_start();

        Tabs::begin([
            'id' => 'tabs',
            'type' => Tabs::TYPE_CARD,
        ]);

        echo '<tab-pane label="1" name="1">one</tab-pane>';
        echo '<tab-pane label="2" name="2">two</tab-pane>';
        echo '<tab-pane label="2" name="2">three</tab-pane>';

        Tabs::end();

        $tooltip = ob_get_clean();
        $expected = '<tabs type="card" id="tabs" :animated="false">' .
            '<tab-pane label="1" name="1">one</tab-pane>' .
            '<tab-pane label="2" name="2">two</tab-pane>' .
            '<tab-pane label="2" name="2">three</tab-pane>' .
            '</tabs>';

        $this->assertEqualsWithoutLE($expected, $tooltip);
    }

    /**
     * Data provider for testTabsOptions.
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Default options' => [
                [
                    'id' => 'tabs',
                    'items' => [
                        [
                            'label' => 'one',
                            'content' => 'panel one',
                        ],
                    ],
                ],
                '<tabs id="tabs" :animated="false">' .
                '<tab-pane label="one">panel one</tab-pane>' .
                '</tabs>',
            ],
            'Type & size' => [
                [
                    'id' => 'tabs',
                    'type' => Tabs::TYPE_CARD,
                    'size' => Tabs::SIZE_SMALL,
                    'items' => [
                        [
                            'label' => 'one',
                            'content' => 'panel one',
                        ],
                    ],
                ],
                '<tabs type="card" id="tabs" size="small" :animated="false">' .
                '<tab-pane label="one">panel one</tab-pane>' .
                '</tabs>',
            ],
            'Name & value' => [
                [
                    'id' => 'tabs',
                    'value' => '1',
                    'items' => [
                        [
                            'label' => 'one',
                            'content' => 'panel one',
                            'name' => '1',
                        ],
                    ],
                ],
                '<tabs id="tabs" value="1" :animated="false">' .
                '<tab-pane name="1" label="one">panel one</tab-pane>' .
                '</tabs>',
            ],
            'Closable & animated & captureFocus' => [
                [
                    'id' => 'tabs',
                    'closable' => true,
                    'animated' => true,
                    'captureFocus' => true,
                    'items' => [
                        [
                            'label' => 'one',
                            'content' => 'panel one',
                        ],
                    ],
                ],
                '<tabs id="tabs" closable capture-focus>' .
                '<tab-pane label="one">panel one</tab-pane>' .
                '</tabs>',
            ],
            'Items' => [
                [
                    'id' => 'tabs',
                    'items' => [
                        [
                            'label' => 'one',
                            'content' => 'panel one',
                            'name' => 'one',
                            'closable' => true,
                        ],
                        [
                            'label' => 'two',
                            'content' => 'panel two',
                            'name' => 'two',
                            'disabled' => true,
                            'icon' => 'checkmark'
                        ],
                        '<tab-pane name="three" label="three">panel three</tab-pane>'
                    ],
                ],
                '<tabs id="tabs" :animated="false">' .
                '<tab-pane name="one" label="one" closable>panel one</tab-pane>' .
                '<tab-pane name="two" disabled label="two" icon="checkmark">panel two</tab-pane>' .
                '<tab-pane name="three" label="three">panel three</tab-pane>' .
                '</tabs>',
            ],
        ];
    }
}
