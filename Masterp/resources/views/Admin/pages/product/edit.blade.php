@extends('admin.layout.master')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Category</h1>
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
                                <h4>Edit</h4> Project</h4>
                            </div>
                            <div class="card-body p-0">
                                <form 
                                {{-- action="{{ route('projects.update', $project->id) }}"  --}}
                                    method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Preview</label>
                                                <br>
                                                <img width="200px" 
                                                {{-- src="{{ asset($project->image) }}" --}}
                                                >
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" class="form-control" id="image"
                                                        placeholder="Choose an image">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="name">Project Name</label>
                                                    <input type="name" name="name" 
                                                    {{-- value="{{ $project->title }}" --}}
                                                        class="form-control" id="inputEmail4"
                                                        placeholder="Enter a project name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="location">Location</label>
                                                    <input type="text" name="location"
                                                     {{-- value="{{ $project->location }}" --}}
                                                        class="form-control" id="location"
                                                        placeholder="Enter a project location">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="startday">Start in :</label>
                                                    <input type="date" name="startday" 
                                                    {{-- value="{{ $project->start_day }}" --}}
                                                        class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="endday">End in :</label>
                                                    <input type="date" name="endday"
                                                     {{-- value="{{ $project->end_day }}" --}}
                                                        class="form-control" id="endday">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="starthour">From :</label>
                                                    <input type="time" name="starthour"
                                                        {{-- value="{{ $project->volunteering_hours_start }}" --}}
                                                        class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="endhour">To :</label>
                                                    <input type="time" name="endhour"
                                                        {{-- value="{{ $project->volunteering_hours_end }}"  --}}
                                                        class="form-control"
                                                        id="endday">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="volunteeringdays">Volunteering Days</label>
                                                    <input type="text" name="volunteeringdays"
                                                        {{-- value="{{ $project->volunteering_days }}"  --}}
                                                        class="form-control"
                                                        id="inputEmail4" placeholder="EX: Sunday - Monday - ....">
                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label for="status">Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="">Select a status:</option>
                                                        {{-- <option @if ($project->status == '1') selected @endif --}}
                                                            value="1">Compeleted</option>
                                                        {{-- <option @if ($project->status == '0') selected @endif --}}
                                                            value="0">Not Compeleted</option>
                                                        <!-- Add more status options as needed -->
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="description">Description</label>
                                                    <textarea class="summernote-simple" name="long_description" id="description" placeholder="Enter a description">
                                                        {{-- {!! $project->long_description !!} --}}
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="category">Category</label>
                                                    <select id="category" name="category" class="form-control">
                                                        <option value="">Select a category:</option>

                                                        {{-- <option @if ($project->category_id == '2') selected @endif
                                                            value="{{ $category->name }}">{{ $category->name }}</option>
                                                        <option @if ($project->category_id == '3') selected @endif
                                                            value=""{{ $category->name }}>{{ $category->name }}
                                                        </option>
                                                        <!-- Add more status options as needed -->
                                                        @foreach ($category as $item)
                                                            <option @if ($project->category_id == '1') selected @endif
                                                                value="{{ $item->name }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach --}}
                                                        {{-- @foreach ($category as $categorys)
                                                            <option value="{{ $categorys->id }}">{{ $categorys->name }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>


                                            {{-- ------------------- Optional ------------------ --}}
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="volunteeringnumber">Volunteering Number</label>
                                                    <input type="number" name="volunteeringnumber"
                                                        {{-- value="{{ $project->volunteering_number }}"  --}}
                                                        class="form-control"
                                                        id="endday" placeholder="Enter volunteering number">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="budget">Budget</label>
                                                    <input type="number" name="budget"
                                                     {{-- value="{{ $project->budget }}" --}}
                                                        class="form-control" id="inputEmail4" min="0"
                                                        step="0.01" placeholder="EX: 200.00 ">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="treetype">Tree Type</label>
                                                    <input type="text" name="treetype"
                                                        {{-- value="{{ $project->tree_type }}"  --}}
                                                        class="form-control"
                                                        id="inputEmail4" placeholder="Enter tree types">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="fertilizer">Fertilizer</label>
                                                    <input type="text" name="fertilizer"
                                                        {{-- value="{{ $project->fertilizer }}"  --}}
                                                        class="form-control"
                                                        id="inputEmail4" placeholder="Enter Fertilizer">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="equipments">Equipments</label>
                                                    <input type="text" name="equipments" class="form-control"
                                                        id="inputEmail4" placeholder="Enter Equipments"
                                                        {{-- value="{{ $project->equipments }}" --}}
                                                        >
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
