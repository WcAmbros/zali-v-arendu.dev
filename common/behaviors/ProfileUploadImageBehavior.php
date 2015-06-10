<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 14.04.2015
 * Time: 9:54
 */

namespace common\behaviors;

use Imagine\Image\Box;
use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\imagine\Image;
use yii\validators\Validator;
use yii\web\UploadedFile;

class ProfileUploadImageBehavior extends Behavior{


    public $fileAttribute = 'image';

    public $maxFileSize = null;

    public $fileTypes = 'image/jpeg,image/png';

    public $savePathAlias = '@app/uploads';


    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    public function beforeValidate($event)
    {
        /** @var ActiveRecord $model */
        $model = $this->owner;
        if ($model->{$this->fileAttribute} instanceof UploadedFile) {
            $files = $model->{$this->fileAttribute};
        } else {
            $files = UploadedFile::getInstances($model, $this->fileAttribute);
        }
        if(!empty($files)){
            foreach($files as $file){
                if ($file && $file->name){
                    $model->{$this->fileAttribute} = $file;

                    $validator = Validator::createValidator('image', $model, $this->fileAttribute,  [
                        'mimeTypes'=>$this->fileTypes,
                    ]);
                    $validator->validateAttribute($model, $this->fileAttribute);
                    $errors=$model->getErrors();
                    if(empty($errors)){
                        $this->uploadfile($file);
                    }
                }
            }
        }
    }

    /**
     * @param UploadedFile $file
     * */
    public function uploadfile($file){
        $name=Yii::$app->security->generateRandomString();
        preg_match('/\..*/i',$file->name,$extensions);

        $extension=$extensions[0];
        $destination="uploads/profile/icon_$name".$extension;
        $this->_image($file->tempName,$destination,new Box(26,26));
        if(trim($this->owner->images)!=''){
            unlink($this->owner->images);
        }
        $this->owner->images=$destination;
    }


    /**
     *
     * @param Box $size
     * @param string $source
     * @param string $destination
     *
     * @return void
     */
    private function _image($source, $destination, $size)
    {
        $width = $size->getWidth();
        $height = $size->getHeight();
        $mode = ImageInterface::THUMBNAIL_OUTBOUND;

        $resizeimg = Image::getImagine()->open($source)
            ->thumbnail($size, $mode);
        $sizeR = $resizeimg->getSize();
        $widthR = $sizeR->getWidth();
        $heightR = $sizeR->getHeight();

        $preserve = Image::getImagine()->create($size);
        $startX = $startY = 0;
        if ($widthR < $width) {
            $startX = ($width - $widthR) / 2;
        }
        if ($heightR < $height) {
            $startY = ($height - $heightR) / 2;
        }
        $preserve->paste($resizeimg, new Point($startX, $startY))
            ->save($destination);

    }
}