<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [

            'category_id' => $faker->randomElement([6,5,4,7])  ,
        	'name' => $faker->Name,
        	'description'=> $faker->paragraph,
        	'price'=> $faker->randomElement([3.66,2.99,14.15,20.30,25.12,10.00,9.55,6.33]),
        	'image'=> $faker->randomElement(['1.png','2.png','3.png','4.png','5.png','6.png']),
    ];
});
