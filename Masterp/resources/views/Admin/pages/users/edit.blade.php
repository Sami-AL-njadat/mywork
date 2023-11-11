{{-- @extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>user</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">users</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create user</h4>
                            </div>



                            <div class="card-body p-0">
                                <form action="{{ route('users.update', $users->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">

                                                    <div class="form-group">
                                                        <label>Preview</label>
                                                        <br>
                                                        <img width="200px" src="{{ asset($users->image) }}">
                                                    </div>



                                                    <label for="name">Name</label>


                                                    <input value="{{ $users->name }}" type="name" name="name"
                                                        class="form-control" id="inputEmail4" placeholder="Enter name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="location">email</label>
                                                    <input value="{{ $users->email }}" type="email" name="email"
                                                        class="form-control" id="location" placeholder="Enter email">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="tel" name="phone" value="{{ $users->phone }}"
                                                            class="form-control" id="inputAddress"
                                                            placeholder="EX: 077 777 7777">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>



                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection --}}





@extends('Admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>user</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">users</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create user</h4>
                            </div>
                            <div class="card-body p-0">
                                <form action="{{ route('users.update', $users->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">



                                                <div class="form-group">
                                                    <label for="image">Current Image</label>
                                                    <br>
                                                    @if ($users->image)
                                                        <img src="{{ asset($users->image) }}" alt="Current Image"
                                                            style="max-width: 100px; max-height:120px ">
                                                        <br>
                                                    @else
                                                        <p>No image uploaded.</p>
                                                    @endif
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div class="form-group col-md-6 ">
                                                        <label for="image">New Image</label>
                                                        <input type="file" name="image" class="form-control"
                                                            id="image" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Name</label>
                                                        <input value="{{ $users->name }}" type="name" name="name"
                                                            class="form-control" id="inputEmail4" placeholder="Enter name">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="location">email</label>
                                                        <b>YOUR Email Will <span style="color: red">Not Change</span> </b>

                                                        <input value="{{ $users->email }}" type="email" name="email"
                                                            class="form-control" id="location" placeholder="Enter email">
                                                    </div>



                                                    <div class="form-group col-md-6">
                                                        <label for="phone">Phone</label>
                                                        <input type="tel" name="phone" class="form-control"
                                                            id="phone" value="{{ $users->phone }}">
                                                    </div>

                                                </div>







                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
