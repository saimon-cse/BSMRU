@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Journal Article</h5>
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

                <!-- Horizontal Form -->
                <form id="journalForm" method="POST" action="{{ route('admin.publication.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <select class="form-select" name="paperType" aria-label="Default select example" >
                                    @foreach ($types as $type)
                                        <option value="{{ $type->title }}">{{ $type->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>
                        <!-- Quill Editor Default -->
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <textarea name="message" class="form-control editor" id="" cols="30" rows="10" ></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="user" value="{{ $profileData->user_id }}">
                        <!-- End Quill Editor Default -->
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- End Horizontal Form -->
            </div>
        </div>
    </main>
@endsection
