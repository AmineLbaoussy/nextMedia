<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Categorie;
use Illuminate\Http\Request;

use App\Http\Requests\productRequest;
use App\Traits\MediaUploadTrait;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      
    use MediaUploadTrait;

    public function index()
    {
       return view('pages.product.index');
    }

    public function get_all_products(){

       $products=Product::latest()->with('category')->get();
       //$products=Product::latest()->with('category')->paginate(6);
       foreach ($products as $product) {
            $product -> setAttribute('date_Add',$product->created_at->diffForHumans())  ;
       }
       return response()->json($products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productRequest $request)
    {      //productRequest
           $product=[];
           $errors_validator=[];
           $has_error=false;

            if (isset($request->validator) && $request->validator->fails()){
                    $has_error = true;
                    $errors = $request->validator->messages();
                    $errors_validator =  [
                          'name'=>$errors->first('name'),
                          'price'=>$errors->first('price'),
                          'category'=>$errors->first('category'),
                          'description'=>$errors->first('description'),
                          'image'=>$errors->first('image'),
                    ];
            }else{
                            if ($request->hasFile('image')){
                     $file_name= $this-> saveImage($request->image,'/img/products');
            }
                    $product = new Product(); 
                    $product->name = $request->name;
                    $product->category_id = $request->category;
                    $product->description = $request->description;
                    $product->price = $request->price;
                    $product->image = $file_name;
                    $product->save();
            }
            return response()->json([
                'line' =>$errors_validator,
                'has_error' => $has_error,
                'product' => $product
            ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
             'id' => $product->id,
             'name' => $product->name,
             'description' => $product->description,
             'image' => $product->image,
             'created_at' => $product->created_at->diffForHumans(),
             'category' => $product->category,


        ]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


public function categoryProduct($id)
{
     // $category= Categorie::where('id',$id)->first();
     // $products= Product::whereCategoryId($category->id)->get();
     // foreach ($products as $product) {
     //        $product -> setAttribute('category_count',$product->category->count());
     // }

       $products=Product::where('category_id','=', $id)->with('category')->get();
     
       // $products=Product::latest()->with('category')->get();
       foreach ($products as $product) {
            $product -> setAttribute('date_Add',$product->created_at->diffForHumans())  ;
       }
       return response()->json($products); 
}



public function searchProduct($value)
{
       $products=Product::where('name','like', '%'.$value.'%')->with('category')->get();
       foreach ($products as $product) {
            $product -> setAttribute('date_Add',$product->created_at->diffForHumans())  ;
       }   
       return response()->json($products); 
}


}
