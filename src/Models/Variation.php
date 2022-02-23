<?php

namespace WooCommerceSDK\Models;

use Carbon\Carbon;
use WooCommerceSDK\Models\General\Model;
use WooCommerceSDK\Models\Product\ProductDownloads;

/**
 * @property-read int $id Unique identifier for the resource
 * @property-read Carbon $date_created The date the variation was created, in the site's timezone
 * @property-read Carbon $date_created_gmt The date the variation was created, as GMT
 * @property-read Carbon $date_modified The date the variation was last modified, in the site's timezone
 * @property-read Carbon $date_modified_gmt The date the variation was last modified, as GMT
 * @property string $description Variation description
 * @property-read string $permalink Variation URL
 * @property string $sku Unique identifier
 * @property-read string $price Current variation price
 * @property string $regular_price Variation regular price
 * @property string $sale_price Variation sale price
 * @property Carbon $date_on_sale_from Start date of sale price, in the site's timezone
 * @property Carbon $date_on_sale_from_gmt Start date of sale price, as GMT
 * @property Carbon $date_on_sale_to End date of sale price, in the site's timezone
 * @property Carbon $date_on_sale_to_gmt End date of sale price, as GMT
 * @property-read bool $on_sale Shows if the variation is on sale
 * @property string $status Variation status. Options: `draft`, `pending`, `private` and `publish`. Default is `publish`
 * @property-read bool $purchasable Shows if the variation can be bought
 * @property bool $virtual If the variation is virtual. Default is `false`
 * @property bool $downloadable If the variation is downloadable. Default is `false`
 * @property ProductDownloads[] $downloads List of downloadable files
 * @property int $download_limit Number of times downloadable files can be downloaded after purchase. Default is `-1`
 * @property int $download_expiry Number of days until access to downloadable files expires. Default is `-1`
 * @property string $tax_status Tax status. Options: `taxable`, `shipping` and `none`. Default is `taxable`
 * @property string $tax_class Tax class
 * @property bool $manage_stock Stock management at variation level. Default is `false`
 * @property int $stock_quantity Stock quantity
 * @property string $stock_status Controls the stock status of the product. Options: `instock`, `outofstock`, `onbackorder`. Default is `instock`
 * @property string $backorders If managing stock, this controls if backorders are allowed. Options: `no`, `notify` and `yes`. Default is `no`
 * @property-read bool $backorders_allowed Shows if backorders are allowed
 * @property-read bool $backordered Shows if the variation is on backordered
 * @property string $weight Variation weight
 * @property Dimensions $dimensions Variation dimensions
 * @property string $shipping_class Shipping class slug
 * @property-read string $shipping_class_id Shipping class ID
 * @property Image $image Variation image data
 * @property Attribute[] $attributes List of attributes
 * @property int $menu_order Menu order, used to custom sort products
 * @property MetaData[] $meta_data Meta data
 */
class Variation extends Model
{
    public static array $dates = [
        'date_created',
        'date_created_gmt',
        'date_modified',
        'date_modified_gmt',
        'date_on_sale_from',
        'date_on_sale_from_gmt',
        'date_on_sale_to',
        'date_on_sale_to_gmt'
    ];

    public static array $array_of_objects = [
        'attributes' => Attribute::class,
        'meta_data' => MetaData::class,
        'downloads' => ProductDownloads::class
    ];

    public static array $objects = [
        "image" => Image::class,
        "dimensions" => Dimensions::class
    ];
}