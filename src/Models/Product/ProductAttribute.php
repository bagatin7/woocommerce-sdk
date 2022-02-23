<?php

namespace WooCommerceSDK\Models\Product;

use WooCommerceSDK\Models\General\Model;

/**
 * @ProductAttribute
 * @property int $id Attribute ID
 * @property string $name Attribute name
 * @property int $position Attribute position
 * @property bool $visible Define if the attribute is visible on the "Additional information" tab in the product's page. Default is `false`
 * @property bool $variation Define if the attribute can be used as variation. Default is `false`
 * @property array $options List of available term names of the attribute
 */
class ProductAttribute extends Model
{
    /**
     * @param  string  $json
     * @return ProductAttribute[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return ProductAttribute
     */
    public static function getFromJson(string $json): ProductAttribute
    {
        return parent::getFromJson($json);
    }
}