@extends('admin.dashboard')
@section('admin')
<main id="main" class="main">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Journal Article</h5>
              @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to upload Notice
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> -->


              <!-- Horizontal Form -->
              <form method="POST" action="{{route('admin.publication.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-8 col-lg-9">

                        <fieldset class="row mb-3">
                            {{-- <legend class="col-form-label col-sm-2 pt-0">Paper Type</legend> --}}
                            <div class="col-sm-10">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="journal" checked="">
                                <label class="form-check-label" for="gridRadios1">
                                 Journal Article
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="conference">
                                <label class="form-check-label" for="gridRadios2">
                                    Conference Paper
                                </label>
                              </div>

                            </div>
                          </fieldset>

                        <!-- Quill Editor Default -->
                        <div class="form-group mb-4">
                          <div class="col-sm-12">
                              <textarea name="message" class="form-control editor" id="" cols="30" rows="10"></textarea>
                          </div>
                        </div>
                        <!-- End Quill Editor Default -->

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
    .create( document.querySelector( '.editor' ),{
          ckfinder: {
                uploadUrl: "ckfileupload.php",
          }
    } )
    .then( editor => {

          console.log( editor );

    } )
    .catch( error => {
          console.error( error );
    } );


</script>
<!-- ckeditor5 JS -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
@endsection
