@extends('admin.dashboard')
@section('admin')
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Notice</h5>
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

            <form method="POST" action="{{ route('admin.notice.store') }}" onsubmit="sanitizeInputs()" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Notice Date <span style="color:brown">*</span></label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" name="not_date" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Notice Title <span style="color:brown">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="not_title" placeholder="Notice Title" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Notice Description</label>
                    <div class="col-sm-10">
                        <textarea name="message" class="form-control editor" placeholder="Enter Notice Description"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Notice Type <span style="color:brown">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-select" name="not_type" aria-label="Default select example">
                            @foreach ($types as $type)
                                <option value="{{ $type->title }}">{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Attachment <span style="color:brown">*</span></label>
                    <div class="col-sm-10">
                        <div class="col-sm-12">
                            <input class="form-control" type="file" accept=".pdf,.jpg,.png,.doc,.docx,.jpeg" id="formFile" name="not_file" required>
                        </div>
                    </div>
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
