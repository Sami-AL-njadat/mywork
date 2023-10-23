<?php

namespace App\Http\Controllers;

use App\Models\coupons;
use Illuminate\Http\Request;
use App\Models\carts;
use App\Models\orderItems;
use App\Models\orders;
use App\Models\shipments;

use App\Models\User;
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
        // $shipment = shipments::create([
        //     'address'=>$request->address,
        //     'city'=>$request->city,
        //     "company"=>$request->company,
        //     "customerId"=> Auth::user()->id,
        // ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->update();

        if (isset($request->paypal)) {
        } else if (isset($request->cash)) {
            $payment = $user->payment()->create([
                "maethod" => $request->cash,  // Provide a value for the "maethod" field
                "paymentTotal" => $request->total,
                "customerId" => Auth::user()->id,
            ]);

            // $payment = $user->payment->last();
            // $address = $user->address->last();
            // dd($address->id);

            $order =   orders::create([
                "totalPrice" => $request->total,
                "shipmentId" => $address->id,
                "paymentId" => $payment->id,
                "customerId" => Auth::user()->id,
            ]);
            // dd($payment->id);
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
                $product->delete();
            }
        }
        session()->flash('success', 'Thank you for your purchase. Your order will be shipped to you soon.!');

        return redirect()->route('home');
    }
}
