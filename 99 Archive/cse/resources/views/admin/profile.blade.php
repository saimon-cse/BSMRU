@extends('admin.dashboard')
@section('admin')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{url('upload/admin_images/'.$profileData->photo)}}" alt="Profile" class="rounded-circle">
              <h2>{{$profileData-> fullName}}</h2>
              <h3>{{$profileData-> designation}}</h3>
              <h3>{{$profileData-> dept}}</h3>
              <div class="social-links mt-2">
                <!-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a> -->
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Academics & Research</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

            </ul>
            @php
                $str = $profileData-> researchInt;
            @endphp
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Research Interest</h5>
                  <p class="small fst-italic">@php
                      echo $str;
                  @endphp</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{$profileData-> fullName}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Inistitution</div>
                    <div class="col-lg-9 col-md-8">{{$profileData-> institute}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Designation</div>
                    <div class="col-lg-9 col-md-8">{{$profileData-> designation}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Special Designation</div>
                    <div class="col-lg-9 col-md-8">{{$profileData-> special_desig}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Department</div>
                    <div class="col-lg-9 col-md-8">{{$profileData-> dept}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">{{$profileData-> country}}</div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">{{$profileData-> phone}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$profileData-> email}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="{{!empty($profileData-> photo) ? url('upload/admin_images/'.$profileData->photo) : url('upload/admin_images/no_image.png')}}" alt="Profile">
                        <div class="pt-2">
                        <div class="col-sm-4"><input class="form-control" type="file" id="formFile" name='photo'></div>
                          <!-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" name='photo'><i class="bi bi-trash"></i></a> -->
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="{{$profileData-> fullName}}">
                      </div>
                    </div>


{{--
                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Research Interest</label>
                      <div class="col-md-8 col-lg-9">
                         <!-- Quill Editor Default -->
                         <div class="quill-editor-default">
                         <input name="about" type="hidden">
                        <textarea class="form-control" id="about" name="researchInt" style="height: 100px" >{{$profileData-> researchInt}}</textarea>
                        </div>
                        <!-- End Quill Editor Default -->

                      </div>
                    </div> --}}

                    <div class="row mb-3">
                        <label for="Research Interest" class="col-md-4 col-lg-3 col-form-label">Research Interest</label>
                        <div class="col-md-8 col-lg-9">
                          <!-- Quill Editor Default -->
                          <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <textarea name="message" class="form-control editor" id="" cols="30" rows="10">{{$profileData->researchInt}}</textarea>
                            </div>
                          </div>
                          <!-- End Quill Editor Default -->

                        </div>
                      </div>


                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Designation</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="designation" type="text" class="form-control" id="Job" value="{{$profileData-> designation}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Special Designation</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="special_desig" type="text" class="form-control" id="Job" value="{{$profileData-> special_desig}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Department</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dept" type="text" class="form-control" id="Job" value="{{$profileData-> dept}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Institute</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="institute" type="text" class="form-control" id="company" value="{{$profileData-> institute}}">
                      </div>
                    </div>



                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="{{$profileData-> country}}">
                      </div>
                    </div>

                    <!-- <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                      </div>
                    </div> -->

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="{{$profileData-> phone}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{$profileData-> email}}">
                      </div>
                    </div>



                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!--======== Academic & Research====== -->
                  {{-- <form method="POST" action="{{route('admin.profile.academin')}}" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group mb-4">
                        <div class="col-sm-10">
                            <textarea name="new" class="form-control editor2" id="" cols="30" rows="10" placeholder="Enter Research paper of artical details.."></textarea>
                        </div>
                      </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form> --}}


                  <div class="card">
                    <div class="card-body">

                    <button type="button" class="btn btn-primary">Add Publication</button>

                      <!-- Table with hoverable rows -->
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            {{-- <th scope="col">Title</th> --}}
                            <th scope="col">Description</th>
                            {{-- <th scope="col">Attachment</th> --}}
                            {{-- <th scope="col">Date</th> --}}
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach($publications as $publication)
                          <tr>
                            <th scope="row">{{$publication->id}}</th>
                            {{-- <td>{{$notice->not_file}}</td> --}}
                            <td>{{$publication->description}}</td>
                            <td>
                                <a href="{{route('admin.publication.update',['id' => $publication->id])}}"><i class="bx bxs-edit">Update</i></a>
                                <a href="{{route('admin.publication.delete', ['id' => $publication->id])}}"><i class="bx bxs-trash">Delete</i> </a>
                            </td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                      <!-- End Table with hoverable rows -->

                    </div>
            </div>
                  <!-- End Academic & Research -->

                </div>




                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- ========Change Password Form ===========-->
                  <form method="POST" action="{{route('admin.password.store')}}">
                    @csrf
                       <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="currentPassword" type="password" class="form-control" id="currentPassword" @error('currentPassword') is-invalid @enderror autocomplete="off">
                        @error('currentPassword')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword" @error('newpassword') is-invalid @enderror autocomplete="off">
                        @error('newpassword')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword_confirmation" type="password" class="form-control" id="newPassword_confirmation" autocomplete="off">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

      <!-- end password -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

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

// Editor 2

    ClassicEditor
    .create( document.querySelector( '.editor2' ),{
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
