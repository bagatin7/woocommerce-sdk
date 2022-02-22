<?php

namespace WooCommerceSDK\Models\Product;

/**
 * @property int $id Tag ID
 * @property-read string $name Tag name
 * @property-read string $slug Tag slug
 */
class ProductTag
{
    public int $id;
    public string $name;
    public string $slug;

    /**
     * @param  string  $json
     * @return ProductTag[]
     */
    public static function getGroupFromJson(string $json): array
    {
        $objects = json_decode($json);
        return array_map(fn($object) => self::getFromJson(json_encode($object)), $objects);
    }

    /**
     * @param  string  $json
     * @return ProductTag
     */
    public static function getFromJson(string $json): ProductTag
    {
        $object = json_decode($json);
        $tag = new ProductTag();
        $tag->id = $object->id;
        $tag->name = $object->name;
        $tag->slug = $object->slug;
        return $tag;
    }
}