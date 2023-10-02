@extends('layout.master')
@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">
            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url('{{ asset('front_end/img/bg-img/1.jpg') }}');">
                </div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>
                                    Bringing Nature Indoors
                                </h2>
                                <p>
                                    Discover the beauty and benefits of having plants at home.
                                    Not only do they add a touch of nature to your space,
                                    but they also contribute to cleaner air and a more serene environment
                                </p>
                                <div class="welcome-btn-group">
                                    <a href="#" class="btn alazea-btn mr-30">GET STARTED</a>
                                    <a href="#" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url('{{ asset('front_end/img/bg-img/2.jpg') }}');">
                </div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <h2>
                                    Greening Your Workspace
                                </h2>
                                <p>
                                    Transform your office into a vibrant and productive space with the power of plants.
                                    Explore how incorporating greenery can enhance both the environment and your work
                                    life.
                                </p>
                                <div class="welcome-btn-group">
                                    <a href="#" class="btn alazea-btn mr-30">GET STARTED</a>
                                    <a href="#" class="btn alazea-btn active">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ##### Blog Area Start ##### -->
        <section class="alazea-blog-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Heading -->
                        <div class="section-heading text-center">
                            <h2>OUR PRODUCT</h2>
                            <p>Explore our products and bring the beauty of plants into your world</p>

                        </div>
                    </div>
                </div>


                <div class="row justify-content-center">
                    <!-- Single Blog Post Area -->
                    @foreach ($categories as $category)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-blog-post mb-100">
                                <div class="post-thumbnail mb-30">
                                    <a href="shop.html"><img src="{{ $category->image }}" alt="" /></a>
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">
                                        <h3>
                                            {{ $category->categoryName }}
                                        </h3>
                                    </a>

                                    <p class="post-excerpt">
                                        {{ $category->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>
        </section>
        <!-- ##### Blog Area End ##### -->
        
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Service Area Start ##### -->
    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR SERVICES</h2>
                        <p>We provide the perfect service for you.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="alazea-service-area mb-100">

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="{{ asset('front_end/img/core-img/b2.png') }}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5> FUTURE PLAN </h5>
                                <p>To have plastic houses through which we cultivate thyme, sesame, and sumac, and use
                                    olive oil, all from Ajloun city.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="{{ asset('front_end/img/core-img/cf1.png') }}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>SPECIAL ORDER</h5>
                                <p>Exclusive orders, including unique gifts and specific plants, are unavailable through
                                    other markets or our website.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="500ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="{{ asset('front_end/img/core-img/event12.png') }}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>EVENT</h5>
                                <p>We enhance your events' beauty and enjoyment through the captivating allure of
                                    nature.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-video-area bg-overlay mb-100">
                        <img src="{{ asset('img/bg-img/23.jpg') }}" alt="">
                        <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="video-icon">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area End ##### -->



    <!-- ##### Product Area Start ##### -->
    <section class="new-arrivals-products-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>NEW ARRIVALS</h2>
                        <p>We have the latest products, it must be exciting for you</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Product Area -->
                @foreach ($product as $newarrvel)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href="{{ route('shopdetai', $newarrvel->id) }}"><img src="{{ $newarrvel->image1 }}"
                                        alt="" /></a>
                                <!-- Product Tag -->
                                <div class="product-tag">
                                    <a href="#">Hot</a>
                                </div>
                             
                                <div class="product-meta d-flex">
                                    <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                    <a href="{{ route('cartstor') }}/{{ $newarrvel->id }}" class="add-to-cart-btn">Add to cart</a>
                                    <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>
                            <!-- Product Info -->
                            <div class="product-info mt-15 text-center">
                                <a href="shop-details.html">
                                    <p>{{ $newarrvel->productName }}</p>
                                </a>
                                <h6>{{ $newarrvel->price }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12 text-center">
                    <a href="{{ route('shop') }}" class="btn alazea-btn">View All</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Product Area End ##### -->
@endsection