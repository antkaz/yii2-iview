<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Badge;

/**
 * Test case for antkaz\iview\Badge.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class BadgeTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array $config
     * @param string $expected
     */
    public function testBadgeOptions($config, $expected)
    {
        $widget = Badge::widget($config);

        $this->assertEqualsWithoutLE($expected, $widget);
    }

    /**
     * Tests the contents enclosed in the begin() and end() in Badge widget.
     */
    public function testBadgeContent()
    {
        ob_start();

        Badge::begin([
            'id' => 'badge',
            'count' => 3
        ]);
        echo 'Badge';
        Badge::end();

        $widget = ob_get_clean();
        $expected = '<badge id="badge" count="3">Badge</badge>';

        $this->assertEqualsWithoutLE($expected, $widget);
    }

    /**
     * Data provider for testBadgeOptions.
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Dot & className' => [
                [
                    'id' => 'badge',
                    'body' => 'Badge',
                    'dot' => true,
                    'className' => 'test-badge'
                ],
                '<badge id="badge" dot class-name="test-badge">Badge</badge>'
            ],
            'Count & overflowCount' => [
                [
                    'id' => 'badge',
                    'body' => 'Badge',
                    'count' => 199,
                    'overflowCount' => 200
                ],
                '<badge id="badge" count="199" overflow-count="200">Badge</badge>'
            ],
        ];
    }
}
