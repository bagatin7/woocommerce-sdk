<?php

namespace WooCommerceSDK\Models\Product;

use WooCommerceSDK\Models\General\Model;

/**
 * @property int $id Tag ID
 * @property-read string $name Tag name
 * @property-read string $slug Tag slug
 */
class ProductTag extends Model
{

    /**
     * @param  string  $json
     * @return ProductTag[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return ProductTag
     */
    public static function getFromJson(string $json): ProductTag
    {
        return parent::getFromJson($json);
    }
}