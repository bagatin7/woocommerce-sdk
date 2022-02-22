<?php

namespace WooCommerceSDK\Utils;

class Caster
{
    public static function objectToObject($instance, $className)
    {
        return unserialize(
            sprintf(
                'O:%d:"%s"%s',
                strlen($className),
                $className,
                strstr(strstr(serialize($instance), '"'), ':')
            )
        );
    }

    public static function arrayToObject(array $array, $className)
    {
        return unserialize(
            sprintf(
                'O:%d:"%s"%s',
                strlen($className),
                $className,
                strstr(serialize($array), ':')
            )
        );
    }
}