<?php

namespace WooCommerceSDK\Models\Product;

use WooCommerceSDK\Models\General\Model;

/**
 * @property int $id Attribute ID
 * @property string $name Attribute name
 * @property string $option Selected attribute term name
 */
class ProductDefaultAttribute extends Model
{

    /**
     * @param  string  $json
     * @return ProductDefaultAttribute[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return ProductDefaultAttribute
     */
    public static function getFromJson(string $json): ProductDefaultAttribute
    {
        return parent::getFromJson($json);
    }
}