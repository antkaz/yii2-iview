<?php
/**
 * @link https://github.com/antkaz/yii2-iview
 * @copyright Copyright (c) 2018 Anton Kazarinov
 * @license https://github.com/antkaz/yii2-iview/blob/master/LICENSE
 */

namespace antkaz\unit\extensions\iview;

use yii;
use yii\di\Container;
use yii\helpers\ArrayHelper;
use yii\web\Application;
use PHPUnit\Framework\TestCase as phpUnitTestCase;

/**
 * Base class for tests cases.
 *
 * @author Anton Kazarinov <askazarinov@gmail.com>
 * @package antkaz\unit\extensions\iview
 */
abstract class TestCase extends phpUnitTestCase
{
    /**
     * Creates the yii application.
     */
    protected function setUp()
    {
        $this->webApplication();
    }

    /**
     * @param array $config Application config.
     */
    protected function webApplication($config = [])
    {
        new Application(ArrayHelper::merge([
            'id' => 'yii2-iview-test',
            'basePath' => __DIR__,
            'vendorPath' => dirname(__DIR__) . '/vendor',
            'aliases' => [
                '@bower' => '@vendor/bower-asset',
                '@npm' => '@vendor/npm-asset',
            ],
            'components' => [
                'request' => [
                    'cookieValidationKey' => 'hDm52X7d82NKDjzC',
                    'scriptFile' => __DIR__ . '/index.php',
                    'scriptUrl' => '/index.php',
                ],
            ]
        ], $config));
    }

    /**
     * Clean up after test.
     */
    protected function tearDown()
    {
        $this->destroyApplication();
    }

    /**
     * Destroys the yii application.
     */
    protected function destroyApplication()
    {
        Yii::$app = null;
        Yii::$container = new Container();
    }

    /**
     * Asserting two strings equality ignoring line endings.
     *
     * @param string $expected
     * @param string $actual
     * @param string $message
     * @param float $delta
     * @param int $maxDepth
     * @param bool $canonicalize
     * @param bool $ignoreCase
     */
    public function assertEqualsWithoutLE(
        $expected,
        $actual,
        $message = '',
        $delta = 0.0,
        $maxDepth = 10,
        $canonicalize = false,
        $ignoreCase = false
    ) {
        $search = ["\r\n", "\n"];

        $expected = str_replace($search, '', $expected);
        $actual = str_replace($search, '', $actual);

        $this->assertEquals($expected, $actual, $message, $delta, $maxDepth, $canonicalize, $ignoreCase);
    }

}