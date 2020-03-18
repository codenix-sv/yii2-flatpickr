<?php

namespace codenixsv\flatpickr\tests\functional;

use yii\web\View;
use yii\web\Application;
use Yii;

/**
 * Class TestCase
 * @package codenixsv\flatpickr\tests\functional
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        $this->mockApplication();
    }

    /**
     * @inheritdoc
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->destroyApplication();
    }

    /**
     * Mock application
     */
    protected function mockApplication()
    {
        $config = $this->getApplicationConfig();
        new Application($config);
    }

    /**
     * Returns vendor directory path
     *
     */
    protected function getVendorPath(): string
    {
        return dirname(dirname(__DIR__)) . '/vendor';
    }

    /**
     * Destroys application
     */
    protected function destroyApplication()
    {
        Yii::$app = null;
    }

    /**
     * Creates view for testing
     *
     */
    protected function getView(): View
    {
        return new View();
    }

    /**
     * Returns config for Application
     */
    protected function getApplicationConfig(): array
    {
        return [
            'id' => 'testapp',
            'basePath' => __DIR__,
            'vendorPath' => $this->getVendorPath(),
            'aliases' => [
                '@bower' => '@vendor/bower-asset',
                '@npm' => '@vendor/npm-asset',
                '@views' => '@tests/data/views'
            ],
            'components' => [
                'request' => [
                    'class' => 'yii\web\Request',
                    'url' => '/test',
                    'enableCsrfValidation' => false,
                    'cookieValidationKey' => 'KmsjYhsFgsyoUj0dKjGfRmns',
                    'scriptFile' => __DIR__ . '/index.php',
                    'scriptUrl' => '/index.php',
                ],
                'response' => [
                    'class' => 'yii\web\Response',
                ],
                'assetManager' => [
                    'class' => 'yii\web\AssetManager',
                    'basePath' => '@tests/data/assets',
                    'baseUrl' => '/',
                ],
            ],
        ];
    }
}
