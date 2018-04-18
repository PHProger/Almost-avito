<?php

namespace app\controllers;

use Yii;
use app\models\Brands;
use app\models\Cars;
use app\models\Images;
use app\models\Models;
use app\models\Options;
use app\models\CarsOptions;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\data\Pagination;


class CarController extends Controller
{

    public function actionCard($id = null)
    {
        $car = Cars::find()->where(['id' => $id])->one();
        return $this->render('card', compact('car'));
    }

    public function actionEdit($id = null)
    {
        $car = $id == null? new Cars(): Cars::find()->where(['id' => $id])->one();
        $brands = Brands::find()->all();
        $options = Options::find()->all();
        $checked_options = $car->getCheckedOptions();
        return $this->render('form', compact('car', 'brands', 'options', 'checked_options'));
    }

    public function actionUpdate($id = null)
    {
        $car = $id == null? new Cars(): Cars::find()->where(['id' => $id])->one();

        $files = UploadedFile::getInstances(new Images(),'full');
        foreach($files as $file) {
           Images::uploadFile($file, $car->id);
        }
        if($car->load(Yii::$app->request->post(), 'Cars')){
            if($car->save()) {
                if(isset(Yii::$app->request->post()['Cars']['options'])) {
                    $car->setOptions(Yii::$app->request->post()['Cars']['options']);
                } else {
                    $car->clearOptions();
                }
                return  $this->redirect(['car/edit', 'id' => $car->id]);
            }
        }

    }
}