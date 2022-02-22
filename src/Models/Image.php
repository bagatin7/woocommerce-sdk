<?php

namespace WooCommerceSDK\Models;

use DateTime;
use Exception;
use WooCommerceSDK\Models\General\Model;

/**
 * @property int $id Image ID
 * @property DateTime $date_created The date the image was created, in the site's timezone
 * @property DateTime $date_created_gmt The date the image was created, as GMT
 * @property DateTime $date_modified The date the image was last modified, in the site's timezone
 * @property DateTime $date_modified_gmt The date the image was last modified, as GMT
 * @property string $src Image URL
 * @property string $name Image name
 * @property string $alt Image alternative text
 */
class Image extends Model
{
    public static array $dates = ['date_created', 'date_created_gmt', 'date_modified', 'date_modified_gmt'];

    /**
     * @param  string  $json
     * @return Image[]
     * @throws Exception
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return Image
     * @throws Exception
     */
    public static function getFromJson(string $json): Image
    {
        return parent::getFromJson($json);
    }
}