<?php

namespace app\controllers;

use Yii;
use app\models\Brands;
use app\Models\Cars;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;

class BrandController extends Controller
{
    
    public function actionIndex() {
        $brands = Brands::find()->all();
        return $this->render('list', [
            'brands' => $brands
        ]);
    }

    public function actionCreate($name) {
        $brand = new Brands();
        $brand->name = $name;
        if($brand->save()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return Json::encode($brand);
        }
    }

    public function actionUpdate() {

    }

    public function actionDestroy($brand_id)
    {
        $brand = Brands::findOne($brand_id);
        foreach($brand->models as $model) {
            Cars::deleteAll(['model_id' => $model->id]);
            $model->delete();
        }
        if($brand->delete()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return Json::encode("success");
        }
    }

}