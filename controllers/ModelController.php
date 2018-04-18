<?php

namespace app\controllers;
use app\models\Brands;
use app\models\Models;
use yii\web\Controller;
use yii\web\Response;
use Yii;
use yii\helpers\Json;


class ModelController extends Controller
{

    public function actionIndex()
    {
        $brands = Brands::find()->all();
        return $this->render('list', compact('brands'));
    }

    public function actionGetBrandModels($brand_id = null)
    {
        if(is_null($brand_id)) {
            return false;
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return Json::encode(Models::find()->where(['brand_id' => $brand_id])->all());
        }
    }

    public function actionDestroy($model_id)
    {
        $model = Models::findOne($model_id);
        foreach($model->cars as $car) {
            $car->deleteWithImages();
        }
        if($model->delete()) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return Json::encode("success");
        }
    }
}