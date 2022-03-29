<?php

namespace WooCommerceSDK;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use WooCommerceSDK\Models\Attribute;
use WooCommerceSDK\Models\Category;
use WooCommerceSDK\Models\Product;
use WooCommerceSDK\Models\Variation;

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

    /**
     * List attributes from the website
     * @return Attribute[]
     * @throws GuzzleException
     */
    public function listAttributes(): array {
        $request = $this->client->get('products/attributes');
        return Attribute::getGroupFromJson($request->getBody()->getContents());
    }

    /**
     * Show an attribute from the website
     * @param  int  $id
     * @return Attribute
     * @throws GuzzleException
     */
    public function showAttribute(int $id): Attribute {
        $request = $this->client->get("products/attributes/$id");
        return Attribute::getFromJson($request->getBody()->getContents());
    }

    /**
     * Create an attribute in the website
     * @param  Attribute  $attribute
     * @return Attribute
     * @throws GuzzleException
     */
    public function createAttribute(Attribute $attribute): Attribute {
        $request = $this->client->post(
            'products/attributes',
            ['form_params' => $attribute->jsonSerialize()]
        );
        return Attribute::getFromJson($request->getBody()->getContents());
    }

    /**
     * Update an attribute in the website
     * @param  Attribute  $attribute
     * @return Attribute
     * @throws GuzzleException
     */
    public function updateAttribute(Attribute $attribute): Attribute {
        $request = $this->client->post(
            "products/attributes/$attribute->id",
            ['form_params' => $attribute->jsonSerialize()]
        );
        return Attribute::getFromJson($request->getBody()->getContents());
    }

    /**
     * Delete an attribute in the website
     * @param  Attribute  $attribute
     * @return Attribute
     * @throws GuzzleException
     */
    public function deleteAttribute(Attribute $attribute): Attribute {
        $request = $this->client->delete("products/attributes/$attribute->id?force=true", );
        return Attribute::getFromJson($request->getBody()->getContents());
    }


    /**
     * List variations from the website
     * @param  Product  $product
     * @return Variation[]
     * @throws GuzzleException
     */
    public function listVariations(Product $product): array {
        $request = $this->client->get("products/$product->id/variations");
        return Variation::getGroupFromJson($request->getBody()->getContents());
    }

    /**
     * Show a variation from the website
     * @param  Product  $product
     * @param  int  $id
     * @return Variation
     * @throws GuzzleException
     */
    public function showVariation(Product $product, int $id): Variation {
        $request = $this->client->get("products/$product->id/variations/$id");
        return Variation::getFromJson($request->getBody()->getContents());
    }

    /**
     * Create a variation in the website
     * @param  Product  $product
     * @param  Variation  $variation
     * @return Variation
     * @throws GuzzleException
     */
    public function createVariation(Product $product, Variation $variation): Variation {
        $request = $this->client->post(
            "products/$product->id/variations",
            ['form_params' => $variation->jsonSerialize()]
        );
        return Variation::getFromJson($request->getBody()->getContents());
    }

    /**
     * Update a variation in the website
     * @param  Product  $product
     * @param  Variation  $variation
     * @return Variation
     * @throws GuzzleException
     */
    public function updateVariation(Product $product, Variation $variation): Variation {
        $request = $this->client->put(
            "products/$product->id/variations/$variation->id",
            ['form_params' => $variation->jsonSerialize()]
        );
        return Variation::getFromJson($request->getBody()->getContents());
    }

    /**
     * Delete a variation in the website
     * @param  Product  $product
     * @param  Variation  $variation
     * @return Variation
     * @throws GuzzleException
     */
    public function deleteVariation(Product $product, Variation $variation): Variation {
        $request = $this->client->delete("products/$product->id/variations/$variation->id");
        return Variation::getFromJson($request->getBody()->getContents());
    }
}