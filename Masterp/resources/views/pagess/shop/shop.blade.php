@extends('layout.master')
@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url('{{ asset('front_end/img/bg-img/24.jpg') }}')">
            <h2>Shop</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        <div class="shop-page-count">
                            <p>Showing 1-{{ Request::get('per_page') }} of {{ $counts }} results</p>

                        </div>
                        <!-- Search by Terms -->
                        <div class="search_by_terms">
                            <form method="get" action="{{ route('products.index') }}" class="form-inline">
                                {{-- <select class="custom-select widget-title">
                                    <option selected>Short by Popularity</option>
                                    <option value="1">Short by Newest</option>
                                    <option value="2">Short by Sales</option>
                                    <option value="3">Short by Ratings</option>
                                </select> --}}
                                <label for="perPageSelect">Short by Popularity:</label>
                                <select class="custom-select widget-title" name="per_page" id="perPageSelect"
                                    onchange="this.form.submit()">
                                    <option value="6" {{ Request::get('per_page') == '6' ? 'selected' : '' }}>6
                                    </option>
                                    <option value="9" {{ Request::get('per_page') == '9' ? 'selected' : '' }}>9
                                    </option>
                                    <option value="12" {{ Request::get('per_page') == '12' ? 'selected' : '' }}>12
                                    </option>
                                    <option value="18" {{ Request::get('per_page') == '18' ? 'selected' : '' }}>18
                                    </option>

                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop-sidebar-area">
                        <!-- Shop Widget -->

                        <form method="GET" action="{{ route('shop.filterByPrice') }}" id="formeee">
                            <!-- Your other form elements (if any) here -->

                            <div class="shop-widget price mb-50">
                                <h4 class="widget-title">Prices</h4>
                                <div class="widget-desc">
                                    <div class="slider-range">
                                        <div data-min="0" data-max="100" data-unit="$"
                                            class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                            data-value-min="0" data-value-max="100" data-label-result="Price:">

                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all "
                                                tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                tabindex="0"></span>
                                        </div>
                                        <div class="range-price">Price: $0 - $100</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add hidden input fields to capture price range -->

                            <input type="hidden" name="min_price" id="min_price" value="0">
                            <input type="hidden" name="max_price" id="max_price" value="20">

                            <button type="submit" class="btn alazea-btn active">Filter</button>
                        </form>

                        <!-- Shop Widget -->
                        <div class="shop-widget catagory mb-50">
                            <h4 class="widget-title">Categories</h4>
                            <div class="widget-desc">
                                <!-- Single Checkbox -->

                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    {{-- <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                    <label class="custom-control-label" for="customCheck1">All plants
                                        <span class="text-muted">{{ $counts }}</span>
                                    </label> --}}

                                    <a href="{{ route('shops') }}" class="btn alazea-btn active ">
                                        All plants<span>{{ $counts }}</span>
                                    </a>

                                </div>


                                @foreach ($allcategory as $items)
                                    <!-- Single Checkbox -->

                                    <div class="custom-control custom d-flex align-items-center ">
                                        {{-- <a href="{{ route('shops', ['id' => $items->id]) }}"> --}}
                                        {{-- <h5 class="custom-control">{{ $items->categoryName }}

                                                    <span class="text-muted"></span>
                                                </h5> --}}

                                        {{-- <button type="link"  class="btn alazea-btn active">{{ $items->categoryName }} <span>{{ $items->Products->count() }}</span> <a href="{{ route('shops', ['id' => $items->id]) }}"></a></button> --}}

                                        {{-- </a> --}}


                                        <a href="{{ route('shops', ['id' => $items->id]) }}"
                                            class="btn alazea-btn active  mb-2 ">
                                            {{ $items->categoryName }} <span>{{ $items->Products->count() }}</span>
                                        </a>


                                    </div>


                                    
                                @endforeach

                                {{-- @foreach ($allcategory as $category)
    @if ($category->products->count() > 1)
        <!-- Single Checkbox -->
        <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
            <input type="checkbox" class="custom-control-input" id="customCheck2_{{ $category->id }}" />
            <label class="custom-control-label" for="customCheck2_{{ $category->id }}">
                {{ $category->categoryName }}
                <span class="text-muted">{{ $category->products->count() }}</span>
            </label>
        </div>
    @endif
@endforeach --}}



                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget sort-by mb-50">
                            <h4 class="widget-title">Sort by</h4>
                            <div class="widget-desc">
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7" />
                                    <label class="custom-control-label" for="customCheck7">New arrivals</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div  class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input  type="checkbox" class="custom-control-input" id="customCheck8" href="" />
                                    <label  class="custom-control-label" for="customCheck8">Alphabetically, A-Z</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck9" />
                                    <label class="custom-control-label" for="customCheck9">Alphabetically, Z-A</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck10" />
                                    <label class="custom-control-label" for="customCheck10">Price: low to high</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="customCheck11" />
                                    <label class="custom-control-label" for="customCheck11">Price: high to low</label>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget best-seller mb-50">
                            <h4 class="widget-title">Best Seller</h4>
                            <div class="widget-desc">
                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="{{ asset('front_end/img/bg-img/4.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Cactus Flower</a>
                                        <p>$10.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="{{ asset('front_end/img/bg-img/5.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Tulip Flower</a>
                                        <p>$11.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="{{ asset('front_end/img/bg-img/34.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Recuerdos Plant</a>
                                        <p>$9.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                        <div class="row">
                            <!-- Single Product Area -->

                            <!-- Single Product Area -->

                            @foreach ($product as $allproduct)
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-area mb-50">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <a href="{{ route('shopdetai') }}/{{ $allproduct->id }}">
                                                <img src={{ asset($allproduct->image1) }} alt="" /></a>
                                            <div class="product-tag">
                                                @if ($allproduct->status > 0)
                                                    <a href="#">{{ $allproduct->status }}</a>
                                                @endif
                                            </div>
                                            <div class="product-meta d-flex">
                                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                                <a href="{{ route('cartstor') }}/{{ $allproduct->id }}"
                                                    class="add-to-cart-btn">Add to cart</a>
                                                <a href="#" class="compare-btn"><i
                                                        class="arrow_left-right_alt"></i></a>
                                            </div>

                                        </div>

                                        <!-- Product Info -->
                                        <div class="product-info mt-15 text-center">

                                            <a href="shop-details.html">
                                                <p>{{ $allproduct->productName }}</p>
                                            </a>
                                            <h6>{{ $allproduct->price }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{ $product->links() }}

                            </ul>
                        </nav>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
@endsection
