<?php
namespace common\behaviors;


use dosamigos\transliterator\TransliteratorHelper;
use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

/**
 * Class Slug
 * @package common\behaviors
 */
class SlugBehavior extends Behavior
{
    /**
     * @var string
     */
    public $in_attribute = 'name';
    /**
     * @var string
     */
    public $out_attribute = 'alias';
    /**
     * @var bool
     */
    public $translit = true;

    /**
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'getSlug'
        ];
    }

    /**
     * @param $event
     */
    public function getSlug($event)
    {
        $attr = empty($this->owner->{$this->out_attribute}) ?
            $this->in_attribute : $this->out_attribute;

        if(trim($this->owner->{$this->out_attribute})=='')
            $this->owner->{$this->out_attribute} = $this->generateSlug($this->owner->{$attr});
    }

    /**
     * @param $slug
     * @return string
     */
    private function generateSlug($slug)
    {
        $slug = $this->slugify($slug);
        if ($this->checkUniqueSlug($slug)) {
            return $slug;
        } else {
            for ($suffix = 2; !$this->checkUniqueSlug($new_slug = $slug . '-' . $suffix); $suffix++) {
            }
            return $new_slug;
        }
    }

    /**
     * @param $slug
     * @return string
     */
    private function slugify($slug)
    {
        if ($this->translit) {
            return Inflector::slug(TransliteratorHelper::process($slug), '-', true);
        } else {
            return $this->slug($slug, '-', true);
        }
    }

    /**
     * @param $string
     * @param string $replacement
     * @param bool $lowercase
     * @return string
     */
    private function slug($string, $replacement = '-', $lowercase = true)
    {
        $string = preg_replace('/[^\p{L}\p{Nd}]+/u', $replacement, $string);
        $string = trim($string, $replacement);
        return $lowercase ? strtolower($string) : $string;
    }

    /**
     * @param $slug
     * @return bool
     */
    private function checkUniqueSlug($slug)
    {
        $pk = $this->owner->primaryKey();
        $pk = $pk[0];

        $condition = $this->out_attribute . ' = :alias';
        $params = [':alias' => $slug];
        if (!$this->owner->isNewRecord) {
            $condition .= ' and ' . $pk . ' != :pk';
            $params[':pk'] = $this->owner->{$pk};
        }

        return !$this->owner->find()
            ->where($condition, $params)
            ->one();
    }
}