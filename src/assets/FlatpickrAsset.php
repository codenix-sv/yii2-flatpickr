<?php
/**
 * @link https://github.com/codenix-sv/yii2-flatpickr
 * @copyright Copyright (c) 2017 codenix-sv
 * @license https://github.com/codenix-sv/yii2-flatpickr/blob/master/LICENSE.md
 */

namespace codenixsv\flatpickr\assets;

use yii\web\AssetBundle;

/**
 * Class FlatpickrAsset
 * @package codenixsv\flatpickr\assets
 */
class FlatpickrAsset extends AssetBundle
{
    /**
     * @inheritdoc
     * @var string
     */
    public $sourcePath = '@npm/flatpickr/dist';

    /**
     * @inheritdoc
     * @var array
     */
    public $js = [
        'flatpickr.min.js',
    ];

    /**
     * @inheritdoc
     * @var array
     */
    public $css = [
        'flatpickr.min.css',
    ];

    /**
     * @var string
     */
    public $theme;

    /**
     * @var string
     */
    public $locale;

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        $this->registerLanguageFile();
        $this->registerThemeFile();

        parent::registerAssetFiles($view);
    }

    /**
     * Registers language file
     */
    private function registerLanguageFile()
    {
        if (!empty($this->locale) && ($this->locale !== 'en')) {
            $this->js[] = 'l10n/' . $this->locale . '.js';
        }
    }

    /**
     * Registers theme
     */
    private function registerThemeFile()
    {
        if (!empty($this->theme)) {
            $this->css[] = 'themes/' . $this->theme . '.css';
        }
    }
}
