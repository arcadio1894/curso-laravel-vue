<?php

use App\Customer;
use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 10)->create();
        factory(Customer::class, 10)->create();
    }
}
