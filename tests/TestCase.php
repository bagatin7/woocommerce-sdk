<?php

namespace WooCommerceSDK\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function dd($var){
        foreach (func_get_args() as $x) {
            dump($x);
        }
    }
}