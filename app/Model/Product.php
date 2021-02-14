<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Model\Categorie;

class Product extends Model
{
    use SoftDeletes;

	protected $table = 'products';

    public $guarded =[''];
       
    protected $fillable = [ 'id', 'name', 'category_id','description', 'price', 'image', 'created_at'];

    protected $hidden = [];

    protected $dates = ['deleted_at'];
    
    public function category(){
    	return $this->belongsTo(Categorie::class,'category_id','id');
    }
    
}
