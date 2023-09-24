<?php

namespace App\Factory;

use App\Entity\Product;

class ProductFactory
{
    public static function create(string $name, float $price, string $description): Product
    {
        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($description);
        return $product;
    }
}