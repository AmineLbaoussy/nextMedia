<?php

use Illuminate\Database\Seeder;
use App\Model\Categorie;
class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Categorie::create([
            'name' => 'Category 1',
        ]);
        \App\Model\Categorie::create([
            'name' => 'Category 2',
        ]);
        \App\Model\Categorie::create([
            'name' => 'Category 3',
        ]);
        Categorie::create([
        	'name' => 'subCategory 2',
            'category_id' => '1',
        ]);
        Categorie::create([
        	'name' => 'subCategory 1',
            'category_id' => '1',
        ]);
        Categorie::create([
            'name' => 'subCategory 3',
            'category_id' => '1',
        ]);
        Categorie::create([
            'name' => 'subCategory 3',
            'category_id' => '2',
        ]);
    }
}
