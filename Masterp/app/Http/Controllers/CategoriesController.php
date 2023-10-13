<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\Products;
use App\DataTables\CategoryDataTable;

use function Pest\Laravel\get;

class CategoriesController extends Controller
{

    public function showProducts(Request $request, $id = null)
    {
        $perPage = $request->input('per_page', 6);
        $allcategory = categories::orderBy('categoryName', 'ASC')->get();
        $counts = Products::count();
        // $categoryes = Products::where('categoryName')->count();

        $category = categories::all();

        // Check if the request has filter parameters
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $query = Products::query();

        // Apply price filter if values are provided
        if ($minPrice !== null && $maxPrice !== null) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
            session()->flash('success', 'parice change ');

        }

        // Apply category filter if $id is provided
        if ($id !== null) {
            $query->where('categoryId', $id);
        }

        $product = $query->paginate($perPage);

        return view('pagess.shop.shop', compact('product', 'counts', 'category', 'allcategory'));
    }



    // function shopdetai(Request $request, $id=null)
    // {    $allcategory = categories::orderBy('categoryName', 'ASC')->get();



    //     if ($id!==null) {
    //         $product = Products::find($id);
    //     }else{
    //         $product = Products::all();

    //     }
    //     $reproduct = Products::where('categoryId', $product->categoryId)->inRandomOrder()->limit(4)->get();

    //     return view('pagess.shop.shopDetailes',compact('product' , 'allcategory' , 'reproduct'));
    //   }


 

    function shopdetai(Request $request, $id = null)
    {
        $allcategory = Categories::orderBy('categoryName', 'ASC')->get();

        if ($id !== null) {
            $product = Products::find($id);

            // Retrieve the category name of the selected product
            $selectedCategory = Categories::find($product->categoryId);

            $reproduct = Products::where('categoryId', $product->categoryId)
                ->inRandomOrder()
                ->limit(4)
                ->get();

            return view('pagess.shop.shopDetailes', compact('product', 'allcategory', 'reproduct', 'selectedCategory'));
        } else {
            $product = Products::all();
            $reproduct = Products::inRandomOrder()->limit(4)->get();
            return view('pagess.shop.shopDetailes', compact('product', 'allcategory', 'reproduct'));
        }
    }


    public function checkout()
    {

        // session()->flash('success', 'Product successfully removed!');

        return view('pagess.shop.checkOut');
    }

    function indexCategory(CategoryDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.category.index');
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
    public function edit(  $id )
    {
        $category = categories::findOrFail($id);

return view('Admin.pages.category.edit' ,compact('category'));

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
 
 
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    { 
        $category = categories::findOrFail($id);
        $category->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);

 }}


















