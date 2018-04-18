<?php
namespace app\models;

use Yii;
use app\models\Cars;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;

class Images extends ActiveRecord
{
    public function rules()
    {
        return [
            [['full'], 'file', 'extensions' => ['png', 'jpg', 'gif'], 'maxFiles' => 3],
    
        ];
    }
    
    public function getCar()
    {
        return $this->hasMany(Cars::className(), ['id' => 'car_id']);
    }

   static function uploadFile(UploadedFile $file, $car_id)
    {
        $image = new Images();
        $image->car_id = $car_id;
        $image->small = Self::generateImage($file,146,106, 'small', $car_id);
        $image->medium = Self::generateImage($file,720,540, 'medium', $car_id);
        $full_path = 'images/full/'.$car_id . '_' . $file->name;
        $image->full = '/' . $full_path;
        $file->saveAs(\Yii::getAlias('@web') . $full_path);
        $image->save();
    }

    static function generateImage($file, $width, $height, $path, $salt) {
        $canvas_w = $width;
        $canvas_h = $height;
        $canvas = imagecreatetruecolor($width, $height);

        $white = ImageColorAllocate($canvas, 255, 255, 255);
        ImageFill($canvas, 0, 0, $white);

        $image = new SimpleImage();
        $image->load($file->tempName);

        if($image->getWidth() > $image->getHeight()) {
            $image->resizeToWidth($width);
        } else {
            $image->resizeToHeight($height);
        }
        imagecopy($canvas, $image->image, (imagesx($canvas) - $image->getWidth())/2, (imagesy($canvas)- $image->getHeight())/2, 0, 0, $image->getWidth(), $image->getHeight());
        $public_path = 'images/' .$path.'/' .$salt . '_'. $file->name;
        $image_src = Yii::getAlias('@web') . $public_path;
        imagejpeg($canvas, $image_src, 100);
        
        return '/'. $public_path;
    }

    public function deleteWithFiles()
    {
        $alias = Yii::getAlias('@webroot');
        @ unlink($alias . $this->full);
        @ unlink($alias . $this->medium);
        @ unlink($alias . $this->small);

       $this->delete();

    }
}