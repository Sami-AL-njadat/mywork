@extends('layout.master')
@section('content')
<!-- ##### Hero Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
        style="background-image: url('{{ asset('front_end/img/bg-img/24.jpg') }}')">
        <h2>My Account</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- ##### Blog Area Start ##### -->

        <!-- Begin Uren's Page Content Area -->
        <main class="page-content">
            <!-- Begin Uren's Account Page Area -->
            <div class="account-page-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab"
                                        href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                        aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders"
                                        role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-address-tab" data-toggle="tab"
                                        href="#account-address" role="tab" aria-controls="account-address"
                                        aria-selected="false">Addresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-details-tab" data-toggle="tab"
                                        href="#account-details" role="tab" aria-controls="account-details"
                                        aria-selected="false">Account Details</a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" id="account-logout-tab" href="login-register.html" role="tab" aria-selected="false">Logout</a> -->
                                    {{-- <button type="submit" href="login-register.html"
                                    class="btn alazea-btn btn-success mt-15"
                                    style="margin-top: 10px; border:1px solid lawngreen;">Logout</button> --}}
                                    <form style="display: inline-block" method="POST" class="nav-item"
                                        action="{{ route('logout') }}">
                                        @csrf
                                        <li>
                                            <button class="btn alazea-btn btn-success mt-15"
                                                style="margin-top: 10px; border:1px solid lawngreen;"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </button>
                                        </li>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                    aria-labelledby="account-dashboard-tab">
                                    <div class="myaccount-dashboard">
                                        <div class="tab-pane fade active show" id="account-general">
                                            @php
                                                $user = auth()->user();
                                            @endphp
                                            <form method="post" action="{{ route('profile.update') }}"
                                                class="mt-6 space-y-6" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body media align-items-center">
                                                    <img src="{{ asset('images/users/' . Auth::user()->image) }}"
                                                        style="height: 100px; border-radius: 90%;" alt=""
                                                        class="d-block ui-w-80">
                                                    <div class="media-body ml-4">
                                                        <label class="btn btn-primary ">
                                                            Upload new photo
                                                            <x-text-input id="image" name="image" type="file"
                                                                class="account-settings-fileinput" :value="old('image', $user->image)"
                                                                required autofocus autocomplete="name" />
                                                        </label> &nbsp;
                                                    </div>
                                                </div>
                                                <p>Hello <b> {{ Auth::user()->name }} </b>
                                                    {{ Auth::user()->email }}
                                                    ( <a href="login-register.html">Sign out</a>)</p>
                                                <p>From your account dashboard you can view your recent orders, manage your
                                                    shipping and billing addresses and <a href="javascript:void(0)">edit your
                                                        password and account details</a>.</p>
                                                        <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
                                                    </div>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button>&nbsp; --}}
                                        @if (session('status') === 'profile-updated')
                                            <p x-data="{ show: true }" x-show="show" x-transition
                                                x-init="setTimeout(() => show = false, 2000)"
                                                class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('Saved.') }}</p>
                                        @endif
                                         </form>
                                </div>








                                <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                    aria-labelledby="account-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MY ORDERS</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Date</th>
                                                        <th>Total Price</th>
                                                        <th>Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $No = 0; @endphp
                                                    @foreach ($orders as $item)
                                                        @php $No++; @endphp
                                                        <tr>
                                                            <td>{{ $No }}</td>
                                                            <td>{{ $item->created_at }}</td>
                                                            <td>{{ $item->totalPrice }}</td>
                                                            <td>
                                                                <button class="btn btn-success view-details-btn"
                                                                    data-order-id="{{ $item->id }}">View Details</button>
                                                            </td>
                                                        </tr>
                                                        <tr class="order-items-row" id="order-items-{{ $item->id }}"
                                                            style="display: none;">
                                                            <td colspan="4">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Product Image</th>
                                                                            <th>Product Name</th>
                                                                            <th>Price</th>
                                                                            <th>Quantity</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($item->orderItems as $items)
                                                                            <tr>
                                                                                <td><img src="{{ asset('' . $items->product->image1 . '') }}"
                                                                                        alt=""
                                                                                        style="width:80px"></td>
                                                                                <td>{{ $items->product->productName }}</td>
                                                                                <td>{{ $items->product->price }}</td>
                                                                                <td>{{ $items->quantity }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <script>
                                                // Add JavaScript to handle the "View Details" button click event
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    const viewDetailsButtons = document.querySelectorAll(".view-details-btn");

                                                    viewDetailsButtons.forEach(button => {
                                                        button.addEventListener("click", function() {
                                                            const orderId = this.getAttribute("data-order-id");
                                                            const orderItemsRow = document.getElementById("order-items-" + orderId);

                                                            if (orderItemsRow) {
                                                                if (orderItemsRow.style.display === "none") {
                                                                    orderItemsRow.style.display = "table-row";
                                                                } else {
                                                                    orderItemsRow.style.display = "none";
                                                                }
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="tab-pane fade" id="account-address" role="tabpanel"
                                aria-labelledby="account-address-tab">
                                <div class="myaccount-address">
                                    <p>The following addresses will be used on the checkout page by default.</p>
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>Company</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($address as $addres)
                                                    <tr>
                                                        <td>{{ $addres->address }}</td>
                                                        <td>{{ $addres->city }}</td>
                                                        <td>{{ $addres->company }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-details" role="tabpanel"
                                aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <form class="uren-form" method="post" action="{{ route('password.update') }}"
                                        class="mt-6 space-y-6">
                                        @csrf
                                        @method('put')
                                        <div class="uren-form-inner">
                                            <div class="single-input">
                                                <label for="account-details-firstname">Full Name*</label>
                                                <input type="text" id="account-details-firstname"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-email">Email*</label>
                                                <input type="email" id="account-details-email"
                                                    value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="single-input">
                                                <x-input-label for="current_password" :value="__('Current Password')" />
                                                <x-text-input id="current_password" name="current_password" type="password"
                                                    autocomplete="current-password" />
                                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                            </div>
                                            <div class="single-input">
                                                <x-input-label for="password" :value="__('New Password')" />
                                                <x-text-input id="password" name="password" type="password"
                                                    autocomplete="new-password" />
                                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                            </div>
                                            <div class="single-input">
                                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                                <x-text-input id="password_confirmation" name="password_confirmation"
                                                    type="password" autocomplete="new-password" />
                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                            </div>
                                            <style>
                                                .sami:hover {
                                                    border: 1px solid lawngreen !important;
                                                    color: lawngreen !important;
                                                }
                                            </style>
                                            <div class="single-input">
                                                <x-primary-button
                                                    class="btn alazea-btn btn-success mb-15 sami">{{ __('Update') }}</x-primary-button>
                                                @if (session('status') === 'password-updated')
                                                    <p x-data="{ show: true }" x-show="show" x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-sm text-gray-600 dark:text-gray-400">
                                                        {{ __('Saved.') }}</p>
                                                @endif
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>
@endsection
