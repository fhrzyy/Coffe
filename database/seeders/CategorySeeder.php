<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Coffee', 'Non Coffee', 'Snack', 'Juice'];

        foreach ($categories as $cat) {
            Category::create(['name' => $cat]);
        }
    }
}
