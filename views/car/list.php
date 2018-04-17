<?php 
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="container">
    <table class="table">
    <tr>
        <th>Название</th>
        <th>Миниатюра</th>
        <th>Цена</th>
        <th>Телефон</th>
    </tr>
    <?php foreach($cars as $car):?>
        <tr>
            <td>
                <a href="<?=Url::to(['car/card', 'id' => $car->id])?>">
                    <?= $car->model->brand->name ?> <?= $car->model->name ?>
                </a>
            </td>
            <td>
                <img src="<?= var_dump($car->images)?>" alt="">
            </td>
            <td><?= $car->price ?></td>
            <td><?= $car->phone ?></td>
        </tr>
    <?php endforeach;?>
    <?= yii\widgets\LinkPager::widget(['pagination' => $pages,]); ?>
    </table>
</div>