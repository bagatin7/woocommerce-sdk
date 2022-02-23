<?php

namespace WooCommerceSDK\Tests\WooCommerceSDK;

use WooCommerceSDK\Models\Category;
use WooCommerceSDK\Models\Product;
use WooCommerceSDK\Tests\TestCase;

class WooCommerceClientTest extends TestCase
{

    public function testListProducts()
    {
        $products = $this->client->listProducts();
        foreach ($products as $product) {
            $this->assertInstanceOf(Product::class, $product);
        }
    }

    public function testCreateProduct()
    {
        $p = new Product();
        $p->name = "Test API SDK";
        $p->regular_price = "30";
        $this->assertInstanceOf(Product::class, $this->client->createProduct($p));
    }

    public function testShowProduct()
    {
        $id = $this->client->listProducts()[0]->id;
        $product = $this->client->showProduct($id);
        $this->assertInstanceOf(Product::class, $product);
    }

    public function testUpdateProduct()
    {
        $product = $this->client->listProducts()[0];
        $name = $product->name;
        $product->name = $this->faker->company();
        $productUpdated = $this->client->updateProduct($product);
        $this->assertNotEquals($name, $productUpdated->name);
        $this->assertEquals($product->name, $productUpdated->name);
    }

    public function testDeleteProduct()
    {
        $id = $this->client->listProducts()[0]->id;
        $product = $this->client->showProduct($id);
        $product_delete = $this->client->deleteProduct($product);
        $this->assertInstanceOf(Product::class, $product_delete);
    }

    public function testCreateCategory()
    {
        $c = new Category();
        $c->name = $this->faker->company();
        $category = $this->client->createCategory($c);
        $this->assertInstanceOf(Category::class, $category);
    }

    public function testListCategories()
    {
        $categories = $this->client->listCategories();
        foreach ($categories as $category) {
            $this->assertInstanceOf(Category::class, $category);
        }
    }

    public function testShowCategory()
    {
        $id = $this->client->listCategories()[0]->id;
        $category = $this->client->showCategory($id);
        $this->assertInstanceOf(Category::class, $category);
    }

    public function testUpdateCategory()
    {
        $category = $this->client->listCategories()[0];
        $name = $category->name;
        $category->name = $this->faker->company();
        $categoryUpdated = $this->client->updateCategory($category);
        $this->assertNotEquals($name, $categoryUpdated->name);
        $this->assertEquals($category->name, $categoryUpdated->name);
    }

    public function testDeleteCategory()
    {
        $category = $this->client->listCategories()[0];
        $category_deleted = $this->client->deleteCategory($category);
        $this->assertInstanceOf(Category::class, $category_deleted);
    }
}
