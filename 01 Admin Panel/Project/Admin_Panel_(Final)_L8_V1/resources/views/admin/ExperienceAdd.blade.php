
@section('title', 'Add Experience ')

@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Eperiences</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Experience</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Experience</h5>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"aria-label="Close"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"aria-label="Close"></button>
                </div>
            @elseif (session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle me-1"></i>
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

                {{-- <a href="{{ route('ShowAllExperience') }}" class="btn btn-success"
                    style="width: 140px; margin-left:20px; margin-bottom:20px">All Experences
                </a> --}}
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Failed to upload Notice
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div> -->


                {{-- {{route('addEducations')}} --}}
                <!-- Horizontal Form -->
                <form method="POST" onsubmit="sanitizeInputs()" action="{{ route('StoreExperience') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Degree</label> --}}
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" required
                                placeholder="Title of experience">
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">University</label> --}}
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="organization"
                                placeholder="Name of Oganization" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Passing Year</label> --}}
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="fromDate"
                                placeholder="From Date" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Passing Year</label> --}}
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="toDate" placeholder="To Date"
                            required>
                        </div>
                    </div>

                    <input type="hidden"  id="inputText" name="user" value="{{$profileData->user_id}}">

                    {{-- <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                  <textarea  class="form-control" name="not_des" id="about" style="height: 100px" placeholder="Notice Description"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Attachment</label>
                  <div class="col-sm-10">
                  <div class="col-sm-12"><input class="form-control" type="file" id="formFile" name='not_file' require></div>
                  </div>
                </div> --}}

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Horizontal Form -->

            </div>
        </div>
    </main>
@endsection
