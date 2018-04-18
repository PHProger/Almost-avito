<?php 
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = "Список объявлений";
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
                <?php if(is_object($car->getImages()->one())):?>
                <img src="<?= $car->getImages()->one()['small']?>" alt="">
                <?php else:?>
                <img src="http://via.placeholder.com/146x106" alt="">
                <?php endif;?>
            </td>
            <td><?= $car->price ?></td>
            <td><?= $car->phone ?></td>
        </tr>
    <?php endforeach;?>
    </table>
    <?= yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
</div>