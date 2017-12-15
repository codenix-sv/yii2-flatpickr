<?php

namespace codenixsv\flatpickr\tests\functional;

use tests\data\models\TestModel;
use codenixsv\flatpickr\Flatpickr;
use yii\widgets\ActiveForm;

/**
 * Class FlatpickrTest
 * @package codenixsv\flatpickr\tests\functional
 */
class FlatpickrTest extends TestCase
{
    public function testRenderWithModel()
    {
        $model = new TestModel();
        $model->date = '2017-12-12';
        $result = Flatpickr::widget(['model' => $model, 'attribute' => 'date', 'clientOptions' => ['locale' => 'ru']]);
        $expected = '<input type="text" id="testmodel-date" class="form-control" name="TestModel[date]" value="2017-12-12" data-input>';
        $this->assertEquals($expected, $result);
    }

    public function testRenderWithoutModel()
    {
        $result = Flatpickr::widget(['id' => 'test', 'name' => 'test-flatpickr-name', 'value' => '2017-11-11']);
        $expected = '<input type="text" id="test" class="form-control" name="test-flatpickr-name" value="2017-11-11" data-input>';
        $this->assertEquals($expected, $result);
    }
}
