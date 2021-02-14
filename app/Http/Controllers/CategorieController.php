<?php

namespace App\Http\Controllers;

use App\Model\Categorie;
use App\Model\Product;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Categories=Categorie::where('category_id','=',0)
               ->with('sub_category')
               ->whereHas('sub_category')
               ->withCount('sub_category')
               ->withCount('Product')
               ->get();
        foreach ($Categories as $caty) {
            foreach ($caty->sub_category as $sub) {
                $sub -> setAttribute('count_sub',Product::where('category_id', $sub->id)->count())  ;
            }    
        }
        return response()->json($Categories);       
    }




    public function get_subcCategorie()
    {
        $Categories=Categorie::where('category_id','!=',0)->get();
        return response()->json($Categories);       
    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
