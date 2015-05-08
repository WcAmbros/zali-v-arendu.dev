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

class UploadImageBehavior extends Behavior{

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
            $file = $model->{$this->fileAttribute};
        } else {
            $file = UploadedFile::getInstance($model, $this->fileAttribute);
        }

        if ($file && $file->name) {
            $model->{$this->fileAttribute} = $file;
            $validator = Validator::createValidator('image', $model, $this->fileAttribute,  [
                'mimeTypes'=>$this->fileTypes,
            ]);
            $validator->validateAttribute($model, $this->fileAttribute);

//            if(count($model->getErrors())==0)
                $this->uploadfile($file);
        }
    }

    /**
     * @param UploadedFile $file
     * */
    public function uploadfile($file){
        $file->saveAs('uploads/'.$file->name);
    }

//    private function translit($name)
//    {
//        if ($this->translit) {
//            return Inflector::transliterate($name,'-', true );
//        } else {
//            return Inflector::slug( $name, '-', true );
//        }
//    }
}