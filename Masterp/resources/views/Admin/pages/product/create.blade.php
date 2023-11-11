@extends('Admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Product</h1>
                <div class="section-header-breadcrumb">
                    <!-- Add your breadcrumbs here if needed -->
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Product</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter product name">
                                    </div>

                                    <div class="form-group">
                                        <label for="Sdescription">Short Description</label>
                                        <textarea class="form-control" name="Sdescription" id="Sdescription" placeholder="Enter short description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="Ldescription">Long Description</label>
                                        <textarea class="form-control" name="Ldescription" id="Ldescription" placeholder="Enter long description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" class="form-control" id="price"
                                            placeholder="Enter price">
                                    </div>

                                    <div class="form-group">
                                        <label for="stockqty">Stock Quantity</label>
                                        <input type="number" name="stockqty" class="form-control" id="stockqty"
                                            placeholder="Enter stock quantity">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        {{-- <select id="status" name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select> --}}
                                        <input type="text" name="status" class="form-control" id="status"
                                            placeholder="Enter status ">

                                    </div>

                                    <div class="form-group">
                                        <label for="categoryId">Category ID</label>
                                          <select class="form-control"   name="categoryId">
                                            <option value="">Choose a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"> #{{ $category->id }}  {{ $category->categoryName }} </option>
                                            @endforeach
                                        </select>
                                            
                                    </div>

                                    {{-- <div class="form-group">
                                         
                                        <select class="form-control"   name="categoryId">
                                            <option value="">Choose a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->categoryName }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}


                                    <div class="form-group">
                                        <label for="image1">Image 1</label>
                                        <input type="file" name="image1" class="form-control" id="image1"
                                            accept="image/*">
                                    </div>

                                    <div class="form-group">
                                        <label for="image2">Image 2</label>
                                        <input type="file" name="image2" class="form-control" id="image2"
                                            accept="image/*">
                                    </div>

                                    <div class="form-group">
                                        <label for="image3">Image 3</label>
                                        <input type="file" name="image3" class="form-control" id="image3"
                                            accept="image/*">
                                    </div>

                                    <!-- Add more form fields as needed for your product -->

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
