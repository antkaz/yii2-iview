<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Menu;

/**
 * Test case for antkaz\iview\Menu.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class MenuTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array $config
     * @param string $expected
     */
    public function testMenuOptions($config, $expected)
    {
        $menu = Menu::widget($config);

        $this->assertEqualsWithoutLE($expected, $menu);
    }

    /**
     * Data provider for testMenuOptions.
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Default' => [
                [
                    'items' => [
                        [
                            'name' => '1',
                            'label' => 'page-1',
                        ],
                        [
                            'name' => '2',
                            'label' => 'page-2',
                        ]
                    ],
                    'options' => [
                        'id' => 'menu'
                    ]
                ],
                '<div id="menu">'
                . '<i-menu>'
                . '<menu-item name="1">page-1</menu-item>'
                . '<menu-item name="2">page-2</menu-item>'
                . '</i-menu>'
                . '</div>'
            ],
            'All options' => [
                [
                    'items' => [
                        [
                            'name' => '1',
                            'label' => 'page-1',
                        ],
                        [
                            'name' => '2',
                            'label' => '<b>page-2</b>',
                        ]
                    ],
                    'mode' => Menu::MODE_HORIZONTAL,
                    'theme' => Menu::THEME_DARK,
                    'accordion' => true,
                    'width' => 100,
                    'encodeLabel' => true,
                    'options' => [
                        'id' => 'menu'
                    ]
                ],
                '<div id="menu">'
                . '<i-menu width="100" mode="horizontal" theme="dark" accordion>'
                . '<menu-item name="1">page-1</menu-item>'
                . '<menu-item name="2">&lt;b&gt;page-2&lt;/b&gt;</menu-item>'
                . '</i-menu>'
                . '</div>'
            ],
            'Submenu & openNames' => [
                [
                    'items' => [
                        [
                            'name' => '1',
                            'label' => 'page-1',
                        ],
                        [
                            'name' => '2',
                            'label' => 'page-2',
                            'items' => [
                                [
                                    'name' => '3',
                                    'label' => 'page-3',
                                ],
                                [
                                    'name' => '4',
                                    'label' => 'page-4',
                                ],
                            ]
                        ]
                    ],
                    'openNames' => [2],
                    'options' => [
                        'id' => 'menu'
                    ]
                ],
                '<div id="menu">'
                . "<i-menu open-names='[2]'>"
                . '<menu-item name="1">page-1</menu-item>'
                . '<submenu name="2">'
                . '<template slot="title">page-2</template>'
                . '<menu-item name="3">page-3</menu-item>'
                . '<menu-item name="4">page-4</menu-item>'
                . '</submenu>'
                . '</i-menu>'
                . '</div>'
            ]
        ];
    }
}
