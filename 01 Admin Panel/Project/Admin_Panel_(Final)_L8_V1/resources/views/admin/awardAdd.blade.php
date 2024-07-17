@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Award</h5>
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

                <!-- Horizontal Form -->
                <form method="POST" action="{{ route('StoreAward') }}" onsubmit="sanitizeInputs()" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Degree</label> --}}
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="type" required placeholder="Awards Type">
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">University</label> --}}
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="title"
                                placeholder="Award Title" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Passing Year</label> --}}
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="year" placeholder="Year"
                            required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Passing Year</label> --}}
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="country" placeholder="Country"
                            required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Passing Year</label> --}}
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="description"
                                placeholder="Description" required>
                        </div>
                    </div>

                    <input type="hidden" name="user" id="" value="{{$profileData->user_id}}">



                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Horizontal Form -->

            </div>
        </div>
    </main>
@endsection
