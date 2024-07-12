@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Events</h5>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Failed to upload Notice
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div> -->


                <!-- Horizontal Form -->
                <form method="POST" action="{{ route('admin.event.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Event Date</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="date" require>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Event Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="title"
                                placeholder="Event Title" require>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="about" style="height: 100px" placeholder="Event Description"></textarea>
                            {{-- <div class="col-md-8 col-lg-9"> --}}
                            <!-- Quill Editor Default -->
                            {{-- <div class="form-group mb-4"> --}}
                                {{-- <div class="col-sm-12">
                                    <textarea name="description" class="form-control editor" style="height: 1000pxyyy" ></textarea>
                                </div> --}}
                                {{-- </div> --}}
                                <!-- End Quill Editor Default -->

                                {{-- </div> --}}
                        </div>
                        {{-- </div> --}}
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Attachment</label>
                        <div class="col-sm-10">
                            <div class="col-sm-12"><input class="form-control" type="file" id="formFile" name='file'
                                    require></div>
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

@section('script')
    <script>
        // first editor
        ClassicEditor
            .create(document.querySelector('.editor'), {
                ckfinder: {
                    uploadUrl: "ckfileupload.php",
                }
            })
            .then(editor => {

                console.log(editor);

            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- ckeditor5 JS -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
@endsection
