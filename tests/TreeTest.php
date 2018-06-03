<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Tree;

/**
 * Test case for antkaz\iview\Tree.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class TreeTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array  $config
     * @param string $expected
     */
    public function testTreeOptions($config, $expected)
    {
        $tree = Tree::widget($config);

        $this->assertEqualsWithoutLE($expected, $tree);
    }

    /**
     * Data provider for testTreeOptions
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Tree' => [
                [
                    'id' => 'tree',
                    'data' => 'data'
                ],
                '<tree id="tree" :data="data"></tree>'
            ],
            'multiple & showCheckbox' => [
                [
                    'id' => 'tree',
                    'data' => 'data',
                    'multiple' => true,
                    'showCheckbox' => true
                ],
                '<tree id="tree" multiple :data="data" show-checkbox></tree>'
            ],
            'emptyText & childrenKey' => [
                [
                    'id' => 'tree',
                    'data' => 'data',
                    'emptyText' => 'empty',
                    'childrenKey' => 'children'
                ],
                '<tree id="tree" :data="data" empty-text="empty" children-key="children"></tree>'
            ],
            'loadData & render' => [
                [
                    'id' => 'tree',
                    'data' => 'data',
                    'loadData' => 'loading',
                    'render' => 'render'
                ],
                '<tree id="tree" :data="data" :load-data="loading" :render="render"></tree>'
            ]
        ];
    }

}
