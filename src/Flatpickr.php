<?php
/**
 * @link https://github.com/codenix-sv/yii2-flatpickr
 * @copyright Copyright (c) 2017 codenix-sv
 * @license https://github.com/codenix-sv/yii2-flatpickr/blob/master/LICENSE
 */

namespace codenixsv\flatpickr;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\widgets\InputWidget;
use codenixsv\flatpickr\assets\FlatpickrAsset;

/**
 * Class Flatpickr
 * @package codenixsv\flatpickr
 */
class Flatpickr extends InputWidget
{
    /**
     * @link https://chmln.github.io/flatpickr/options/ Flatpickr options
     * @var array
     */
    public $clientOptions = [];

    /** @var array */
    public $defaultOptions = [
        'allowInput' => true
    ];

    /** @var string */
    private $_locale;

    /** @var string */
    public $theme;

    /** @var string */
    private $_id;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (isset($this->clientOptions['locale'])) {
            $this->_locale = $this->clientOptions['locale'];
        } else {
            $language = explode('-', \Yii::$app->language);
            $this->_locale = $language[0];
        }
    }

    /**
     * @inheritdoc
     */
    public function run(): string
    {
        parent::run();

        $this->registerClientScript();

        return $this->renderContent();
    }

    /**
     * Registers client scripts.
     */
    private function registerClientScript()
    {
        $this->_id = $this->options['id'];
        $view = $this->getView();

        $config = Json::encode(ArrayHelper::merge($this->defaultOptions, $this->clientOptions));

        $asset = FlatpickrAsset::register($view);
        $asset->locale = $this->_locale;
        $asset->theme = $this->theme;

        $view->registerJs("flatpickr('#{$this->_id}', {$config});");
    }

    /**
     * Renders widget
     */
    private function renderContent(): string
    {
        $options = ArrayHelper::merge(['class' => 'form-control', 'data-input' => true], $this->options);

        return $this->hasModel()
            ? Html::activeTextInput($this->model, $this->attribute, $options)
            : Html::textInput($this->name, $this->value, $options);
    }
}
