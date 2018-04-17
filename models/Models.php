<?php
namespace app\models;

use yii\db\ActiveRecord;

class Models extends ActiveRecord
{
    public function getBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }
}