<?php
/**
 * Created by PhpStorm.
 * User: sz
 *
 * @author Zakharov Stanislav <zahs88@gmail.com>
 */

namespace common\behaviors;

use Imagine\Image\Box;
use Imagine\Image\Point;
use yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * Class UploadImageBehavior
 * @package common\behaviors
 */
class HallImageBehavior extends ImageBehavior
{

    /**
     * @var string
     */
    public $fileAttribute = 'images';


    /**
     * @var int
     */
    public $maxFileCount = 9;

    /**
     * @var array
     */
    public $list = [];

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

        if ($model->{$this->fileAttribute} instanceof UploadedFile) {
            $files = $model->{$this->fileAttribute};
        } else {
            $files = UploadedFile::getInstances($model, $this->fileAttribute);
        }


        $i = 0;
        foreach ($files as $file) {
            if ($file && $file->name && ($i++) < $this->maxFileCount) {
                $model->{$this->fileAttribute} = $file;
                if($this->isValid($model)){
                    $this->save($file);
                }
            }
        }

        if(empty($this->list))
            $this->list[] = $this->getDefaultList();

        $this->owner->images = $this->list;
    }

    /**
     *
     * @param UploadedFile $file
     */
    public function save($file)
    {
        $list=[];
        $name = Yii::$app->security->generateRandomString();
        $extension = $this->getExtension($file);

        $list_size=$this->getDefaultSize();

        foreach ($list_size as $key => $size) {

            $prefix=($key=='original')?"":$key."_";
            $path = $this->savePathAlias."/hall/{$prefix}{$name}{$extension}";

            if($this->_image($file->tempName, $path, $size)){
                $list[$key] = $path;
            }

        }

        if(!empty($list))
            $this->list[] = $list;
    }

    public  function getDefaultList(){
        return [
            'original' => "uploads/noimage.jpg",
            'thumbnail' => "uploads/th_noimage.jpg",
            'slide' => "uploads/slide_noimage.jpg",
        ];
    }

    public function getDefaultSize(){

        $size['original'] = new Box(1024, 768);
        $size['thumbnail'] = new Box(100, 65);
        $size['slide'] = new Box(336, 213);

        return $size;
    }

}