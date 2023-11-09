<?php

namespace App\Http\Controllers;

use App\Models\coupons;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\carts;
use App\Models\orderItems;
use App\Models\orders;
use App\Models\shipments;


use App\Models\User;
use App\Models\wishlists;
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

        return view('pagess.shop.checkOut', compact('cartitem'));
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
    public function storeShipment(Request $request)
    {

        // dd($request);
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'company' => 'nullable|string',
            'address' => 'required|string',
            'city' => 'required|string',
        ]);
        $user = User::find(Auth::user()->id);
        $address = $user->address()->updateOrCreate([], [
            "company" => $request->company,
            "address" => $request->address,
            "city" => $request->city,
            "customerId" => Auth::user()->id,

        ]);

        // $user->name = $request->name;
        // $user->email = $request->email;
        $user->phone = $request->phone;
        $user->update();

        if (isset($request->paypal)) {
            $payment = $user->payment()->create([

                "maethod" => $request->paypal,
                "paymentTotal" => $request->total,
                "customerId" => Auth::user()->id,



            ]);
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $PaypalToken = $provider->getAccessToken();


            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" =>  route('paypal_success'),
                    "cancel_url" => route('paypal_cancel'),
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $request->total
                        ]
                    ]
                ]
            ]);
            // dd($response);




            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $link) {

                    if ($link['rel'] === 'approve') {
                        return redirect()->away($link['href']);
                    }
                }
            } else {
                return redirect()->route('paypal_cancel');
            }
        } else if (isset($request->cash)) {
            $payment = $user->payment()->create([
                "maethod" => $request->cash,
                "paymentTotal" => $request->total,
                "customerId" => Auth::user()->id,
            ]);



            $order =  orders::create([
                "totalPrice" => $request->total,
                "shipmentId" => $address->id,
                "paymentId" => $payment->id,
                "customerId" => Auth::user()->id,
            ]);
            $cart = carts::where("customerId", $user->id)->get();

            // dd($cart);
            foreach ($cart as $product) {
                orderItems::create([
                    "quantity" => $product->quantity,
                    "price" => $product->quantity * $product->product->price,
                    "orderId" => $order->id,
                    "customerId" => Auth::user()->id,
                    "productId" => $product->productId,
                    
                ]);
                wishlists::where('productId', $product->product->id)->where('customerId', Auth::user()->id)->delete();

                $product->delete();
            }
        }
        // session()->flash('success', 'Thank you for your purchase. Your order will be shipped to you soon.!');

        return redirect()->route('home')->with('success', 'Thank you for your purchase. Your order will be shipped to you soon.!');
    }



    public function success(Request $request)
    {


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $PaypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $order =   orders::create([
                "totalPrice" => Auth::user()->payment->last()->paymentTotal,
                "shipmentId" => Auth::user()->address->last()->id,
                "paymentId" => Auth::user()->payment->last()->id,
                "customerId" => Auth::user()->id,
            ]);

            $cart = carts::where("customerId", Auth::user()->id)->get();

            // dd($cart);
            foreach ($cart as $product) {
                orderItems::create([
                    "quantity" => $product->quantity,
                    "price" => $product->quantity * $product->product->price,
                    "orderId" => $order->id,
                    "customerId" => Auth::user()->id,
                    "productId" => $product->productId,

                ]);
                // dd($product->id);    
                 wishlists::where('productId', $product->product->id)->where('customerId', Auth::user()->id)->delete();
                $product->delete();

            }
            return redirect()->route('home')->with('success', 'Thank you for your purchase. Your order will be shipped to you soon.!');
        } else {
            return redirect()->route('paypal_cancel');
        }
    }

    public function cancel()
    {
        return view('pagess.contact.contact');
    }
}





    //     if (isset($response['status']) && $response['status'] == 'COMPLETED') {
    //         $productIds = session('cart'); // Your array of product IDs
    //         $productQuantities = [];
            
    //         if (is_array($productIds) && count($productIds) > 0) {
    //             // Calculate product quantities by counting the occurrences of each product ID
    //             foreach ($productIds as $productId) {
    //                 if (array_key_exists($productId, $productQuantities)) {
    //                     // If the product ID already exists in the quantities array, increment the quantity
    //                     $productQuantities[$productId]++;
    //                 } else {
    //                     // If it's the first occurrence, set the quantity to 1
    //                     $productQuantities[$productId] = 1;
    //                 }
    //             }
    //             $products = Product::whereIn('id', array_keys($productQuantities))->get();
    // $total = 0;
    //             foreach($products as $product){
    //                     $product->quantity = $productQuantities[$product->id];
    // $total += $product->price * $product->quantity;
    //             }
    //         }
    //         Payment::create([
    //             "userId" => Auth::user()->id,
    //             "amount" => $total,
    //             "provider" => "paypal",
    //             "status" => "success",
    //             "payment-method" => "paypal",
    //         ]);
    
    //         Orderdetail::create([
    //             "userId" => Auth::user()->id,
    //             "paymentId" => Payment::where("userId", Auth::user()->id)->latest()->first()->id,
    //             "shipmentId" => Shipment::where("userId", Auth::user()->id)->latest()->first()->id,
    //             "total" =>$total,
    //         ]);
    
    //         foreach($products as $product){
    //             Orderitem::create([
    //                 "orderId"=> Orderdetail::where("userId", Auth::user()->id)->latest()->first()->id,
    //                 "productId"=> $product->id,
    //                 "quantity"=> $product->quantity,
    //             ]);
                
    //                         }
    //                         // $hhs= cart::where("userId", Auth::user()->id)->delete();
    //                         session()->forget('cart');
    //                         return redirect()->route("home.index");