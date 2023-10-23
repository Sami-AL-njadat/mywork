@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Product</h1>
                <div class="section-header-breadcrumb">
                    <!-- Add your breadcrumbs here if needed -->
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Product</h4>
                            </div>
                            <div class="card-body">
                                <form 
                                 action="{{ route('product.update', $product->id) }}" 
                                 method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name" value="{{ $product->productName }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Sdescription">Short Description</label>
                                        <textarea class="form-control" name="Sdescription" id="Sdescription" placeholder="Enter short description">{{ $product->Sdescription }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="Ldescription">Long Description</label>
                                        <textarea class="form-control" name="Ldescription" id="Ldescription" placeholder="Enter long description">{{ $product->Ldescription }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" name="price" class="form-control" id="price" placeholder="Enter price" value="{{ $product->price }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="stockqty">Stock Quantity</label>
                                        <input type="number" name="stockqty" class="form-control" id="stockqty" placeholder="Enter stock quantity" value="{{ $product->stockqty }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        {{-- <select id="status" name="status" class="form-control">
                                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select> --}}
                              <input type="text" id="status" name="status" class="form-control" id="stockqty" placeholder="Enter status " value="{{ $product->status }}">

                                    </div>

                                    <div class="form-group">
                                        <label for="categoryId">Category ID</label>
                                        <input type="number" name="categoryId" class="form-control" id="categoryId" placeholder="Enter category ID" value="{{ $product->categoryId }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="image1">Image 1</label>
                                        <input type="file" name="image1" class="form-control" id="image1" accept="image/*">
                                        @if ($product->image1)
                                            <br>
                                            <img src="{{ asset($product->image1) }}" width="100" alt="Image 1 Preview">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="image2">Image 2</label>
                                        <input type="file" name="image2" class="form-control" id="image2" accept="image/*">
                                        @if ($product->image2)
                                            <br>
                                            <img src="{{ asset($product->image2) }}" width="100" alt="Image 2 Preview">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="image3">Image 3</label>
                                        <input type="file" name="image3" class="form-control" id="image3" accept="image/*">
                                        @if ($product->image3)
                                            <br>
                                            <img src="{{ asset($product->image3) }}" width="100" alt="Image 3 Preview">
                                        @endif
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
