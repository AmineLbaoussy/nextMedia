<?php

use Illuminate\Database\Seeder;
use App\Model\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
        	'category_id' => 1,
        	'name' => 'Product 1',
        	'description'=> 'description 1',
        	'price'=> 3.55,
        	'image'=> 'image 1',

        ]);
        \App\Model\Product::create([
        	'category_id' => 1,
        	'name' => 'Product 2',
        	'description'=> 'description 2',
        	'price'=> 3.55,
        	'image'=> 'image 1',

        ]);
        \App\Model\Product::create([
        	'category_id' => 1,
        	'name' => 'Product 3',
        	'description'=> 'description 3',
        	'price'=> 3.55,
        	'image'=> 'image 1',

        ]);
        \App\Model\Product::create([
        	'category_id' => 2,
        	'name' => 'Product 4',
        	'description'=> 'description 4',
        	'price'=> 3.55,
        	'image'=> 'image 1',

        ]);
    }
}
