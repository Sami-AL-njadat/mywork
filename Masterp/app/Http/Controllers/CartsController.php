<?php

namespace App\Http\Controllers;

use App\Models\carts;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\coupons;



class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    

        // return view('pagess.shop.cart');
    

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
    public function store(Request $request, $id)
    {
        


        $product = Products::where('id', $id)->first();
        if (auth()->user()) {
            $iduser = auth()->user()->id;
            $productId = $product->id;
            $quantity = $request->quantity;

            // Check if the product already exists in the cart
            $existingCart = carts::where('customerId', $iduser)
                ->where('productId', $productId)
                ->first();

           
            if ($existingCart) {
                // Product already exists in the cart, so increment the quantity
                $existingCart->update([
                    'quantity' => $existingCart->quantity + $quantity
                ]);
            } else {
                // Product does not exist in the cart, so create a new record
                carts::create([
                    'customerId' => $iduser,
                    'productId' => $productId,
                    'quantity' => 1,
                   
                ]);
            }
            
        } else {
            $sessioncart = session()->get('cart', []);
            if (isset($sessioncart[$id])) {

                $sessioncart[$id]['quantity'] += $request->quantity;

                session()->put('cart', $sessioncart);
            } else {
                $sessioncart[$id] = [
                    'id' => $id,
                    'productname' => $product->productName,
                    'shortdes' => $product->Sdescription,
                    'quantity' => 1,
                    'image' => $product->image1,
                    'price' => $product->price,

                ];
            }
            session()->put('cart', $sessioncart);
        }
        // dd( session('cart'));

        return redirect()->back();




    }
    









    function coupon(Request $request)
    {
        $coupon = coupons::all();
        foreach ($coupon as $code) {
            if ($code->couponName == $request->code) {
                $discounts = $code->discount;
                session()->flash('success', 'coupons add successfully !');
                    return redirect()->back()->with('discounts', $discounts);
            }  
        } 
            session()->flash('error', 'coupons  not addedd!');

            return redirect()->back();
        
           
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show(carts $carts)
    {
        if(auth()->user()){
            $iduser = auth()->user()->id;
            $cart = carts::where('customerId', $iduser)->with('product')->get();
            return view('pagess.shop.cart', compact('cart'));
        }elseif((session('cart'))!=null)
         {
            $products=session('cart');
        
        }else{
            $products=[];
        }
        return view('pagess.shop.cart',compact('products'));



        
    }
        //     if(auth()->user()){
        //     $iduser = auth()->user()->id;
        //     $cart = Carts::where('customerId', $iduser)->with('product')->get();
        //     return view('pagess.shop.cart', compact('cart'));
        // }else
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(carts $carts)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
        return redirect()->back();
    }
    public function add($id)
    {
        
       
            $cart = session()->get('cart');
           
            if (isset($cart[$id])) {
                $cart[$id]["quantity"] += 1;
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully added!');
        
        return redirect()->back();
    }
    public function remove($id)
    {
        
       
            $cart = session()->get('cart');
           
            if (isset($cart[$id])) {
                if ($cart[$id]["quantity"] >1) {
                    $cart[$id]["quantity"] -= 1;
                    session()->put('cart', $cart);
                    session()->flash('success', 'Product successfully removed!');
                }else{
                    session()->flash('success', 'you have only 1 product');

                }
            }
        
        return redirect()->back();
    }
}
