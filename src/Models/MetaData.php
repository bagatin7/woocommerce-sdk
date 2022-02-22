<?php

namespace WooCommerceSDK\Models;

use WooCommerceSDK\Models\General\Model;

/**
 * @property int $id Meta ID
 * @property string $key Meta key
 * @property $value Meta value
 */
class MetaData extends Model
{

    /**
     * @param  string  $json
     * @return MetaData[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return MetaData
     */
    public static function getFromJson(string $json): MetaData
    {
        return parent::getFromJson($json);
    }
}