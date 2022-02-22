<?php

namespace WooCommerceSDK\Models;

use WooCommerceSDK\Models\General\Model;

/**
 * @property string $length Product length
 * @property string $width Product width
 * @property string $height Product height
 */
class Dimensions extends Model
{

    /**
     * @param  string  $json
     * @return Dimensions[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return Dimensions
     */
    public static function getFromJson(string $json): Dimensions
    {
        return parent::getFromJson($json);
    }
}