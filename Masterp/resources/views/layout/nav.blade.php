<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Mashtal.online - Gardening &amp; Landscaping </title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('front_end/img/core-img/favicon.ico') }}" />

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('front_end/style.css') }}" />


    <link rel="stylesheet" href="{{ asset('front_end/myaccount22.css') }}">









</head>

<body>
    <!-- Preloader -->
    {{-- <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="{{ asset('front_end/img/core-img/leaf.png') }}" alt="" />
        </div>
    </div>
 --}}


    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->

                            <!-- كومنت على الايمل  -->
                            <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                    title="infodeercreative@gmail.com"><i class="fa fa-envelope-o"
                                        aria-hidden="true"></i> <span>Email: infodeercreative@gmail.com</span></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                    title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us:
                                        +1 234 122 122</span></a>
                            </div>

                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Language Dropdown -->
                                <!-- <div class="language-dropdown">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">USA</a>
                                            <a class="dropdown-item" href="#">UK</a>
                                            <a class="dropdown-item" href="#">Bangla</a>
                                            <a class="dropdown-item" href="#">Hindi</a>
                                            <a class="dropdown-item" href="#">Spanish</a>
                                            <a class="dropdown-item" href="#">Latin</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Login -->
                                <div class="login">
                                    <a href="login.html"><i class="fa fa-user" style="font-size: 25px; "
                                            aria-hidden="true"></i>
                                        <span>Login</span></a>



                                </div>
                                <!-- Cart -->
                                <div class="cart">
                                    <a href="#"><i class="fa fa-shopping-cart" style="font-size: 25px;"
                                            aria-hidden="true"></i>
                                        <span>Cart <span class="cart-quantity">(1)</span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">
                        <!-- Nav Brand -->
                        <a href="index.html" class="nav-brand"><img id="navlogo"
                                src="{{ asset('front_end/img/core-img/NEWLOGO-removebg-preview.png') }}"
                                alt="" /></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap">
                                    <span class="top"></span><span class="bottom"></span>
                                </div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{route ('home') }}">Home</a></li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul class="dropdown">

                                            <li> <a href="{{ route('shop') }}">Shop</a>
                                                <ul class="dropdown">
                                                    <li><a href="{{ route('shop') }}">Shop</a></li>
                                                    <li>
                                                        {{-- <a href="{{ route('shopdetai') }}">Shop Details</a> --}}
                                                    </li>
                                                    <li><a href="{{ route('cart') }}">Shopping Cart</a></li>
                                                    <li><a href="{{ route('checkOut') }}">Checkout</a></li>
                                                </ul>
                                            </li>
                                    </li>
                                    <li>
                                        <a href="portfolio.html">Service</a>
                                        <ul class="dropdown">
                                            <li><a href="portfolio.html">Event</a></li>
                                            <li>
                                                <a href="single-portfolio.html">Event Details</a>

                                            <li>
                                                <a href="blog.html">Blog</a>
                                                <ul class="dropdown">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-post.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                    </li>

                                </ul>
                                </li>


                                </ul>
                                </li>
                                <!-- <li><a href="portfolio.html">Portfolio</a></li> -->
                                <li><a href="{{ route("show.contact") }}">Contact Us</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>





                                @if (Route::has('login'))
                                    @auth
                                        <li><a>My Account</a>
                                            <ul class="dropdown text-center">
                                                <li><a href="{{ route('myacc') }}">Profile</a></li>

                                                <form style="display: inline-block" method="POST" class="nav-item"
                                                    action="{{ route('logout') }}">
                                                    @csrf
                                                    <li> <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();this.closest('form').submit();">
                                                            {{ __('Log Out') }}
                                                        </a></li>
                                                </form>







                                            </ul>
                                        </li>
                                        <li style="margin-top: -6px"> <a
                                                href="{{ url('http://127.0.0.1:8000/chatify') }}"> <svg width="30px"
                                                    height="30px" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22ZM8 13.25C7.58579 13.25 7.25 13.5858 7.25 14C7.25 14.4142 7.58579 14.75 8 14.75H13.5C13.9142 14.75 14.25 14.4142 14.25 14C14.25 13.5858 13.9142 13.25 13.5 13.25H8ZM7.25 10.5C7.25 10.0858 7.58579 9.75 8 9.75H16C16.4142 9.75 16.75 10.0858 16.75 10.5C16.75 10.9142 16.4142 11.25 16 11.25H8C7.58579 11.25 7.25 10.9142 7.25 10.5Z"
                                                            fill="#8dc63f"></path>
                                                    </g>
                                                </svg></a> </li>
                                    @else
                                        <li><a class="btn alazea-btn mr-30" href="{{ route('login') }}"
                                                class="">Login</a></li>
                                        @if (Route::has('register'))
                                            <li><a class="btn alazea-btn active" href="{{ route('login') }}"
                                                    class="">Register</a></li>
                                        @endif
                                    @endauth
                                @endif



                                </ul>









                                <!-- Search Icon -->
                                <div id="searchIcon">
                                    <i class="fa fa-search" aria-hidden="true"></i>




                                </div>


                            </div>
                            <!-- Navbar End -->

                        </div>
                   
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search"
                                placeholder="Type keywords &amp; press enter..." />
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
