<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Categorie;
use Illuminate\Support\Facades\Validator;
class createCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   // protected $signature = 'create:category {cat*} ';
    protected $signature = 'create:category ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create category';

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
    {  // $category =$this->argument('cat');

        $category_id='';
        $Categories = Categorie::where('category_id','=',0)->get();
        $name = $this->ask('category name ');
        //$this->info("Is this the category parent y/n");
        
         $parent = $this->ask('Is this the category parent y/n');
          if (strtolower($parent) == 'y') {
             $category_id=0;
          }
          else{
                foreach ($Categories as $Cat) {
                     $this->info( 'ID  => '. $Cat->id  .'| Name => '.$Cat->name);
                }
                $this->info('Enter ID for category that you want to delete');
                $category_id = $this->ask('ID');
           
          }

        // Validate input data
        $validator = Validator::make([
            'name' => $name,
            'category_id' => $category_id,
        ], [
            'name' => ['required'],
            'category_id' => ['required','integer'],
           
        ]);

        if($validator->fails()){
            $this->info('Oops! Something went wrong. See error messages below:');
            foreach($validator->errors()->all() as $error){
                $this->error($error);
            }
            return false;
        }
                    $Categorie = new Categorie(); 
                    $Categorie->name = $name;
                    $Categorie->category_id = $category_id;
                    $Categorie->save();

        $this->info('category has been created!');
        return true;


        
    }
}
