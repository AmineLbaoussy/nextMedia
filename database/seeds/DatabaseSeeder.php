<?php

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

        factory(App\Model\Product::class,12)->create();
        // $this->call(ProductSeeder::class);
         $this->call(CategorieSeeder::class);
    }
}
