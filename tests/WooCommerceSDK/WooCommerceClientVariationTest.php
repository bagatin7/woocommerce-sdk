<?php

namespace WooCommerceSDK\Tests\WooCommerceSDK;

use WooCommerceSDK\Models\MetaData;
use WooCommerceSDK\Models\Product;
use WooCommerceSDK\Models\Variation;
use WooCommerceSDK\Tests\TestCase;

class WooCommerceClientVariationTest extends TestCase
{
    public int $variationId;

    private MetaData $metaData;
    private Product $product;

    private const DELETE_THIS = "delete";
    private const DELETE_THIS_UPDATED = "delete - updated";

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct(
            $name,
            $data,
            $dataName
        );
        $this->metaData = new MetaData();
        $this->metaData->key = self::DELETE_THIS;
        $this->metaData->value = "this";
        $this->product = $this->getRandomProduct();
    }

    private function getRandomProduct()
    {
        $products = $this->client->listProducts();
        return $products[rand(0, sizeof($products) - 1)];
    }

    public function testListVariations()
    {
        $variations = $this->client->listVariations($this->product);
        foreach ($variations as $variation) {
            $this->assertInstanceOf(Variation::class, $variation);
        }
    }

    public function testCreateVariation()
    {
        $variation = new Variation();
        $variation->regular_price = 30;
        $variation->sale_price = 25;
        $variation->meta_data = [$this->metaData];
        $created =  $this->client->createVariation($this->product, $variation);
        $this->assertInstanceOf(Variation::class, $created);
    }

    public function testShowVariation()
    {
        $variations = $this->client->listVariations($this->product);
        $id = $this->searchByMetaData($variations, self::DELETE_THIS)->id;
        $variation = $this->client->showVariation($this->product, $id);
        $this->assertInstanceOf(Variation::class, $variation);
    }

    public function testUpdateVariation()
    {
        $variations = $this->client->listVariations($this->product);
        /** @var Variation $originalVariation */
        $originalVariation = $this->searchByMetaData($variations, self::DELETE_THIS);
        $index = array_search(self::DELETE_THIS, $originalVariation->meta_data);
        $originalVariation->meta_data[$index]->key = self::DELETE_THIS_UPDATED;
        $originalVariation->regular_price = 35;
        $originalVariation->sale_price = 25;
        $variation = $this->client->updateVariation($this->product, $originalVariation);
        $index = array_search(self::DELETE_THIS_UPDATED, $originalVariation->meta_data);
        $this->assertNotEquals(self::DELETE_THIS, $variation->meta_data[$index]->key);
        $this->assertEquals($originalVariation->regular_price, $variation->regular_price);
        $this->assertEquals($originalVariation->sale_price, $variation->sale_price);
        $originalVariation->meta_data[$index]->key = self::DELETE_THIS;
        $originalVariation->regular_price = 30;
        $originalVariation->sale_price = 20;
        $variation = $this->client->updateVariation($this->product, $originalVariation);
        $this->assertEquals(self::DELETE_THIS, $variation->meta_data[$index]->key);
        $this->assertEquals($originalVariation->regular_price, $variation->regular_price);
        $this->assertEquals($originalVariation->sale_price, $variation->sale_price);
    }

    public function testDeleteVariation()
    {
        $variations = $this->client->listVariations($this->product);
        $variation = $this->searchByMetaData($variations, self::DELETE_THIS);
        $deletedVariation = $this->client->deleteVariation($this->product, $variation);
        $this->assertInstanceOf(Variation::class, $deletedVariation);
    }
}