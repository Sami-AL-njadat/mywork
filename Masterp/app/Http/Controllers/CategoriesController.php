<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\Products;

use function Pest\Laravel\get;

class CategoriesController extends Controller
{

   public  function showProduct(Request $request,$id=null)
{
    $perPage = $request->input('per_page', 6);

    // Get the count of all products
    $counts = Products::count();

        // Get all categories
        $category = categories::all();

    // Check if $id is not null
    if ($id !== null) {
            // Find a specific product by $id
            $product = Products::where('categoryId', $id)->paginate($perPage);

    } else {
        // Paginate all products
        $product = Products::paginate($perPage);
    }

    return view('pagess.shop.shop', compact('product', 'counts', 'category'));
}


    function shopdetai(Request $request, $id=null)
    {            
       

        if ($id!==null) {
            $product = Products::find($id);
        }else{
            $product = Products::all();

        }
        $reproduct = Products::where('categoryId', $product->categoryId)->inRandomOrder()->limit(4)->get();

        return view('pagess.shop.shopDetailes',compact('product' , 'reproduct'));
      }

    public function checkout()
    {

        // session()->flash('success', 'Product successfully removed!');

        return view('pagess.shop.checkOut');
    }
  


     function index()
    {
     $categories = categories::all();

     $product = Products::orderBy('created_at', 'desc')->take(4)->get();
     return view ('pagess.home.home' ,compact('categories', 'product'));


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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories)
    {
        //
    }
}
