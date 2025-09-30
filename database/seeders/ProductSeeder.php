<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['category_id' => 1, 'name' => 'Americano', 'price' => 15000, 'stock' => 50, 'unit' => 'cup'],
            ['category_id' => 1, 'name' => 'Cappuccino', 'price' => 20000, 'stock' => 40, 'unit' => 'cup'],
            ['category_id' => 2, 'name' => 'Matcha Latte', 'price' => 22000, 'stock' => 30, 'unit' => 'cup'],
            ['category_id' => 3, 'name' => 'French Fries', 'price' => 12000, 'stock' => 25, 'unit' => 'pcs'],
            ['category_id' => 4, 'name' => 'Mango Juice', 'price' => 18000, 'stock' => 20, 'unit' => 'cup'],
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }
    }
}
