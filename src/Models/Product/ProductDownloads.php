<?php

namespace WooCommerceSDK\Models\Product;

/**
 * @property int $id File ID
 * @property string $name File name
 * @property string $file File URL
 */
class ProductDownloads
{
    public int $id;
    public string $name;
    public string $file;

    /**
     * @param  string  $json
     * @return ProductDownloads[]
     */
    public static function getGroupFromJson(string $json): array
    {
        $objects = json_decode($json);
        return array_map(fn($object) => self::getFromJson(json_encode($object)), $objects);
    }

    /**
     * @param  string  $json
     * @return ProductDownloads
     */
    public static function getFromJson(string $json): ProductDownloads
    {
        $object = json_decode($json);
        $download = new ProductDownloads();
        $download->id = $object->id;
        $download->name = $object->name;
        $download->file = $object->file;
        return $download;
    }
}