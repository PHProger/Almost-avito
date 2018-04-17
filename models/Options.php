<?php
namespace app\models;

use yii\db\ActiveRecord;

class Options extends ActiveRecord
{
    public function getCars(){
        return $this->hasMany(Cars::className(), ['id' => 'car_id'])
            ->viaTable('cars_options', ['option_id' => 'id']);
    }
}