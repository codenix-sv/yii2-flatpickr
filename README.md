# Flatpickr widget for Yii2

[![Latest Stable Version](https://poser.pugx.org/codenix-sv/yii2-flatpickr/v/stable)](https://packagist.org/packages/codenix-sv/yii2-flatpickr)
[![Latest Unstable Version](https://poser.pugx.org/codenix-sv/yii2-flatpickr/v/unstable)](https://packagist.org/packages/codenix-sv/yii2-flatpickr)
[![License](https://poser.pugx.org/codenix-sv/yii2-flatpickr/license)](https://packagist.org/packages/codenix-sv/yii2-flatpickr)
[![Build Status](https://travis-ci.org/codenix-sv/yii2-flatpickr.svg?branch=master)](https://travis-ci.org/codenix-sv/yii2-flatpickr)
[![Maintainability](https://api.codeclimate.com/v1/badges/f6635494b1c54e2c117c/maintainability)](https://codeclimate.com/github/codenix-sv/yii2-flatpickr/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/f6635494b1c54e2c117c/test_coverage)](https://codeclimate.com/github/codenix-sv/yii2-flatpickr/test_coverage)

This is Yii2 widget wrapper for [Flatpickr datetime picker](https://github.com/chmln/flatpickr).
Flatpickr is a lightweight and powerful datetime picker written in vanilla javascript.

![flatpickr-theme](https://user-images.githubusercontent.com/17989224/33085187-a6a75f26-ceec-11e7-9c5f-56930360a488.png)
![flatpickr-theme-dark](https://user-images.githubusercontent.com/17989224/33085189-a6d0688a-ceec-11e7-8a38-be258ff692b2.png)

## Latest release
The latest stable version of the extension is v1.0

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require codenix-sv/yii2-flatpickr:~1.0
```
or add

```json
"codenix-sv/yii2-flatpickr" : "~1.0"
```

to the require section of your application's `composer.json` file.

## Basic usage

### Example of use with an `ActiveForm`:

```php
<?php

use codenixsv\flatpickr\Flatpickr;

?>
...
<?= $form->field($model, 'date')->widget(Flatpickr::className()) ?>
```
### Example of use as a widget:
```php
<?= Flatpickr::widget(['model' => $model, 'attribute' => 'email']) ?>
```

## Usage with options
```php
<?php

use codenixsv\flatpickr\Flatpickr;

?>
...
<?= $form->field($model, 'email')->widget(Flatpickr::className(), [
        'theme' =>'dark',
        'clientOptions' => [
            'locale' => 'ru',
            'enableTime' => true
        ]
]) ?>
```

## Further Information
Please, check the [Flatpickr site](https://chmln.github.io/flatpickr/options/) documentation for further
information about configuration options.

## License

**yii2-flatpickr** is released under the MIT License. See the bundled [LICENSE](./LICENSE) for details.
