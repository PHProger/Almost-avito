<?php
    $this->title = "Автомобиль " . $car->model->brand->name . " " . $car->model->name;
?>
<div class="container">
    <div class="row">
    <div class="col-xs-6"></div>
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