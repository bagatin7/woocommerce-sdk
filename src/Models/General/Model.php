<?php

namespace WooCommerceSDK\Models\General;

use DateTime;
use Exception;
use JsonSerializable;
use WooCommerceSDK\Models\Product;

class Model implements JsonSerializable
{
    public static array $dates = [];

    public static array $array_of_objects = [];

    public static array $objects = [];

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->{$property};
        }
        return null;
    }

    /**
     * @throws Exception
     */
    public function __set($property, $value)
    {
        if (in_array($property, array_keys(static::$array_of_objects))) {
            $value = (static::$array_of_objects[$property])::getGroupFromJson(json_encode($value));
        }
        if (in_array($property, array_keys(static::$objects))) {
            $value = (static::$objects[$property])::getFromJson(json_encode($value));
        }
        if (in_array($property, static::$dates) and !$value instanceof DateTime) {
            $value = new DateTime($value);
        }
        $this->$property = $value;
    }


    /**
     * @param  string  $json
     * @return array
     */
    public static function getGroupFromJson(string $json): array
    {
        $objects = json_decode($json);
        return array_map(fn($object) => self::getFromJson(json_encode($object)), $objects);
    }

    /**
     * @param  string  $json
     * @return mixed
     */
    public static function getFromJson(string $json)
    {
        $object = json_decode($json);
        $product = new static();
        var_dump(get_class($product));
        foreach ($object as $key => $value) {
            $product->$key = $value;
        }
        return $product;
    }

    public function jsonSerialize(): array
    {
        $array = (array)$this;
        foreach ($array as $key => $value) {
            if (in_array($key, static::$dates)) {
                $array[$key] = ($value)->format(DateTime::ATOM);
            }
        }
        return $array;
    }
}