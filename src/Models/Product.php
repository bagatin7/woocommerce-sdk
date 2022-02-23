<?php

namespace WooCommerceSDK\Models;

use Carbon\Carbon;
use Exception;
use WooCommerceSDK\Models\General\Model;
use WooCommerceSDK\Models\Product\ProductAttribute;
use WooCommerceSDK\Models\Product\ProductCategory;
use WooCommerceSDK\Models\Product\ProductDefaultAttribute;
use WooCommerceSDK\Models\Product\ProductMetaData;
use WooCommerceSDK\Models\Product\ProductTag;
use WooCommerceSDK\Utils\Caster;

/**
 * @property-read int $id Unique identifier for the resource
 * @property string $name Product name
 * @property string $slug Product slug
 * @property-read string $permalink Product URL
 * @property-read Carbon $date_created The date the product was created, in the site's timezone
 * @property-read Carbon $date_created_gmt The date the product was created, as GMT
 * @property-read Carbon $date_modified The date the product was last modified, in the site's timezone
 * @property-read Carbon $date_modified_gmt The date the product was last modified, as GMT
 * @property string $type Product type. Options: `simple`, `grouped`, `external` and `variable`. Default is `simple`
 * @property string $status Product status (post status). Options: `draft`, `pending`, `private` and `publish`. Default is `publish`
 * @property bool $featured Featured product. Default is `false`
 * @property string $catalog_visibility Catalog visibility. Options: `visible`, `catalog`, `search` and `hidden`. Default is `visible`
 * @property string $description Product description
 * @property string $short_description Product short description
 * @property string $sku Unique identifier
 * @property-read string $price Current product price
 * @property string $regular_price Product regular price
 * @property string $sale_price Product sale price
 * @property Carbon $date_on_sale_from Start date of sale price, in the site's timezone
 * @property Carbon $date_on_sale_from_gmt Start date of sale price, as GMT
 * @property Carbon $date_on_sale_to End date of sale price, in the site's timezone
 * @property Carbon $date_on_sale_to_gmt End date of sale price, as GMT
 * @property-read string $price_html Price formatted in HTML
 * @property-read bool $on_sale Shows if the product is on sale
 * @property-read bool $purchasable Shows if the product can be bought
 * @property-read int $total_sales Amount of sales
 * @property bool $virtual If the product is virtual. Default is `false`
 * @property bool $downloadable If the product is downloadable. Default is `false`
 * @property array $downloads List of downloadable files
 * @property int $download_limit Number of times downloadable files can be downloaded after purchase. Default is `-1`
 * @property int $download_expiry Number of days until access to downloadable files expires. Default is `-1`
 * @property string $external_url Product external URL. Only for external products
 * @property string $button_text Product external button text. Only for external products
 * @property string $tax_status Tax status. Options: `taxable`, `shipping` and `none`. Default is `taxable`
 * @property string $tax_class Tax class
 * @property bool $manage_stock Stock management at product level. Default is `false`
 * @property int $stock_quantity Stock quantity
 * @property string $stock_status Controls the stock status of the product. Options: `instock`, `outofstock`, `onbackorder`. Default is `instock`
 * @property string $backorders If managing stock, this controls if backorders are allowed. Options `no`, `notify` and `yes`. Default is `no`
 * @property-read bool $backorders_allowed Shows if backorders are allowed
 * @property-read bool $backordered Shows if the product is on backordered
 * @property bool $sold_individually Allow one item to be bought in a single order. Default is `false`
 * @property string $weight Product weight
 * @property Dimensions $dimensions Product dimensions
 * @property-read bool $shipping_required Shows if the product need to be shipped
 * @property-read bool $shipping_taxable Shows whether or not the product shipping is taxable
 * @property string $shipping_class Shipping class slug
 * @property-read  int $shipping_class_id Shipping class ID
 * @property bool $reviews_allowed Allow reviews. Default is `true`
 * @property-read string $average_rating Reviews average rating
 * @property-read int $rating_count Amount of reviews that the product have
 * @property-read int[] $related_ids List of related products IDs
 * @property int[] $upsell_ids List of upsell products IDs
 * @property int[] $cross_sell_ids List of cross-sell products IDs
 * @property int $parent_id Product parent ID
 * @property string $purchase_note Optional note to send the customer after purchase
 * @property ProductCategory[] $categories List of categories
 * @property ProductTag[] $tags List of tags
 * @property Image[] $images List of images
 * @property ProductAttribute[] $attributes List of attributes
 * @property ProductDefaultAttribute[] $default_attributes Default variation attributes
 * @property-read int[] $variations List of variations IDs
 * @property int[] $grouped_products List of grouped products ID
 * @property int $menu_order Menu order, used to custom sort products
 * @property ProductMetaData[] $meta_data Meta data
 */
class Product extends Model
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
        "meta_data" => ProductMetaData::class,
        "default_attributes" => ProductDefaultAttribute::class,
        "attributes" => ProductAttribute::class,
        "images" => Image::class,
        "tags" => ProductTag::class,
        "categories" => ProductCategory::class,
    ];

    public static array $objects = [
        "dimensions" => Dimensions::class
    ];

    /**
     * @param  string  $json
     * @return Product[]
     * @throws Exception
     */
    public static function getGroupFromJson(string $json): array
    {
        return parent::getGroupFromJson($json);
    }

    /**
     * @param  string  $json
     * @return Product
     * @throws Exception
     */
    public static function getFromJson(string $json): Product
    {
        return parent::getFromJson($json);
    }


}