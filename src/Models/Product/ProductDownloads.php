<?php

namespace WooCommerceSDK\Models\Product;

use WooCommerceSDK\Models\General\Model;

/**
 * @property int $id File ID
 * @property string $name File name
 * @property string $file File URL
 */
class ProductDownloads extends Model
{

    /**
     * @param  string  $json
     * @return ProductDownloads[]
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return ProductDownloads
     */
    public static function getFromJson(string $json): ProductDownloads
    {
        return parent::getFromJson($json);
    }
}