@extends('layout.master')
@section('content')
    {{-- <hr> --}}
        <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url('{{ asset('front_end/img/bg-img/24.jpg') }}')">

            <h2>Cart</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ('/') }}"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- END nav -->
    <div class="container light-style flex-grow-1 container-p-y "style="margin:110px auto">

        <!-- <h4 class="font-weight-bold py-3 mb-4">
                                                                Account settings
                                                            </h4> -->

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-general"
                            id="general-tab">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#changePassword"
                            id="change-password-tab">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#orders"
                            id="orders-tab">orders</a>
                        {{-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Social links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a> --}}
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">

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
                                                        ( <a href="login-register.html">Sign
                                                            out</a>)</p>
                                                    <p>From your account dashboard you can view your recent orders, manage
                                                        your
                                                        shipping and
                                                        billing addresses and <a href="javascript:void(0)">edit your
                                                            password and
                                                            account details</a>.</p>
                                            </div>
                                            <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
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
                                                                @php $No ++; @endphp
                                                                <tr>
                                                                    <td>{{ $No }}</td>
                                                                    <td>{{ $item->created_at }}</td>
                                                                    <td>{{ $item->totalPrice }}</td>
                                                                    <td>
                                                                        <button class="btn btn-success view-details-btn"
                                                                            data-order-id="{{ $item->id }}">View
                                                                            Details</button>
                                                                    </td>
                                                                </tr>
                                                                <tr class="order-items-row"
                                                                    id="order-items-{{ $item->id }}"
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
                                                                                        <td>{{ $items->product->productName }}
                                                                                        </td>
                                                                                        <td>{{ $items->product->price }}
                                                                                        </td>
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

                        </div>
                        <div class="tab-pane fade" id="changePassword">
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
                        <div class="tab-pane fade" id="orders">
                         <form class="uren-form" method="post" action="{{ route('password.update') }}"
                                            class="mt-6 space-y-6">
                                            @csrf
                                            @method('put')
                                            <div class="uren-form-inner">
                                                <div class="single-input">
                                                    <label for="account-details-firstname">Full Name*</label>
                                                    <input type="text" id="account-details-firstname"
                                                        value="{{ Auth::user()->name }} ">
                                                </div>

                                                <div class="single-input">
                                                    <label for="account-details-email">Email*</label>
                                                    <input type="email" id="account-details-email"
                                                        value="{{ Auth::user()->email }} ">
                                                </div>
                                                <div class="single-input">
                                                    <x-input-label for="current_password" :value="__('Current Password')" />
                                                    <x-text-input id="current_password" name="current_password"
                                                        type="password" {{-- class="mt-1 block w-full" --}}
                                                        autocomplete="current-password" />
                                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                                </div>
                                                <div class="single-input">
                                                    <x-input-label for="password" :value="__('New Password')" />
                                                    <x-text-input id="password" name="password" type="password"
                                                        {{-- class="mt-1 block w-full"  --}} autocomplete="new-password" />
                                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                                </div>


                                                <div class="single-input">
                                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                                    <x-text-input id="password_confirmation" name="password_confirmation"
                                                        type="password" {{-- class="mt-1 block w-full"  --}}
                                                        autocomplete="new-password" />
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

        <div class="text-right mt-3">

            {{-- <button type="button" class="btn btn-default">Cancel</button> --}}
        </div>

    </div>
    <script>
        // Function to save the active tab in a cookie
        function saveActiveTab(tabId) {
            document.cookie = "activeTab=" + tabId;
        }

        // Function to get the active tab from the cookie
        function getActiveTab() {
            const name = "activeTab=";
            const decodedCookie = decodeURIComponent(document.cookie);
            const cookieArray = decodedCookie.split(';');
            for (let i = 0; i < cookieArray.length; i++) {
                let cookie = cookieArray[i];
                while (cookie.charAt(0) == ' ') {
                    cookie = cookie.substring(1);
                }
                if (cookie.indexOf(name) == 0) {
                    return cookie.substring(name.length, cookie.length);
                }
            }
            return null;
        }

        // Function to set the active tab based on the cookie
        function setActiveTab() {
            const activeTab = getActiveTab();
            if (activeTab) {
                document.getElementById(activeTab).click();
            }
        }

        // Add click event listeners to tab links to save the active tab
        const tabLinks = document.querySelectorAll("[data-toggle='list']");
        tabLinks.forEach((tabLink) => {
            tabLink.addEventListener("click", function() {
                saveActiveTab(tabLink.id);
            });
        });

        // Set the active tab when the page loads
        window.addEventListener("load", setActiveTab);
    </script>

@endsection
