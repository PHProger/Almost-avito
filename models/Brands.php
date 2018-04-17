<?php
namespace app\models;

use yii\db\ActiveRecord;

class Brands extends ActiveRecord
{
    public function getModels()
    {
        return $this->hasMany(Models::className(), ['brand_id' => 'id']);
    }
}