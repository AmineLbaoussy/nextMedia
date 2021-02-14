<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Product;

class deleteProdcuit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command delete prodcuit';

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
        $product=Product::all();
        foreach ($product as $prod) {
             $this->info( 'ID  => '. $prod->id  .'| Name => '.$prod->name);
        }
         $this->info('Enter ID for product that you want to delete');
         $id = $this->ask('ID');

        $line =Product::find($id);
        if (!empty( $line)) {
           $line->delete();
           $this->info('product has been deleted');
        }
        else{
            $this->error('The ID you want to delete does not exist');
        }

    }
}
