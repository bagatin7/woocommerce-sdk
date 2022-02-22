<?php

namespace WooCommerceSDK\Models\Product;

/**
 * @ProductAttribute
 * @property int $id Attribute ID
 * @property string $name Attribute name
 * @property int $position Attribute position
 * @property bool $visible Define if the attribute is visible on the "Additional information" tab in the product's page. Default is `false`
 * @property bool $variation Define if the attribute can be used as variation. Default is `false`
 * @property array $options List of available term names of the attribute
 */
class ProductAttribute
{
    public int $id;
    public string $name;
    public int $position;
    public bool $visible;
    public bool $variation;
    public array $options;

    /**
     * @param  string  $json
     * @return ProductAttribute[]
     */
    public static function getGroupFromJson(string $json): array
    {
        $objects = json_decode($json);
        return array_map(fn($object) => self::getFromJson(json_encode($object)), $objects);
    }

    /**
     * @param  string  $json
     * @return ProductAttribute
     */
    public static function getFromJson(string $json): ProductAttribute
    {
        $object = json_decode($json);
        $attribute = new ProductAttribute();
        $attribute->id = $object->id;
        $attribute->name = $object->name;
        $attribute->position = $object->position;
        $attribute->visible = $object->visible;
        $attribute->variation = $object->variation;
        $attribute->options = $object->options;
        return $attribute;
    }
}