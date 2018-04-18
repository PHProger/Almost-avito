<?php
namespace app\models;

use app\models\Cars;
use yii\db\ActiveRecord;

class Models extends ActiveRecord
{
    public function getBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }

    public function getCars()
    {
        return $this->hasMany(Cars::className(), ['model_id' => 'id']);
    }

}