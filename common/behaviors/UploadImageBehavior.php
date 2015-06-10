<?php
/**
 * Created by PhpStorm.
 * User: sz
 *
 * @author Zakharov Stanislav <zahs88@gmail.com>
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

/**
 * Class UploadImageBehavior
 * @package common\behaviors
 */
class UploadImageBehavior extends Behavior
{

    /**
     * @var string
     */
    public $fileAttribute = 'images';

    /**
     * @var null
     */
    public $maxFileSize = null;

    /**
     * @var int
     */
    public $maxFileCount = 9;

    /**
     * @var string
     */
    public $fileTypes = 'image/jpeg,image/png';

    /**
     * @var string
     */
    public $savePathAlias = '@app/uploads';

    /**
     * @var array
     */
    public $list = array();

    /**
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    /**
     * @param $event
     */
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

        $size['thumbnail'] = new Box(100, 65);
        $size['slide'] = new Box(336, 213);

        $this->_image($file->tempName, "uploads/hall/{$name}{$extension}", $img->getSize());

        foreach ($size as $key => $value) {
            $destination = "uploads/hall/{$key}_{$name}{$extension}";
            $this->_image($file->tempName, $destination, $value);
            $list[$key] = $destination;
        }
        $list['original'] = "uploads/hall/$name" . $extension;
        $this->list[] = $list;
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