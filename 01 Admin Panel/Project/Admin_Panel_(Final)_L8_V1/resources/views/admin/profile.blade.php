@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

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
        <section class="section profile">

            <div class="row">
                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>

                                {{-- <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-settings">Research Profile</button>
                                </li> --}}

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>
                            @php
                                $str = $profileData->researchInt;
                            @endphp
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    {{-- <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center"> --}}

                                    {{-- <div class="d-flex flex-column align-items-center"> --}}
                                    <img src="{{$dept->dept_url.'/assets/img/peoples/' . $profileData->photo }}" alt="Profile"
                                        style="height: 250px; margin-left:15%" class="rounded">
                                    <br>
                                    {{-- </div> --}}
                                    {{-- <h2>{{ $profileData->name }}</h2>
                                                <h3>{{ $profileData->designation }}</h3>
                                                <h3>{{ $profileData->dept }}</h3>
                                                <div class="social-links mt-2">
                                                    <!-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a> -->
                                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-xl-12">
                                        {{-- <h5 class="card-title">Research Interest</h5>
                                        <p class="small fst-italic">@php
                                            echo $str;
                                        @endphp</p> --}}

                                        <h5 class="card-title">Profile Details</h5>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                            <div class="col-lg-9 col-md-8">{{ $profileData->name }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">User ID</div>
                                            <div class="col-lg-9 col-md-8">{{ $profileData->user_id }}</div>
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Inistitution</div>
                                            <div class="col-lg-9 col-md-8">{{ $profileData->institute }}</div>
                                        </div> --}}

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Designation</div>
                                            <div class="col-lg-9 col-md-8">{{ $profileData->designation }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Special Designation</div>
                                            <div class="col-lg-9 col-md-8">{{ $profileData->special_desig }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Department</div>
                                            <div class="col-lg-9 col-md-8">{{ $profileData->dept }}</div>
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Country</div>
                                            <div class="col-lg-9 col-md-8">{{ $profileData->country }}</div>
                                        </div> --}}


                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                            <div class="col-lg-9 col-md-8">{{ $profileData->phone }}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Display Email</div>
                                            <div class="col-lg-9 col-md-8">{{ $profileData->display_email }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form method="POST" action="{{ route('admin.profile.store') }}"
                                        enctype="multipart/form-data" onsubmit="sanitizeInputs()">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img id="imagePreview"
                                                    src="{{ $dept->dept_url.'/assets/img/peoples/' . $profileData->photo  }}"
                                                    alt="Profile" style="width: 150px; height: 150px;">
                                                <div class="pt-2">
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="file" id="formFile" accept=".jpg, .png,.jpeg"
                                                            name="photo" onchange="previewImage();">
                                                    </div>
                                                    <!-- Optional link to remove the image can be uncommented if needed
                                                                                                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                                                                        -->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control"
                                                    id="fullName" value="{{ $profileData->name }}">
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

                                        {{-- <div class="row mb-3">
                                            <label for="Research Interest"
                                                class="col-md-4 col-lg-3 col-form-label">Research
                                                Interest</label>
                                            <div class="col-md-8 col-lg-9">
                                                <!-- Quill Editor Default -->
                                                <div class="form-group mb-4">
                                                    <div class="col-sm-12">
                                                        <textarea name="message" class="form-control editor" id="" cols="30" rows="10">{{ $profileData->researchInt }}</textarea>
                                                    </div>
                                                </div>
                                                <!-- End Quill Editor Default -->

                                            </div>
                                        </div> --}}


                                        <div class="row mb-3">
                                            <label for="Job"
                                                class="col-md-4 col-lg-3 col-form-label">Designation</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="designation" type="text" class="form-control"
                                                    id="Job" value="{{ $profileData->designation }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Special
                                                Designation</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="special_desig" type="text" class="form-control"
                                                    id="Job" value="{{ $profileData->special_desig }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job"
                                                class="col-md-4 col-lg-3 col-form-label">Department</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="dept" type="text" class="form-control" id="Job"
                                                    value="{{ $profileData->dept }}">
                                            </div>
                                        </div>

                                        {{-- <div class="row mb-3">
                                            <label for="company"
                                                class="col-md-4 col-lg-3 col-form-label">Institute</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="institute" type="text" class="form-control"
                                                    id="company" value="{{ $profileData->institute }}">
                                            </div>
                                        </div> --}}



                                        {{-- <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control" id="Country"
                                                    value="{{ $profileData->country }}">
                                            </div>
                                        </div> --}}



                                        <!-- <div class="row mb-3">
                                                <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                                <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                                                </div>
                                            </div> -->


                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="{{ $profileData->phone }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Display
                                                Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="{{ $profileData->display_email }}">
                                            </div>
                                        </div>



                                        {{-- <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control"
                                                    id="Linkedin" value="https://linkedin.com/#">
                                            </div>
                                        </div> --}}

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!--======== Academic & Research====== -->

                                    {{-- <h5 class="card-title">Research Interest</h5>
                                    <p class="small fst-italic" style="margin-top: -10px">@php echo $str; @endphp</p> --}}

                                    {{-- <div class="row">
                                            <div class="col-lg-3 col-md-4 label" style="color:#012970"><strong>Research Interest</strong></div>
                                            <div class="col-lg-9 col-md-8">@php  echo $str; @endphp</div>
                                        </div> --}}

                                    {{-- @if ($researchProfile)

                                    <h5 class="card-title">Research Profile:</h5>
                                    @endif --}}

                                    {{-- <div class="row">
                                        @if (!$researchProfile)
                                            <div class="col-lg-9 col-md-8">NULL</div>
                                        @else
                                            @foreach ($researchProfile as $research)
                                                @php
                                                    $str = $research->title;
                                                @endphp
                                                <div class="col-lg-9 col-md-8">@php  echo $str; @endphp</div>
                                            @endforeach
                                        @endif
                                    </div> --}}
                                    {{-- <a href="{{ route('AddResearchProfile') }}" class="btn btn-success"
                                        style="width: 190px;  margin-bottom:20px">Add Research profile
                                    </a> --}}

                                    {{-- <div class="card-body">

                                        <!-- Table with hoverable rows -->
                                        <table class="table table-hover">

                                            <tbody>
                                                @php
                                                    $sl = 1;
                                                @endphp
                                                @foreach ($researchProfile as $research)
                                                    <tr>
                                                        @php
                                                            $str = $research->title;
                                                        @endphp

                                                        <th scope="row">
                                                            @php
                                                                echo $sl;
                                                                $sl++;
                                                            @endphp
                                                        </th>
                                                        <td>
                                                            @php
                                                                echo $str;
                                                            @endphp
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>


                                    </div>
                                    <!-- End Academic & Research --> --}}

                                </div>




                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- ========Change Password Form ===========-->
                                    <form method="POST" action="{{ route('admin.password.store') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label class="col-md-4 col-lg-3 col-form-label" for="email">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="text" class="form-control"
                                                    value="{{ $profileData->email }}" disabled="" id="email">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="currentPassword" type="password" class="form-control"
                                                    id="currentPassword" @error('currentPassword') is-invalid @enderror
                                                    autocomplete="off">
                                                @error('currentPassword')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword" @error('newpassword') is-invalid @enderror
                                                    autocomplete="off">
                                                @error('newpassword')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword_confirmation" type="password"
                                                    class="form-control" id="newPassword_confirmation"
                                                    autocomplete="off">
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
    {{-- ==== Preview image to upload --}}
    <script>
        function previewImage() {
            var file = document.getElementById("formFile").files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                document.getElementById("imagePreview").src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                document.getElementById("imagePreview").src = "{{ url('upload/no_image.png') }}";
            }
        }
    </script>
    {{-- end preview --}}



    <!-- ckeditor5 JS -->

@endsection
