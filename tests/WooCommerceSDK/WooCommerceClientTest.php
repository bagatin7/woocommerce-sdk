<?php

namespace WooCommerceSDK\Tests\WooCommerceSDK;

use DateTime;
use WooCommerceSDK\Models\Category;
use WooCommerceSDK\Models\Product;
use WooCommerceSDK\Tests\TestCase;
use WooCommerceSDK\WooCommerceClient;

class WooCommerceClientTest extends TestCase
{
    private function getClient(): WooCommerceClient
    {
        return new WooCommerceClient(
            "https://fulviog27.sg-host.com",
            "ck_61f559e90579fe2c75406dfd2e9d53eb2adecb98",
            "cs_be6a6dbf42504c70738040cbce3b31a8889d9c98"
        );
    }

    public function testUpdateProduct()
    {
    }

    public function testCreateProduct()
    {
        $p = new Product();
        $p->name = "Test API SDK";
        $p->regular_price = "30";
        $this->assertInstanceOf(Product::class, $this->getClient()->createProduct($p));
    }

    public function testShowProduct()
    {
    }

    public function testListProducts()
    {
        $products = $this->getClient()->listProducts();
        foreach ($products as $product) {
            $this->assertInstanceOf(Product::class, $product);
        }
        dump($products);
    }

    public function testDeleteProduct()
    {
    }

    public function testCreateCategory()
    {
    }

    public function testListCategories()
    {
        $categories = $this->getClient()->listCategories();
        foreach ($categories as $category) {
            $this->assertInstanceOf(Category::class, $category);
        }
    }

    public function testShowCategory()
    {
        $category = $this->getClient()->showCategory(67);
        $this->assertInstanceOf(Category::class, $category);
    }
}
