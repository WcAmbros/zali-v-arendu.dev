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
use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\imagine\Image;
use yii\validators\Validator;
use yii\web\UploadedFile;

class UploadImageBehavior extends Behavior
{

    public $fileAttribute = 'images';

    public $maxFileSize = null;

    public $maxFileCount = 9;

    public $fileTypes = 'image/jpeg,image/png';

    public $savePathAlias = '@app/uploads';

    public $list = array();

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

        if ($model->isNewRecord) {
            $this->list = [
                [
                    'original' => "uploads/noimage.jpg",
                    'thumbnail' => "uploads/th_noimage.jpg",
                    'slide' => "uploads/slide_noimage.jpg",
                ]
            ];
        }

        if ($model->{$this->fileAttribute} instanceof UploadedFile) {
            $files = $model->{$this->fileAttribute};
        } else {
            $files = UploadedFile::getInstances($model, $this->fileAttribute);
        }
        if (!empty($files)) {
            $this->list = array();
            $i = 0;
            foreach ($files as $file) {
                if ($file && $file->name && ($i++) < $this->maxFileCount) {
                    $model->{$this->fileAttribute} = $file;
                    $validator = Validator::createValidator('image', $model, $this->fileAttribute, [
                        'mimeTypes' => $this->fileTypes,
                    ]);
                    $validator->validateAttribute($model, $this->fileAttribute);
                    $errors = $model->getErrors();
                    if (empty($errors)) {
                        $this->uploadfile($file);
                    }
                }
            }
        }

        $this->owner->images = $this->list;
    }

    /**
     *
     * @param UploadedFile $file
     */
    public function uploadfile($file)
    {
        $img = Image::getImagine()->open($file->tempName);
        $name = Yii::$app->security->generateRandomString();
        preg_match('/\..*/i', $file->name, $extensions);
        $extension = $extensions[0];
        $size = $this->_box($img, [
                'width' => 100,
                'height' => 65,
            ]
        );

        $img->thumbnail($size)->save("uploads/hall/th_$name" . $extension);
        $size = $this->_box($img, [
                'width' => 336,
                'height' => 213,
            ]
        );
        $img->thumbnail($size)->save("uploads/hall/slide_$name" . $extension);
        $img->save("uploads/hall/$name" . $extension);

        $this->list[] = [
            'original' => "uploads/hall/$name" . $extension,
            'thumbnail' => "uploads/hall/th_$name" . $extension,
            'slide' => "uploads/hall/slide_$name" . $extension,
        ];
    }


    /**
     *
     * @param array $size
     * @param ImageInterface $img
     *
     * @return Box
     */
    private function _box($img, $size = array())
    {
        $img_size = $img->getSize();

        if (empty($size)) {

            /*  увеличение размера на 1, чтобы перезаписать изображение
             */

            $size['width'] = $img_size->getWidth() + 1;
            $size['height'] = $img_size->getHeight();
        }

        if ($img_size->getHeight() > $img_size->getWidth()) {
            $box = new Box($size['width'], $img_size->getHeight());
        } else {
            $box = new Box($img_size->getWidth(), $size['hieght']);
        }

        return $box;
    }
}