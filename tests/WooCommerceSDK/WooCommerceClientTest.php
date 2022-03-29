<?php

namespace WooCommerceSDK\Tests\WooCommerceSDK;

use WooCommerceSDK\Models\Attribute;
use WooCommerceSDK\Models\Category;
use WooCommerceSDK\Models\Product;
use WooCommerceSDK\Tests\TestCase;

class WooCommerceClientTest extends TestCase
{
    private const DELETE_THIS = "Delete this";
    private const DELETE_THIS_UPDATED = "Delete this - updated";

    public function testCreateProduct()
    {
        $product = new Product();
        $product->name = self::DELETE_THIS;
        $product->regular_price = "30";
        $this->assertInstanceOf(Product::class, $this->client->createProduct($product));
    }

    public function testListProducts()
    {
        $products = $this->client->listProducts();
        foreach ($products as $product) {
            $this->assertInstanceOf(Product::class, $product);
        }
    }

    public function testShowProduct()
    {
        $products = $this->client->listProducts();
        $id = $this->searchForName($products, self::DELETE_THIS)->id;
        $product = $this->client->showProduct($id);
        $this->assertInstanceOf(Product::class, $product);
    }

    public function testUpdateProduct()
    {
        $products = $this->client->listProducts();
        /** @var Product $originalProduct */
        $originalProduct = $this->searchForName($products, self::DELETE_THIS);
        $originalProduct->name = self::DELETE_THIS_UPDATED;
        $product = $this->client->updateProduct($originalProduct);
        $this->assertNotEquals(self::DELETE_THIS, $product->name);
        $this->assertEquals($originalProduct->name, $product->name);
        $product->name = self::DELETE_THIS;
        $product = $this->client->updateProduct($product);
        $this->assertEquals(self::DELETE_THIS, $product->name);
    }

    public function testDeleteProduct()
    {
        $products = $this->client->listProducts();
        $product = $this->searchForName($products, self::DELETE_THIS);
        $deletedProduct = $this->client->deleteProduct($product);
        $this->assertInstanceOf(Product::class, $deletedProduct);
    }

    public function testCreateCategory()
    {
        $c = new Category();
        $c->name = self::DELETE_THIS;
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
        $categories = $this->client->listCategories();
        $id = $this->searchForName($categories, self::DELETE_THIS)->id;
        $category = $this->client->showCategory($id);
        $this->assertInstanceOf(Category::class, $category);
    }

    public function testUpdateCategory()
    {
        $categories = $this->client->listCategories();
        /** @var Category $originalCategory */
        $originalCategory = $this->searchForName($categories, self::DELETE_THIS);
        $originalCategory->name = self::DELETE_THIS_UPDATED;
        $category = $this->client->updateCategory($originalCategory);
        $this->assertNotEquals(self::DELETE_THIS, $category->name);
        $this->assertEquals($originalCategory->name, $category->name);
        $category->name = self::DELETE_THIS;
        $category = $this->client->updateCategory($category);
        $this->assertEquals(self::DELETE_THIS, $category->name);
    }

    public function testDeleteCategory()
    {
        $category = $this->searchForName($this->client->listCategories(), self::DELETE_THIS);
        $deletedCategory = $this->client->deleteCategory($category);
        $this->assertInstanceOf(Category::class, $deletedCategory);
    }

    public function testCreateAttribute()
    {
        $a = new Attribute();
        $a->name = self::DELETE_THIS;
        $attribute = $this->client->createAttribute($a);
        $this->assertInstanceOf(Attribute::class, $attribute);
    }

    public function testListAttributes()
    {
        $attributes = $this->client->listAttributes();
        foreach ($attributes as $attribute) {
            $this->assertInstanceOf(Attribute::class, $attribute);
        }
    }

    public function testShowAttribute()
    {
        $attributes = $this->client->listAttributes();
        $id = $this->searchForName($attributes, self::DELETE_THIS)->id;
        $attribute = $this->client->showAttribute($id);
        $this->assertInstanceOf(Attribute::class, $attribute);
    }

    public function testUpdateAttribute()
    {
        $attributes = $this->client->listAttributes();
        /** @var Attribute $originalAttribute */
        $originalAttribute = $this->searchForName($attributes, self::DELETE_THIS);
        $originalAttribute->name = self::DELETE_THIS_UPDATED;
        $attribute = $this->client->updateAttribute($originalAttribute);
        $this->assertNotEquals(self::DELETE_THIS, $attribute->name);
        $this->assertEquals($attribute->name, $originalAttribute->name);
        $attribute->name = self::DELETE_THIS;
        $attribute = $this->client->updateAttribute($attribute);
        $this->assertEquals(self::DELETE_THIS, $attribute->name);
    }

    public function testDeleteAttribute()
    {
        $attributes = $this->client->listAttributes();
        $attribute = $this->searchForName($attributes, self::DELETE_THIS);
        $deletedAttribute = $this->client->deleteAttribute($attribute);
        $this->assertInstanceOf(Attribute::class, $deletedAttribute);
    }


}
