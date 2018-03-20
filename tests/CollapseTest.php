<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Collapse;

/**
 * Test case for antkaz\iview\Collapse.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class CollapseTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array $config
     * @param string $expected
     */
    public function testCollapseOptions($config, $expected)
    {
        $widget = Collapse::widget($config);

        $this->assertEqualsWithoutLE($expected, $widget);
    }

    /**
     * Data provider for testCollapseOptions.
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Item is string' => [
                [
                    'id' => 'collapse',
                    'items' => [
                        'panel 1',
                        'panel 2',
                    ],
                ],
                '<collapse id="collapse">'
                . '<panel><p slot="content">panel 1</p></panel>'
                . '<panel><p slot="content">panel 2</p></panel>'
                . '</collapse>'
            ],
            'Item is array' => [
                [
                    'id' => 'collapse',
                    'items' => [
                        ['label' => 'title 1', 'content' => 'panel 1'],
                        ['label' => 'title 2', 'content' => 'panel 2'],
                    ],
                ],
                '<collapse id="collapse">'
                . '<panel>title 1<p slot="content">panel 1</p></panel>'
                . '<panel>title 2<p slot="content">panel 2</p></panel>'
                . '</collapse>'
            ],
            'Encode label' => [
                [
                    'id' => 'collapse',
                    'encodeLabel' => false,
                    'items' => [
                        ['label' => '<b>title 1</b>', 'content' => 'panel 1', 'encodeLabel' => true],
                        ['label' => '<b>title 2</b>', 'content' => 'panel 2'],
                    ],
                ],
                '<collapse id="collapse">'
                . '<panel>&lt;b&gt;title 1&lt;/b&gt;<p slot="content">panel 1</p></panel>'
                . '<panel><b>title 2</b><p slot="content">panel 2</p></panel>'
                . '</collapse>'
            ],
            'Accordion & vModel' => [
                [
                    'id' => 'collapse',
                    'vModel' => 'test',
                    'accordion' => true,
                    'items' => [
                        ['label' => 'title 1', 'content' => 'panel 1'],
                        ['label' => 'title 2', 'content' => 'panel 2'],
                    ],
                ],
                '<collapse id="collapse" v-model="test" accordion>'
                . '<panel>title 1<p slot="content">panel 1</p></panel>'
                . '<panel>title 2<p slot="content">panel 2</p></panel>'
                . '</collapse>'
            ],
            'Value is array' => [
                [
                    'id' => 'collapse',
                    'value' => ['first', 'second'],
                    'items' => [
                        ['label' => 'title 1', 'content' => 'panel 1', 'name' => 'first'],
                        ['label' => 'title 2', 'content' => 'panel 2', 'name' => 'second'],
                    ],
                ],
                '<collapse id="collapse" :value=\'["first","second"]\'>'
                . '<panel name="first">title 1<p slot="content">panel 1</p></panel>'
                . '<panel name="second">title 2<p slot="content">panel 2</p></panel>'
                . '</collapse>'
            ],
            'Value is string' => [
                [
                    'id' => 'collapse',
                    'value' => 'first',
                    'items' => [
                        ['label' => 'title 1', 'content' => 'panel 1', 'name' => 'first'],
                        ['label' => 'title 2', 'content' => 'panel 2', 'name' => 'second'],
                    ],
                ],
                '<collapse id="collapse" value="first">'
                . '<panel name="first">title 1<p slot="content">panel 1</p></panel>'
                . '<panel name="second">title 2<p slot="content">panel 2</p></panel>'
                . '</collapse>'
            ],
            'On-change event' => [
                [
                    'id' => 'collapse',
                    'items' => [
                        ['label' => 'title 1', 'content' => 'panel 1'],
                        ['label' => 'title 2', 'content' => 'panel 2'],
                    ],
                    'events' => ['on-change' => 'test']
                ],
                '<collapse id="collapse" @on-change="test">'
                . '<panel>title 1<p slot="content">panel 1</p></panel>'
                . '<panel>title 2<p slot="content">panel 2</p></panel>'
                . '</collapse>'
            ],
        ];
    }
}
