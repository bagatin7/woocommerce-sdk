<?php

namespace WooCommerceSDK\Models;

use Exception;
use WooCommerceSDK\Models\General\Model;

/**
 * @property-read int $id Unique identifier for the resource
 * @property string $name Category name
 * @property string $slug An alphanumeric identifier for the resource unique to its type
 * @property int $parent The ID for the parent of the resource
 * @property string $description HTML description of the resource
 * @property string $display Category archive display type. Options: `default`, `products`, `subcategories` and `both`. Default is `default`
 * @property Image $image Image data
 * @property int $menuOrder Menu order, used to custom sort the resource
 * @property-read int $count Number of published products for the resource
 */
class Category extends Model
{

    public static array $objects = [
      "image" => Image::class
    ];

    /**
     * @param  string  $json
     * @return Category[]
     * @throws Exception
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return Category
     * @throws Exception
     */
    public static function getFromJson(string $json): Category
    {
        return parent::getFromJson($json);
    }
}