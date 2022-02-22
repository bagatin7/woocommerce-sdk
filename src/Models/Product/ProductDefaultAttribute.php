<?php

namespace WooCommerceSDK\Models\Product;

/**
 * @property int $id Attribute ID
 * @property string $name Attribute name
 * @property string $option Selected attribute term name
 */
class ProductDefaultAttribute
{
    public int $id;
    public string $name;
    public string $option;

    /**
     * @param  string  $json
     * @return ProductDefaultAttribute[]
     */
    public static function getGroupFromJson(string $json): array
    {
        $objects = json_decode($json);
        return array_map(fn($object) => self::getFromJson(json_encode($object)), $objects);
    }

    /**
     * @param  string  $json
     * @return ProductDefaultAttribute
     */
    public static function getFromJson(string $json): ProductDefaultAttribute
    {
        $object = json_decode($json);
        $default = new ProductDefaultAttribute();
        $default->id = $object->id;
        $default->name = $object->name;
        $default->option = $object->option;
        return $default;
    }
}