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
    public function actionGetBrandModels($brand_id = null)
    {
        if(is_null($brand_id)) {
            return false;
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return Json::encode(Models::find()->where(['brand_id' => $brand_id])->all());
        }
    }
}