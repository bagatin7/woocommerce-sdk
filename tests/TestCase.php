<?php

namespace WooCommerceSDK\Tests;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase as BaseTestCase;
use WooCommerceSDK\WooCommerceClient;

class TestCase extends BaseTestCase
{

    protected Generator $faker;
    protected WooCommerceClient $client;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct(
            $name,
            $data,
            $dataName
        );
        $this->faker = Factory::create();
        $this->client = new WooCommerceClient(
            "https://fulviog27.sg-host.com",
            "ck_61f559e90579fe2c75406dfd2e9d53eb2adecb98",
            "cs_be6a6dbf42504c70738040cbce3b31a8889d9c98"
        );
    }

    public function dd($var)
    {
        foreach (func_get_args() as $x) {
            dump($x);
        }
    }

    protected function searchByColumn(array $models, string $name, string $column)
    {
        $index = array_search($name, array_column($models, $column));
        return $index === false ? null : $models[$index];
    }

    protected function searchForName(array $models, string $name)
    {
        return $this->searchByColumn($models, $name, "name");
    }

    protected function searchByMetaData(array $models, string $key)
    {
        foreach ($models as $model){
            foreach ($model->meta_data as $meta_datum){
                if($meta_datum->key === $key){
                    return $model;
                }
            }
        }
        return null;
    }
}