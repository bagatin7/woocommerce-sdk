<?php

namespace WooCommerceSDK\Models;

use WooCommerceSDK\Models\General\Model;

/**
 * @property-read int $id Unique identifier for the resource
 * @property string $name Attribute name
 * @property string $slug An alphanumeric identifier for the resource unique to its type
 * @property string $type Type of attribute. By default only `select` is supported
 * @property string $orderBy Default sort order. Options: `menu_order`, `name`, `name_num` and `id`. Default is `menu_order`
 * @property string $hasArchives Enable/Disable attribute archives. Default is `false`
 */
class Attribute extends Model
{

    /**
     * @param  string  $json
     * @return Attribute[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return Attribute
     */
    public static function getFromJson(string $json): Attribute
    {
        return parent::getFromJson($json);
    }
}