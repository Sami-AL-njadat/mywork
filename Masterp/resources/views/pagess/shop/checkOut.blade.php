@extends('layout.master')
@section('content')
    @php
        $subtotal = 0;
        if (session()->has('discounts') && session()->get('discounts') != null) {
            $codedd = session('discounts');
        }
    @endphp


    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url('{{ asset('front_end/img/bg-img/25.jpg') }}')">
            <h2>Checkout</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area mb-100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7">
                    <div class="checkout_details_area clearfix">
                        <h5>Billing Details</h5>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="first_name">Full Name *</label>
                                    <input type="text" class="form-control" id="first_name" value=" " required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address *</label>
                                    <input type="email" class="form-control" id="email_address" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="phone_number">Phone Number *</label>
                                    <input type="number" class="form-control" id="phone_number" min="0"
                                        value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="company">Company Name</label>
                                    <input type="text" class="form-control" id="company" value="">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="address">Address *</label>
                                    <input type="text" class="form-control" id="address" value="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="city">Town/City *</label>
                                    <input type="text" class="form-control" id="city" value="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="state">State/Province *</label>
                                    <input type="text" class="form-control" id="state" value="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="country">Country</label>
                                    <select class="custom-select d-block w-100" id="country">
                                        <option value="1">United States</option>
                                        <option value="2">Canada</option>
                                        <option value="3">United Kingdom</option>
                                        <option value="4">Australia</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label for="order-notes">Order Notes</label>
                                    <textarea class="form-control" id="order-notes" cols="30" rows="10"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center">

                                        <!-- Single Checkbox -->
                                        {{-- <div class="custom-control custom-checkbox d-flex align-items-center">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Create an
                                                account?</label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="checkout-content">
                        <h5 class="title--">Your Order</h5>
                        <div class="products">
                            <div class="products-data">
                                <h5>Products:</h5>
                                <div class="single-products">
                                   <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartitem as $items)
                                                <tr>
                                                    <td>{{ $items->productName }}</td>
                                                    <td>
                                                        <h5>{{ $items->price }}</h5>
                                                    </td>
                                                </tr>



                                                @php
                                                    $subtotal += $items['price'] * $items['quantity'];

                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="subtotal d-flex justify-content-between align-items-center">
                            <h5>Subtotal</h5>
                            <h5>${{ $subtotal }}</h5>
                        </div>
                        <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>Shipping</h5>
                            <h5>$5.00</h5>
                        </div>
                        <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>COUPON</h5>
                            @if (session()->has('discounts') && session()->get('discounts') != null)
                                <h5>%{{ $codedd }}</h5>
                            @else
                                <h5>$ 0</h5>
                            @endif
                        </div>
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <h5>Order Total = </h5>
                            <h5>$ @if (session()->has('discounts') && session()->get('discounts') != null)
                                    {{ $subtotal-($subtotal * $codedd)/100 }}
                                    @else{{ $subtotal }}
                                @endif
                            </h5>
                        </div>
                        <div class="checkout-btn mt-30">
                            <a href="#" class="btn alazea-btn w-100">Place Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
@endsection
