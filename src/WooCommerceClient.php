<?php

namespace WooCommerceSDK;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use WooCommerceSDK\Models\Category;
use WooCommerceSDK\Models\Product;

class WooCommerceClient
{
    private Client $client;

    public function __construct(string $url, string $consumer_key, string $consumer_secret)
    {
        $this->client = new Client(["base_uri" => "$url/wp-json/wc/v3/", 'auth' => [$consumer_key, $consumer_secret]]);
    }

    /**
     * List products from the website
     * @return Product[]
     * @throws GuzzleException
     * @throws Exception
     */
    public function listProducts(): array
    {
        $request = $this->client->get('products');
        return Product::getGroupFromJson($request->getBody()->getContents());
    }

    /**
     * Show a product from the website
     * @param  int  $id
     * @return Product
     * @throws GuzzleException
     * @throws Exception
     */
    public function showProduct(int $id): Product
    {
        $request = $this->client->get("products/$id");
        return Product::getFromJson($request->getBody()->getContents());
    }

    /**
     * Create a product in the website
     * @param  Product  $product
     * @return Product
     * @throws GuzzleException
     * @throws Exception
     */
    public function createProduct(Product $product): Product
    {
        $request = $this->client->post(
            'products',
            ['form_params' => $product->jsonSerialize()]
        );
        return Product::getFromJson($request->getBody()->getContents());
    }

    /**
     * Update a product from the website
     * @param  Product  $product
     * @return Product
     * @throws GuzzleException
     * @throws Exception
     */
    public function updateProduct(Product $product): Product
    {
        $request = $this->client->put(
            "products/$product->id",
            ['form_params' => $product->jsonSerialize()]
        );
        return Product::getFromJson($request->getBody()->getContents());
    }

    /**
     * Delete a product from the website
     * @param  Product $product
     * @return Product
     * @throws GuzzleException
     * @throws Exception
     */
    public function deleteProduct(Product $product): Product
    {
        $request = $this->client->delete("products/$product->id");
        return Product::getFromJson($request->getBody()->getContents());
    }

    /**
     * List categories from the website
     * @return Category[]
     * @throws GuzzleException
     * @throws Exception
     */
    public function listCategories(): array
    {
        $request = $this->client->get('products/categories');
        return Category::getGroupFromJson($request->getBody()->getContents());
    }

    /**
     * Show a category from the website
     * @param  int  $id
     * @return Category
     * @throws GuzzleException
     * @throws Exception
     */
    public function showCategory(int $id): Category
    {
        $request = $this->client->get("products/categories/$id");
        return Category::getFromJson($request->getBody()->getContents());
    }

    /**
     * Create a category in the website
     * @param  Category  $category
     * @return Category
     * @throws GuzzleException
     * @throws Exception
     */
    public function createCategory(Category $category): Category
    {
        $request = $this->client->post(
            'products/categories',
            ['form_params' => $category->jsonSerialize()]
        );
        return Category::getFromJson($request->getBody()->getContents());
    }

    /**
     * Update a category from the website
     * @param  Category  $category
     * @return Category
     * @throws GuzzleException
     * @throws Exception
     */
    public function updateCategory(Category $category): Category
    {
        $request = $this->client->put(
            "products/categories/$category->id",
            ['form_params' => $category->jsonSerialize()]
        );
        return Category::getFromJson($request->getBody()->getContents());
    }

    /**
     * Delete a category from the website
     * @param  Category  $category
     * @return Category
     * @throws GuzzleException
     * @throws Exception
     */
    public function deleteCategory(Category $category): Category
    {
        $request = $this->client->delete("products/categories/$category->id?force=true", );
        return Category::getFromJson($request->getBody()->getContents());
    }

}