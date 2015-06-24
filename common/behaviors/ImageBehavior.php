<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 14.04.2015
 * Time: 9:54
 */

namespace common\behaviors;

use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\imagine\Image;
use yii\validators\Validator;
use yii\web\UploadedFile;

class ImageBehavior extends Behavior{


    public $fileAttribute = 'image';

    public $maxFileSize = null;

    public $fileTypes = 'image/jpeg,image/png';

    public $savePathAlias = 'uploads';


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


        foreach($files as $file){
            if ($file && $file->name){
                $model->{$this->fileAttribute} = $file;

                if($this->isValid($model)){
                    $this->save($file);
                }
            }
        }
    }


    /**
     * @param UploadedFile $file
     * */
    public function save($file){
        $name=Yii::$app->security->generateRandomString();

        $path=$this->savePathAlias."/profile/icon_$name".$this->getExtension($file);

        if($this->_image($file->tempName,$path,new Box(26,26))){

            if(trim($this->owner->images)!='')$this->removeImage($this->owner->images);

            $this->owner->images=$path;
        }

    }

    public function getExtension($file){
        preg_match('/\..*/i',$file->name,$extensions);
        return $extensions[0];
    }

    public function removeImage($path){
        return unlink($path);
    }
    /**
     * @var ActiveRecord $model
     *
     * @return bool
     */
    public function isValid($model){
        $validator = Validator::createValidator('image', $model, $this->fileAttribute,  [
            'mimeTypes'=>$this->fileTypes,
        ]);
        $validator->validateAttribute($model, $this->fileAttribute);
        $errors=$model->getErrors();
        if(empty($errors)){
            return true;
        }else{
            return false;
        }
    }

    /**
     *
     * @param Box $size
     * @param string $source
     * @param string $destination
     *
     * @return bool
     */
    public function _image($source, $destination, $size)
    {
        /**@var ImageInterface $resizeimg */

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

        return $preserve->paste($resizeimg, new Point($startX, $startY))->save($destination);
    }

}