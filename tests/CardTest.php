<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Card;

/**
 * Test case for antkaz\iview\Card.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class CardTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $config
     * @param $expected
     */
    public function testCardOptions($config, $expected)
    {
        $card = Card::widget($config);

        $this->assertEqualsWithoutLE($expected, $card);
    }

    /**
     * Tests the contents enclosed in the begin() and end() in Card widget
     */
    public function testCardContent()
    {
        ob_start();
        Card::begin([
            'body' => 'Card',
            'options' => [
                'id' => 'card'
            ]
        ]);
        echo 'content';
        Card::end();

        $card = ob_get_clean();
        $expected = '<card id="card">Cardcontent</card>';

        $this->assertEqualsWithoutLE($expected, $card);
    }

    /**
     * Data provider for testCardOptions.
     *
     * @return array
     */
    public function dataProvider()
    {
        return [
            'Card props' => [
                [
                    'body' => 'Content card',
                    'bordered' => false,
                    'disHover' => true,
                    'shadow' => true,
                    'padding' => 15,
                    'options' => [
                        'id' => 'card'
                    ]
                ],
                '<card id="card" :bordered="false" dis-hover shadow padding="15">Content card</card>'
            ],
            'Card slot' => [
                [
                    'body' => 'Content card',
                    'title' => 'Card title',
                    'extra' => [
                        'tag' => 'a',
                        'content' => 'Extra',
                        'options' => [
                            '@click.prevent' => 'change'
                        ]
                    ],
                    'options' => [
                        'id' => 'card'
                    ]
                ],
                '<card id="card">'
                . '<p slot="title">Card title</p>'
                . '<a slot="extra" @click.prevent="change">Extra</a>'
                . 'Content card'
                . '</card>'
            ],
        ];
    }
}
