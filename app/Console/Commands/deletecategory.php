<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Model\Categorie;

class deletecategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command delete category';

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
       $id=0;


         $parent = $this->ask('De you want to delete category parent y/n');
          if (strtolower($parent) == 'y') {
             $Categories = Categorie::where('category_id','=',0)->get();
             foreach ($Categories as $Cat) {
                     $this->info( 'ID  => '. $Cat->id  .'| Name => '.$Cat->name);
             }
             $this->info('Enter ID for category that you want to delete');
             $id = $this->ask('ID');
          }
          else{
             $Categories = Categorie::where('category_id','!=',0)->get();
                foreach ($Categories as $Cat) {
                     $this->info( 'ID  => '. $Cat->id  .'| Name => '.$Cat->name);
                }
                $this->info('Enter ID for category that you want to delete');
                $id = $this->ask('ID');
           
          }

        $line =Categorie::find($id);
        if (!empty( $line)) {
           $line->Product()->delete();
           $line->sub_category()->delete();
           $line->delete();
           $this->info('Category has been deleted');
        }
        else{
            $this->error('The ID you want to delete does not exist');
        }


    }
}
