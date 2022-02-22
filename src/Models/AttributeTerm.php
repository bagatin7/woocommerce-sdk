<?php

namespace WooCommerceSDK\Models;

use WooCommerceSDK\Models\General\Model;

/**
 * @property-read int $id Unique identifier for the resource
 * @property string $name Term name
 * @property string $slug An alphanumeric identifier for the resource unique to its type
 * @property string $description HTML description of the resource
 * @property int $menuOrder Menu order, used to custom sort the resource
 * @property-read int $count Number of published products for the resource
 */
class AttributeTerm extends Model
{

    /**
     * @param  string  $json
     * @return AttributeTerm[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return AttributeTerm
     */
    public static function getFromJson(string $json): AttributeTerm
    {
        return parent::getFromJson($json);
    }
}