<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Product;
use App\Model\Categorie;
use Illuminate\Support\Facades\Validator;
class createProdcuit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create Product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Product Name');
        $price = $this->ask('price');
        $Categories=Categorie::all();
        foreach ($Categories as $Cat) {
             $this->info( 'ID  => '. $Cat->id  .'| Name => '.$Cat->name);
        }
        $category = $this->ask('category');
        $description = $this->ask('description');


        // Validate input data
        $validator = Validator::make([
            'name' => $name,
            'price' => $price,
            'category' => $category,
            'description' => $description,
        ], [
            'name' => ['required'],
            'price' => ['required','numeric','not_in:0'],
            'category' => ['required','integer'],
            'description' => ['required'],
         
        ]);

        if($validator->fails()){
            $this->info('Oops! Something went wrong. See error messages below:');
            foreach($validator->errors()->all() as $error){
                $this->error($error);
            }
            return false;
        }
                    $product = new Product(); 
                    $product->name = $name;
                    $product->category_id = $category;
                    $product->description = $description;
                    $product->price = $price;
                    $product->image = '1.png';
                    $product->save();

        $this->info('Product has been created!');
        return true;
    }
}
