<?php

namespace WooCommerceSDK\Models;

use WooCommerceSDK\Models\General\Model;

/**
 * @property-read int $id Unique identifier for the resource
 * @property string $name Shipping class name
 * @property string $slug An alphanumeric identifier for the resource unique to its type
 * @property string $description HTML description of the resource
 * @property-read int $countNumber of published products for the resource
 */
class ShippingClass extends Model
{

    /**
     * @param  string  $json
     * @return ShippingClass[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return ShippingClass
     */
    public static function getFromJson(string $json): ShippingClass
    {
        return parent::getFromJson($json);
    }
}