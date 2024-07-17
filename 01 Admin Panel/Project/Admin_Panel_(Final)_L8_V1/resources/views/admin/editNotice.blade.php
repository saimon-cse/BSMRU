@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Notice</h5>
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

                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Failed to upload Notice
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div> -->


                <!-- Horizontal Form -->
                <form method="POST" action="{{ route('admin.notice.edited', ['id' => $notice->id]) }}"
                    enctype="multipart/form-data" onsubmit="sanitizeInputs()">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Notice Date <span style="color:brown">*</span></label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="not_date" value="{{ $notice->not_date }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Notice Title <span style="color:brown">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="not_title"
                                value="{{ $notice->not_title }}" placeholder="Notice Title" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Notice description</label>
                        <div class="col-sm-10">
                            <textarea name="message" class="form-control editor" placeholder="Enter Notice description.">{{$notice->not_des}}</textarea>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Notice Type <span style="color:brown">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-select" name="not_type" aria-label="Default select example">
                                @foreach ($types as $type)
                                    <option value="{{ $type->title }}" @if ($notice->not_type == $type->title) selected @endif>
                                        {{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Change file</label>
                        <div class="col-sm-10">
                            <div class="col-sm-12"><input class="form-control" type="file" id="formFile"
                                    value="{{ $notice->not_file }}" accept=".pdf,.png,.jpg,.doc,.docx" name='not_file'>
                            </div>
                        </div>
                    </div> --}}

                    <div class="row mb-3">
                        <label for="file" class="col-sm-2 col-form-label">Current File</label>
                        <div class="col-sm-10">
                            @if ($notice->not_file)
                                <p>{{ $notice->not_file }}</p>
                                <input accept=".pdf,.png,.jpg,.doc,.docx" class="form-control" type="file" id="file" name="not_file">
                            @else
                                <input accept=".pdf,.png,.jpg,.doc,.docx" class="form-control" type="file" id="file" name="not_file" required>
                            @endif
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
