<?php
    $this->title = "Автомобиль " . $car->model->brand->name . " " . $car->model->name;
?>
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <img src="<?= $car->getImages()->one()['medium']?>" alt="" class="img-responsive">
                </div>
            </div>
            <div class="row">
            <?php foreach($car->images as $image):?>
                <div class="col-xs-4">
                <img src="<?=$image->small?>" alt="" class="img-responsive">
                </div>
            <?php endforeach;?>
            </div>
        </div>
        <div class="col-xs-6">
            <h1><?= $car->model->brand->name ?> <?= $car->model->name ?></h1> 
            <p><b>Пробег:</b> <?= $car->mileage ?></p>
            <p><b>Цена:</b> <?= $car->price ?></p>  
            <p><b>Телефон:</b> <?= $car->phone ?></p>
            <?php if($car->options):?>
                <hr>
                <h2>Опции</h2>
                <ul class="car-options-list">
                    <?php foreach($car->options as $option):?>
                    <li><b><?=$option->name?></b></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
        </div>
    </div>
</div>