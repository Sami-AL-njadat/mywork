<?php

namespace App\Http\Controllers;

 use App\Models\coupons;
use Illuminate\Http\Request;
use App\Models\carts;
use Illuminate\Support\Facades\Auth;

class checKoutController extends Controller
{

    public function checkout()
    {
        $iduser = auth()->user()->id;

        $cartitem = Carts::where('customerId', $iduser)->with('product')->get();
        foreach ($cartitem as $product) {
            $product->price = $product->product->price;
            $product->productName = $product->product->productName;
        }
// dd($products[0]->

         return view('pagess.shop.checkOut',compact('cartitem'));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function show(coupons $coupons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function edit(coupons $coupons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coupons $coupons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function destroy(coupons $coupons)
    {
        //
    }
}
