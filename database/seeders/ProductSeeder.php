<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create(['name' => 'Laptop', 'price' => 999.99, 'stock' => 10]);
        Product::create(['name' => 'Phone', 'price' => 499.99, 'stock' => 20]);
    
    }
}
