<?php

namespace WooCommerceSDK\Models;

use WooCommerceSDK\Models\General\Model;

/**
 * @property-read int $id Unique identifier for the resource
 * @property string $name Tag name
 * @property string $slug An alphanumeric identifier for the resource unique to its type
 * @property string $description HTML description of the resource
 * @property-read int $count Number of published products for the resource
 */
class Tag extends Model
{

    /**
     * @param  string  $json
     * @return Tag[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return Tag
     */
    public static function getFromJson(string $json): Tag
    {
        return parent::getFromJson($json);
    }
}