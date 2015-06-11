<?php

namespace frontend\models;

use common\models\Town;
use Yii;

/**
 * @property integer $id
 * @property string $name
 * @property string $subdomain
 */
class Region extends Town
{
    /**
     * @return null|Town
     */
    public function currentRegion()
    {
        $region = null;
        if (preg_match('/[^\.]+/i', str_replace('www.', '', $_SERVER['SERVER_NAME']), $matches)) {
            $subdomain = $matches[0];
            $region = $this->findOne(['subdomain' => $subdomain]);
        }
        return $region;
    }

    /**
     * @return Town
     */
    public function defaultRegion()
    {
        return $this->findOne(['subdomain' => 'spb']);
    }
}
