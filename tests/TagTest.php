<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Tag;

/**
 * Test case for antkaz\iview\Tag.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class TagTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $config
     * @param $expected
     */
    public function testTagOptions($config, $expected)
    {
        $tag = Tag::widget($config);

        $this->assertEqualsWithoutLE($expected, $tag);
    }

    /**
     * Data provider for testTagOptions.
     *
     * @return array
     */
    public function dataProvider()
    {
        return [
            'Closable & Checkable' => [
                [
                    'id' => 'tag',
                    'body' => 'tag',
                    'closable' => true,
                    'checkable' => true
                ],
                '<tag id="tag" closable checkable>tag</tag>'
            ],
            'Type & Color' => [
                [
                    'id' => 'tag',
                    'body' => 'tag',
                    'type' => Tag::TYPE_DOT,
                    'color' => '#000000'
                ],
                '<tag type="dot" id="tag" color="#000000">tag</tag>'
            ]
        ];
    }
}
