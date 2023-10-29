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

                            @php
                                $user = auth()->user();
                            @endphp
                           <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">

                                @csrf
                                @method('PUT')
                                <div class="card-body media align-items-center">
                                  <img src="{{ asset('uploads/' . Auth::user()->image) }}" style="height: 100px; border-radius: 90%;" alt="" class="d-block ui-w-80">

                                    <div class="media-body ml-4">
                                       <x-text-input id="image" name="image" type="file" class="account-settings-fileinput" :value="old('image', Auth::user()->image)" required autofocus autocomplete="name" />

                                        </label> &nbsp;
                                        {{-- <button type="button" class="btn btn-default md-btn-flat">Reset</button> --}}

                                        <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                    </div>
                                </div>
                                <hr class="border-light m-0">

                                <div class="card-body">
                                    {{-- <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control mb-1" value="">
                                    </div> --}}
                                    <div class="form-group">
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" name="name" type="text" class="form-control"
                                            :value="old('name', $user->name)" required autocomplete="name" />
                                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                    </div>
                                    <div class="form-group">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" name="email" type="email" class="form-control mb-1"
                                            :value="old('email', $user->email)" required autocomplete="username" />
                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                            <div>
                                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                    {{ __('Your email address is unverified.') }}

                                                    <button form="send-verification"
                                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                        {{ __('Click here to re-send the verification email.') }}
                                                    </button>
                                                </p>

                                                @if (session('status') === 'verification-link-sent')
                                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>
                                {{-- <button type="button" class="btn btn-primary">Save changes</button>&nbsp; --}}

                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </form>

                        </div>
                        <div class="tab-pane fade" id="changePassword">
                            <div class="profile">
                                <h1>User Profile</h1>
                                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('put')

                                    <div>
                                        <x-input-label for="current_password" :value="__('Current Password')" />
                                        <x-text-input id="current_password" name="current_password" type="password"
                                            class="form-control" autocomplete="current-password" />
                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-input-label for="password" :value="__('New Password')" />
                                        <x-text-input id="password" name="password" type="password" class="form-control"
                                            autocomplete="new-password" />
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    </div>

                                    <div>
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <x-text-input id="password_confirmation" name="password_confirmation"
                                            type="password" class="form-control" autocomplete="new-password" />
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>

                                        @if (session('status') === 'password-updated')
                                            <p x-data="{ show: true }" x-show="show" x-transition
                                                x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <div class="profile">
                                <h1>User Profile</h1>
                                <div class= "table-responsive">
                                    <table class="table table-bordered table-sm custom-table"
                                        style="width: 100%;margin:0 auto">
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
                                                        <button class="btn btn-primary view-details-btn"
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
                                                                                alt="" style="width:80px"></td>
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

                                </div>


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
