<?php

namespace WooCommerceSDK\Models;

use DateTime;
use Exception;
use WooCommerceSDK\Models\General\Model;

/**
 * @property int $id Unique identifier for the resource
 * @property DateTime $date_created The date the review was created, in the site's timezone
 * @property DateTime $date_created_gmt The date the review was created, as GMT
 * @property int $product_id Unique identifier for the product that the review belongs to
 * @property string $status Status of the review. Options: `approved`, `hold`, `spam`, `unspam`, `trash` and `untrash`. Defaults to `approved`
 * @property string $reviewer Reviewer name
 * @property string $reviewer_email Reviewer email
 * @property string $review The content of the review
 * @property int $rating Review rating (0 to 5)
 * @property bool $verified Shows if the reviewer bought the product or not
 */
class Review extends Model
{

    public static array $dates = ['date_created', 'date_created_gmt'];

    /**
     * @param  string  $json
     * @return Review[]
     * @throws Exception
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return Review
     * @throws Exception
     */
    public static function getFromJson(string $json): Review
    {
        return parent::getFromJson($json);
    }
}