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

        $name = $this->ask('category name ');
        // Validate input data
        $validator = Validator::make([
            'name' => $name,
        ], [
            'name' => ['required'],
           
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
                    $Categorie->save();

        $this->info('category has been created!');
        return true;

        
    }
}
