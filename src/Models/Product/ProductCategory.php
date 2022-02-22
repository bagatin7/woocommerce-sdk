<?php

namespace WooCommerceSDK\Models\Product;

/**
 * @property int $id
 * @property-read string $name
 * @property-read string $slug
 */
class ProductCategory
{
    public int $id;
    public string $name;
    public string $slug;

    /**
     * @param  string  $json
     * @return ProductCategory[]
     */
    public static function getGroupFromJson(string $json): array
    {
        $objects = json_decode($json);
        return array_map(fn($object) => self::getFromJson(json_encode($object)), $objects);
    }

    /**
     * @param  string  $json
     * @return ProductCategory
     */
    public static function getFromJson(string $json): ProductCategory
    {
        $object = json_decode($json);
        $category = new ProductCategory();
        $category->id = $object->id;
        $category->name = $object->name;
        $category->slug = $object->slug;
        return $category;
    }
}