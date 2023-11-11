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

        if (auth()->user()) {
            $iduser = auth()->user()->id;
            $cart = carts::where('customerId', $iduser)->with('product')->get();
            $discounts = $cart[0]->coupon->discount;
            // return view('pagess.shop.cart', compact('cart'));
        } elseif ((session('cart')) != null) {
            $products = session('cart');
        } else {
            $products = [];
        }
        // dd($products);
        return view('pagess.shop.cart', compact('products', "discounts"));
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
        session()->flash('success', 'Product successfully added!');

        return redirect()->back();
    }
    public function storee(Request $request, $id)
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


        return redirect()->route("cart.index");
    }










    function coupon(Request $request)
    {


        $coupon = coupons::all();
        foreach ($coupon as $code) {
            if ($code->couponName == $request->code) {
                if (auth()->user()) {
                    $iduser = auth()->user()->id;
                    $cart = carts::where('customerId', $iduser)->get();
                    // dd($cart);
                    foreach ($cart as $product) {
                        $product->update(['couponid' => $code->id]);
                        session()->flash('success', 'coupons add successfully !');

                        return redirect()->route("cart.index");
                    }
                } else {

                    $discounts = $code->discount;
                    session()->put('coupon', $code->id);
                    // dd($discounts);
                }
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
        if (auth()->user()) {
            $iduser = auth()->user()->id;
            $products = carts::where('customerId', $iduser)->get();
            if ($products->count() >= 1) {
                foreach ($products as $product) {
                    $product->price = $product->product->price;
                    $product->image = $product->product->image1;
                }
// dd($products[0]->coupon);
                if ($products[0]->coupon !== null) {
                    $discounts = $products[0]->coupon->discount;

                    session()->put('discounts', $discounts);;
                }
            }
            return view('pagess.shop.cart', compact('products'));
        } elseif ((session('cart')) != null) {
            $products = session('cart');
        } else {
            $products = [];
        }
        return view('pagess.shop.cart', compact('products'));
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

     
    public function destroy(Request $request)
    {
        if (auth()->user()) {
            $customerId = auth()->user()->id;
            $productId = $request->id;

            $cart = carts::where('customerId', $customerId) 
                ->where('id', $productId)
                ->delete();
        } else {
            if ($request->id) {
                $cart = session()->get('cart');
                if (isset($cart[$request->id])) {
                    unset($cart[$request->id]);
                    session()->put('cart', $cart);
                }
                session()->flash('success', 'Product successfully removed!');
            }
        }
        return redirect()->back();
    }



    public function add($id)
    {

        if (auth()->user()) {
            $iduser = auth()->user()->id;
            $cart = carts::where('customerId', $iduser)->where('id', $id)->with('product')->first();
            $cart->update(['quantity' => $cart->quantity + 1]);
            // return view('pagess.shop.cart', compact('cart'));
        } else {

            $cart = session()->get('cart');

            if (isset($cart[$id])) {
                $cart[$id]["quantity"] += 1;
                session()->put('cart', $cart);
            }
        }
        session()->flash('success', 'Product Quantity added!');

        return redirect()->back();
    }

    public function remove($id)
    { 


        $cart = session()->get('cart');

        if (auth()->user()) {
            $iduser = auth()->user()->id;
            $cart = carts::where('customerId', $iduser)->where('id', $id)->with('product')->first();
            if ($cart->quantity > 1) {
                $cart->update(['quantity' => $cart->quantity - 1]);
                session()->flash('success', 'Product Quantity deducted !');
            } else {
                // carts::where('customerId', $iduser)->where('id', $id)->with('product')->delete();
                session()->flash('success', 'you have only 1 product ');
            }
        } else {
            if ($cart[$id]["quantity"] > 1) {
                $cart[$id]["quantity"] -= 1;
                session()->put('cart', $cart);
                session()->flash('success', 'Product Quantity deducted !');
            } else {
                session()->forget($cart[$id]);
                session()->flash('warning','you have only 1 product if you want to delet click on X');
            }
        }
        

        return redirect()->back();
    } 
}