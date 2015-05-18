<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 14.04.2015
 * Time: 9:54
 */

namespace common\behaviors;

use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\validators\Validator;
use yii\imagine\Image;
use Imagine\Image\Box;

class UploadImageBehavior extends Behavior{

    public $fileAttribute = 'images';

    public $maxFileSize = null;

    public $maxFileCount=9;

    public $fileTypes = 'image/jpeg,image/png';

    public $savePathAlias = '@app/uploads';

    public $list=[
        [
            'original'=>"uploads/noimage.jpg",
            'thumbnail'=>"uploads/th_noimage.jpg",
            'slide'=>"uploads/slide_noimage.jpg",
        ]
    ];

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
            $this->list=array();
            $i=0;
            foreach($files as $file){
                if ($file && $file->name && ($i++) < $this->maxFileCount){
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

        $this->owner->images=$this->list;
    }

    /**
     * @param UploadedFile $file
     * */
    public function uploadfile($file){
        $img = Image::getImagine()->open($file->tempName);
        $name=Yii::$app->security->generateRandomString();
        preg_match('/\..*/i',$file->name,$extensions);
        $extension=$extensions[0];
        $size= new Box(65,100);
        $img->thumbnail($size)->save("uploads/hall/th_$name".$extension);
        $size= new Box(213,336);
        $img->thumbnail($size)->save("uploads/hall/slide_$name".$extension);
        $img->save("uploads/hall/$name".$extension);

        $this->list[]=[
            'original'=>"uploads/hall/$name".$extension,
            'thumbnail'=>"uploads/hall/th_$name".$extension,
            'slide'=>"uploads/hall/slide_$name".$extension,
            ];

    }
}