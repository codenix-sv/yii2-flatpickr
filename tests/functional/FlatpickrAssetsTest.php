<?php

namespace codenixsv\flatpickr\tests\functional;

use codenixsv\flatpickr\assets\FlatpickrAsset;

/**
 * Class FlatpickrAssetsTest
 * @package codenixsv\flatpickr\tests\functional
 */
class FlatpickrAssetsTest extends TestCase
{
    public function testRegisterAsset()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        FlatpickrAsset::register($view);

        $this->assertEquals(1, count($view->assetBundles));
        $this->assertArrayHasKey('codenixsv\flatpickr\assets\FlatpickrAsset', $view->assetBundles);
    }

    public function testRegisterAssetFiles()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        FlatpickrAsset::register($view);

        $content = $view->render('@views/layouts/main.php');
        $this->assertContains('flatpickr.min.js', $content);
        $this->assertContains('flatpickr.min.css', $content);
    }

    public function testRegisterAssetFilesWithTheme()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        $asset = FlatpickrAsset::register($view);
        $asset->theme = 'dark';

        $content = $view->render('@views/layouts/main.php');
        $this->assertContains('flatpickr.min.js', $content);
        $this->assertContains('flatpickr.min.css', $content);
        $this->assertContains('dark.css', $content);
    }

    public function testRegisterAssetFilesWithLocale()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        $asset = FlatpickrAsset::register($view);
        $asset->locale = 'ru';

        $content = $view->render('@views/layouts/main.php');
        $this->assertContains('flatpickr.min.js', $content);
        $this->assertContains('flatpickr.min.css', $content);
        $this->assertContains('l10n/ru.js', $content);
    }
}
