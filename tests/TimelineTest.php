<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Timeline;


/**
 * Test case for antkaz\iview\Timeline.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class TimelineTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array  $config
     * @param string $expected
     */
    public function testTimelineOptions($config, $expected)
    {
        $widget = Timeline::widget($config);

        $this->assertEqualsWithoutLE($expected, $widget);
    }

    /**
     * Data provider for testTimelineOptions.
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Item is string and array' => [
                [
                    'id' => 'timeline',
                    'items' => [
                        'timelineItem 1',
                        ['content' => 'timelineItem 2']
                    ],
                ],
                '<timeline id="timeline">'
                . '<timeline-item>timelineItem 1</timeline-item>'
                . '<timeline-item>timelineItem 2</timeline-item>'
                . '</timeline>'
            ],
            'Pending' => [
                [
                    'id' => 'timeline',
                    'pending' => true,
                    'items' => [
                        'timelineItem 1',
                        'timelineItem 2'
                    ]
                ],
                '<timeline id="timeline" pending>'
                . '<timeline-item>timelineItem 1</timeline-item>'
                . '<timeline-item>timelineItem 2</timeline-item>'
                . '</timeline>'
            ],
            'Slot dot' => [
                [
                    'id' => 'timeline',
                    'items' => [
                        ['content' => 'timelineItem 1', 'dot' => 'Slot'],
                        ['content' => 'timelineItem 2']
                    ],
                ],
                '<timeline id="timeline">'
                . '<timeline-item><i slot="dot">Slot</i>timelineItem 1</timeline-item>'
                . '<timeline-item>timelineItem 2</timeline-item>'
                . '</timeline>'
            ]
        ];
    }
}
