<?php

namespace WooCommerceSDK;

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
     * @param  Product  $product
     * @return Product
     */
    public function createProduct(Product $product): Product
    {
        $request = $this->client->post('products', ['form_params' => $product]);
        return Product::getFromJson($request->getBody()->getContents());
    }

    /**
     * @param  int  $id
     * @return Product
     */
    public function showProduct(int $id): Product
    {
        return new Product();
    }

    /**
     * @return Product[]
     * @throws GuzzleException
     */
    public function listProducts(): array
    {
        $response = $this->client->get('products');
        return Product::getGroupFromJson($response->getBody()->getContents());
    }

    public function updateProduct(Product $product): Product
    {
        return new Product();
    }

    public function deleteProduct(Product $product): Product
    {
        return new Product();
    }

    public function showCategory(int $id)
    {
        $response = $this->client->get("products/categories/$id");
        return Category::getFromJson($response->getBody()->getContents());
    }

    public function listCategories()
    {
        $response = $this->client->get('products/categories');
        return Category::getGroupFromJson($response->getBody()->getContents());
    }

    public function createCategory() { }

    public function deleteCategory() { }

    public function updateCategory() { }


}