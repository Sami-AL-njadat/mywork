@extends('layout.master')
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url('{{ asset('front_end/img/bg-img/24.jpg') }}')">
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
                                    <input type="text" class="form-control" id="first_name" value="" required>
                                </div>
                                {{-- <div class="col-md-6 mb-4">
                                    <label for="last_name">Last Name *</label>
                                    <input type="text" class="form-control" id="last_name" value="" required>
                                </div> --}}
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
                                    <label for="company">Address *</label>
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
                                    <label for="country">JORDAN</label>
                                    <select class="custom-select d-block w-100" id="country">
                                        <!-- <option selected>CITY</option> -->
                                        <option value="1">AJLOUN</option>
                                        <option value="2">AMMAN</option>
                                        <option value="3">JARASH</option>
                                        <option value="4">IRBID</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="text" class="form-control" id="postcode" value="">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="order-notes">Order Notes</label>
                                    <textarea class="form-control" id="order-notes" cols="30" rows="10"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <!-- Single Checkbox -->
                                        <div class="custom-control custom-checkbox d-flex align-items-center mr-30">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Ship to a different
                                                address?</label>
                                        </div>
                                        <!-- Single Checkbox -->
                                        <div class="custom-control custom-checkbox d-flex align-items-center">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Create an
                                                account?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-4">

                    <br>
                    <br>
                    <br>
                    <br>

                    <!-- هون تخبص الدفع -->

                    <div class="col-12">

                        <div class="d-flex align-items-center">
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center mr-30">
                                <input type="checkbox" class="custom-control-input 22" id="customCheck12">
                                <label class="custom-control-label" for="customCheck1">Payment by Visa</label>
                            </div>
                            <!-- Single Checkbox -->
                            <div class="custom-control custom-checkbox d-flex align-items-center">
                                <input type="checkbox" class="custom-control-input 22" id="customCheck22">
                                <label class="custom-control-label" for="customCheck2">Payment when order arrival
                                    (CASH)</label>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="checkout-content">
                        <h5 class="title--">Your Order</h5>
                        <div class="products">
                            <div class="products-data">
                                <h5>Products:</h5>
                                <div class="single-products d-flex justify-content-between align-items-center">
                                    <p>Recuerdos Plant</p>
                                    <h5>$9.99</h5>
                                </div>
                            </div>
                        </div>
                        <div class="subtotal d-flex justify-content-between align-items-center">
                            <h5>Subtotal</h5>
                            <h5>$9.99</h5>
                        </div>
                        <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>Shipping</h5>
                            <h5>$3.00</h5>
                        </div>
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <h5>Order Total</h5>
                            <h5>$12.99</h5>
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
