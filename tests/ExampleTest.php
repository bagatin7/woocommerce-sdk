<?php

namespace WooCommerceSDK\Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public string $key = "ck_61f559e90579fe2c75406dfd2e9d53eb2adecb98";
    public string $secret = "cs_be6a6dbf42504c70738040cbce3b31a8889d9c98";

    public function test_client()
    {
        $client = new Client(
            ["base_uri" => "https://fulviog27.sg-host.com/wp-json/wc/v3/", 'auth' => [$this->key, $this->secret]]
        );
        $response = $client->get('products');
        var_dump(json_decode($response->getBody()->getContents()));
    }
}