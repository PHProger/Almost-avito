<?php

namespace app\controllers;

use Yii;
use app\models\CarsOptions;
use app\models\Options;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;
class OptionController extends Controller
{
        public function actionIndex()
        {
            $options = Options::find()->all();
            return $this->render('list', compact('options'));
        }

        public function actionCreate($name) {
            $option = new Options();
            $option->name = $name;
            if($option->save()) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return Json::encode($option);
            }
        }

        public function actionDestroy($option_id)
        {
            $option = options::findOne($option_id);
            CarsOptions::deleteAll(['option_id' => $option->id]);
            if($option->delete()) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return Json::encode("success");
            }
        }
}