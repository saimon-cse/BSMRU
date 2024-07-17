@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Education</h5>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="bi bi-info-circle me-1"></i>
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

                <form method="POST" action="{{ route('StoreEducation') }}" enctype="multipart/form-data" onsubmit="sanitizeInputs()">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="degree" required placeholder="Name of Degree">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="university"
                                placeholder="University" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="passYear"
                                placeholder="Passing Year" required>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </main>


@endsection
