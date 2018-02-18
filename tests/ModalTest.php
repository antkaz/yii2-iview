<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use antkaz\iview\Modal;

/**
 * Test case for antkaz\iview\Modal.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
class ModalTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param array $config
     * @param string $expected
     */
    public function testModalOptions($config, $expected)
    {
        $modal = Modal::widget($config);

        $this->assertEqualsWithoutLE($expected, $modal);
    }

    /**
     * Tests the contents enclosed in the begin() and end() in Modal widget
     */
    public function testModalContent()
    {
        ob_start();

        Modal::begin([
            'title' => 'Title',
            'options' => [
                'id' => 'modal'
            ]
        ]);
        echo '<p>Content of dialog</p>';
        Modal::end();

        $modal = ob_get_clean();
        $expected = '<modal id="modal" title="Title"><p>Content of dialog</p></modal>';

        $this->assertEqualsWithoutLE($expected, $modal);
    }

    /**
     * Data provider for testModalOptions
     *
     * @return array Test data.
     */
    public function dataProvider()
    {
        return [
            'Default options' => [
                [
                    'title' => 'Modal title',
                    'body' => 'Content of dialog',
                    'vModel' => 'visible',
                    'options' => [
                        'id' => 'modal'
                    ]
                ],
                '<modal id="modal" title="Modal title" v-model="visible">Content of dialog</modal>'
            ],
            'Value' => [
                [
                    'body' => 'Content of dialog',
                    'vModel' => 'visible',
                    'value' => true,
                    'options' => [
                        'id' => 'modal'
                    ]
                ],
                '<modal id="modal" value v-model="visible">Content of dialog</modal>'
            ],
            'Closable & maskClosable' => [
                [
                    'body' => 'Content of dialog',
                    'closable' => false,
                    'maskClosable' => false,
                    'options' => [
                        'id' => 'modal'
                    ]
                ],
                '<modal id="modal" :closable="false" :mask-closable="false">Content of dialog</modal>'
            ],
            'loading & scrollable' => [
                [
                    'body' => 'Content of dialog',
                    'loading' => true,
                    'scrollable' => true,
                    'options' => [
                        'id' => 'modal'
                    ]
                ],
                '<modal id="modal" loading scrollable>Content of dialog</modal>'
            ],
            'OK & Cancel' => [
                [
                    'body' => 'Content of dialog',
                    'okText' => 'Submit',
                    'cancelText' => 'Reset',
                    'options' => [
                        'id' => 'modal'
                    ]
                ],
                '<modal id="modal" @ok-text="Submit" @cancel-text="Reset">Content of dialog</modal>'
            ],
            'With & Styles' => [
                [
                    'body' => 'Content of dialog',
                    'width' => 10,
                    'styles' => "{top:'20px'}",
                    'options' => [
                        'id' => 'modal'
                    ]
                ],
                '<modal id="modal" width="10" :styles="{top:&#039;20px&#039;}">Content of dialog</modal>'
            ],
            'ClassName' => [
                [
                    'body' => 'Content of dialog',
                    'className' => 'custom-modal',
                    'options' => [
                        'id' => 'modal'
                    ]
                ],
                '<modal id="modal" class-name="custom-modal">Content of dialog</modal>'
            ],
            'transitionNames' => [
                [
                    'body' => 'Content of dialog',
                    'transitionNames' => ['ease-in', 'fade'],
                    'options' => [
                        'id' => 'modal'
                    ]
                ],
                '<modal id="modal" :transition-names=\'["ease-in","fade"]\'>Content of dialog</modal>'
            ]
        ];
    }

}
