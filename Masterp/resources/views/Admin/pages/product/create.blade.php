@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Projects</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Table</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Project</h4>
                            </div>
                            <div class="card-body p-0">
                                <form 
                                {{-- action="{{ route('projects.store') }}"  --}}
                                method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="name">Project Name</label>
                                                    <input type="name" name="name" class="form-control"
                                                        id="inputEmail4" placeholder="Enter a project name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="location">Location</label>
                                                    <input type="text" name="location" class="form-control"
                                                        id="location" placeholder="Enter a project location">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="startday">Start in :</label>
                                                    <input type="date" name="startday" class="form-control"
                                                        id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="endday">End in :</label>
                                                    <input type="date" name="endday" class="form-control"
                                                        id="endday">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="starthour">From :</label>
                                                    <input type="time" name="starthour" class="form-control"
                                                        id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="endhour">To :</label>
                                                    <input type="time" name="endhour" class="form-control"
                                                        id="endday">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="volunteeringdays">Volunteering Days</label>
                                                    <input type="text" name="volunteeringdays" class="form-control"
                                                        id="inputEmail4" placeholder="EX: Sunday - Monday - ....">
                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label for="status">Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="">Select a status:</option>
                                                        <option value="1">Compeleted</option>
                                                        <option value="0">Not Compeleted</option>
                                                        <!-- Add more status options as needed -->
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="short_description">Short Description</label>
                                                    <input type="text" class="form-control" name="short_description" >
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="long_description">Long Description</label>
                                                    <textarea class="summernote-simple" name="long_description" placeholder="Enter a description"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" class="form-control" id="image"
                                                        placeholder="Choose an image" accept="image/*">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="category">Category</label>
                                                    <select id="category" name="category" class="form-control">
                                                        <option value="">Select a category:</option>
                                                        {{-- @foreach ($category as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach --}}

                                                        <!-- Add more status options as needed -->
                                                    </select>
                                                </div>
                                            </div>


                                            {{-- ------------------- Optional ------------------ --}}
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="volunteeringnumber">Volunteering Number</label>
                                                    <input type="number" name="volunteeringnumber" class="form-control"
                                                        id="endday" placeholder="Enter volunteering number">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="budget">Budget</label>
                                                    <input type="number" name="budget" class="form-control"
                                                        id="inputEmail4" min="0" step="0.01"
                                                        placeholder="EX: 200.00 ">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="treetype">Tree Type</label>
                                                    <input type="text" name="treetype" class="form-control"
                                                        id="inputEmail4" placeholder="Enter tree types">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="fertilizer">Fertilizer</label>
                                                    <input type="text" name="fertilizer" class="form-control"
                                                        id="inputEmail4" placeholder="Enter Fertilizer">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="equipments">Equipments</label>
                                                    <input type="text" name="equipments" class="form-control"
                                                        id="inputEmail4" placeholder="Enter Equipments">
                                                </div>
                                            </div>

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
@endsection
