<?php
namespace common\behaviors;


use dosamigos\transliterator\TransliteratorHelper;
use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

class Slug extends Behavior
{
    public $in_attribute = 'name';
    public $out_attribute = 'alias';
    public $translit = true;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'getSlug'
        ];
    }

    public function getSlug( $event )
    {
        $attr = empty( $this->owner->{$this->out_attribute}) ?
            $this->in_attribute : $this->out_attribute;

        $this->owner->{$this->out_attribute} = $this->generateSlug( $this->owner->{$attr} );
    }

    private function generateSlug( $slug )
    {
        $slug = $this->slugify( $slug );
        if ( $this->checkUniqueSlug( $slug ) ) {
            return $slug;
        } else {
            for ( $suffix = 2; !$this->checkUniqueSlug( $new_slug = $slug . '-' . $suffix ); $suffix++ ) {}
            return $new_slug;
        }
    }

    private function slugify( $slug )
    {
        if ( $this->translit ) {
            return Inflector::slug( TransliteratorHelper::process( $slug ), '-', true );
        } else {
            return $this->slug( $slug, '-', true );
        }
    }

    private function slug( $string, $replacement = '-', $lowercase = true )
    {
        $string = preg_replace( '/[^\p{L}\p{Nd}]+/u', $replacement, $string );
        $string = trim( $string, $replacement );
        return $lowercase ? strtolower( $string ) : $string;
    }

    private function checkUniqueSlug( $slug )
    {
        $pk = $this->owner->primaryKey();
        $pk = $pk[0];

        $condition = $this->out_attribute . ' = :alias';
        $params = [ ':alias' => $slug ];
        if ( !$this->owner->isNewRecord ) {
            $condition .= ' and ' . $pk . ' != :pk';
            $params[':pk'] = $this->owner->{$pk};
        }

        return !$this->owner->find()
            ->where( $condition, $params )
            ->one();
    }
}