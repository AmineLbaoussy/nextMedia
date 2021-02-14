<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Model\Product;

class Categorie extends Model
{
    use SoftDeletes;
	
	protected $table = 'categories';

    public $guarded =[''];
    
    protected $dates = ['deleted_at'];
   
    protected $fillable = [ 'id', 'name', 'category_id'];

    protected $hidden = [ 'updated_at', 'created_at'];
    
    public function Product(){
    	return $this->hasMany(Product::class,'category_id','id');
    }

    public function sub_category(){
        return $this->hasMany(Categorie::class,'category_id','id');
    }


}
