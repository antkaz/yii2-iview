<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Progress;

/**
 * Test case for antkaz\iview\Progress.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class ProgressTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array $config
     * @param string $expected
     */
    public function testModalOptions($config, $expected)
    {
        $modal = Progress::widget($config);

        $this->assertEqualsWithoutLE($expected, $modal);
    }

    /**
     * Tests the contents enclosed in the begin() and end() in Progress widget
     */
    public function testModalContent()
    {
        ob_start();

        Progress::begin([
            'options' => [
                'id' => 'progress'
            ]
        ]);
        echo '<span>test</span>';
        Progress::end();

        $modal = ob_get_clean();
        $expected = '<i-progress id="progress"><span>test</span></i-progress>';

        $this->assertEqualsWithoutLE($expected, $modal);
    }

    /**
     * Data provider for testProgressOptions
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Default options' => [
                [
                    'options' => [
                        'id' => 'progress'
                    ]
                ],
                '<i-progress id="progress"></i-progress>',
            ],
            'Custom options' => [
                [
                    'body' => 'test',
                    'percent' => 25,
                    'status' => Progress::STATUS_ACTIVE,
                    'strokeWidth' => 20,
                    'hideInfo' => true,
                    'vertical' => true,
                    'options' => [
                        'id' => 'progress'
                    ]
                ],
                '<i-progress id="progress" :percent="25" status="active" :stroke-width="20" hide-info vertical>test</i-progress>',
            ]
        ];
    }

}
