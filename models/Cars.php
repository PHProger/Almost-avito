<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Cars extends ActiveRecord
{
    public function rules()
    {
        return [
            [['mileage'], 'safe'],
            [['price', 'phone', 'model_id'], 'required']
        ];
    }

    public function getModel()
    {
        return $this->hasOne(Models::className(), ['id' => 'model_id']);
    }

    public function getImages()
    {
        return $this->hasMany(Images::className(), ['car_id' => 'id']);
    }

    public function getOptions(){
        return $this->hasMany(Options::className(), ['id' => 'option_id'])
            ->viaTable('cars_options', ['car_id' => 'id']);
    }
    
   public function getCheckedOptions()
   {
       $checked_options = $this->getOptions()->select('id')->asArray()->all();
       return ArrayHelper::getColumn($checked_options, 'id');
   }

   public function setOptions($options)
   {
       $this->clearOptions();

       foreach($options as $option_id) {
           $option = Options::findOne($option_id);
           $this->link('options', $option);
       }
    }

    public function clearOptions()
    {
        CarsOptions::deleteAll(['car_id' => $this->id]);
    }

    public function deleteWithImages()
    {
       foreach($this->images as $image) {
           $image->deleteWithFiles();
       }
       
       $this->delete();
    }

}