<?php 
use app\models\Models;
use app\models\Images;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = $car->model ? "Редактирование " . $car->model->brand->name . " " . $car->model->name : "Создание объявления";
?>
<div class="container">
<?php $form  = ActiveForm::begin([ 
    'action' => Url::to(['car/update', 'id' => $car->id]),
    'options' => [
        'enctype' => "multipart/form-data",]
    ])?>
    <div class="row">
        <div class="col-xs-4 col-xs-offset-2">
                <h2>Параметры</h2>
                    
                    <?= $form->field($car->model ? $car->model: new Models(), 'brand_id')->dropDownList(ArrayHelper::map($brands,'id', 'name'))->label('Марка')?>
                    <input type="hidden" id="current_model_id" value="<?= $car->model_id?>">
                    <?= $form->field($car, 'model_id')->dropDownList([])->label("Модель")?>
                    <?= $form->field($car, 'mileage')->label("Пробег")?>
                    <?= $form->field($car, 'price')->label("Цена")?>
                    <?= $form->field($car, 'phone')->label("Телефон")?>
                    <!-- <div class="form-group">
                        <label for="images">Изображения</label>
                        <input type="file" class="form-control" id="images" name="Cars[images][]" multiple >
                    </div> -->
                    <?= $form->field(new Images(), 'full[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label("Изображения")?>
                    
                    <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
        <div class="col-xs-4">
                    <h2>Опции</h2>
                    <ul class="car-options-list">
                        <?php foreach($options as $option):?>
                        <li>
                            <label>
                            <input type="checkbox" name="Cars[options][]" value="<?=$option->id?>"
                            <?php if(in_array($option->id, $checked_options)): ?>
                                checked
                            <?php endif;?>
                            >
                            <?=$option->name?></label>
                        </li>
                        <?php endforeach;?>
                    </ul>
        </div>    
    </div>
    <?php ActiveForm::end()?>
</div>