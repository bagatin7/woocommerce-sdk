<?php

namespace WooCommerceSDK\Models\Product;

use WooCommerceSDK\Models\General\Model;

/**
 * @property int $id Category ID
 * @property-read string $name Category name
 * @property-read string $slug Category slug
 */
class ProductCategory extends Model
{

    /**
     * @param  string  $json
     * @return ProductCategory[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return ProductCategory
     */
    public static function getFromJson(string $json): ProductCategory
    {
        return parent::getFromJson($json);
    }
}