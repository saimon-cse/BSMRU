@section('title', 'Administration')

@extends('admin.dashboard')
@section('admin')

   <style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 40px; /* Adjusted width */
        height: 24px; /* Adjusted height */
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 12px; /* Rounded corners */
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px; /* Adjusted height */
        width: 20px; /* Adjusted width */
        left: 2px; /* Adjusted position */
        bottom: 2px; /* Adjusted position */
        background-color: white;
        transition: .4s;
        border-radius: 50%; /* Make knob circular */
    }

    input:checked + .slider {
        background-color: #f5ca0a;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #ffffff;
    }

    input:checked + .slider:before {
        transform: translateX(16px); /* Adjusted for smaller switch */
    }

    /* Button Styles */

</style>




    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Administration</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    {{-- <li class="breadcrumb-item active">Users</li> --}}
                    <li class="breadcrumb-item active">Administration</li>
                </ol>
            </nav>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                Create New User
            </button>
            <br><br>
            <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            {{-- <div class="card"> --}}
                            {{-- <div class="card-body"> --}}
                            {{-- <h5 class="card-title">No Labels / Placeholders as labels Form</h5> --}}

                            <!-- No Labels Form -->
                            <form class="row g-3" method="POST" action="{{ route('RegisterUser') }}">
                                @csrf
                                <div class="col-md-12">
                                    <input type="text" required class="form-control" name="name"
                                        placeholder="User Full Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" required class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <input type="password" required class="form-control" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="col-12">
                                    <input type="text" required class="form-control" name="UserID"
                                        placeholder="Service ID">
                                </div>
                                {{-- <div class="col-md-6">
                                  <input type="text" class="form-control" placeholder="City">
                                </div> --}}
                                <div class="row mb-3" style="padding-top: 10px">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Type:</label>

                                    <div class="col-md-8">
                                        <select id="inputState" name="type" class="form-select">
                                            {{-- <option selected="" disabled>Type..</option> --}}
                                            <option value="Teacher">Teacher</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-3" style="padding-top: 10px">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Role:</label>

                                    <div class="col-md-8">
                                        <select id="inputState" name="role" class="form-select">
                                            {{-- <option selected="" disabled>Type..</option> --}}
                                            <option value="General">General</option>
                                            <option value="Admin Staff">Admin Staff</option>
                                        </select>
                                    </div>
                                </div>



                                {{-- <div class="col-md-2">
                                  <input type="text" class="form-control" placeholder="Zip">
                                </div> --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End No Labels Form -->

                            {{-- </div>
                          </div> --}}
                        </div>
                        {{-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div> --}}
                    </div>
                </div><!-- End Vertically centered Modal-->
            </div><!-- End Page Title -->
            <div class="card">

                <div class="card-body">
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
                    <h5 class="card-title">Teachers Table</h5>
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Service ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Up - Down</th>
                                <th> Leave - Visible</th>
                                {{-- <th scope="col">Leave</th> --}}
                                {{-- <th scope="col">Visible</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teacher as $user)
                                <tr>
                                    <th scope="row">{{ $user->rank ?? 'NULL' }}</th>
                                    <td>{{ $user->user_id ?? 'NULL' }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->controller_role ?? 'NULL' }}</td>

                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('admin.teacherRankUp', ['id' => $user->id]) }}"><i
                                                class="bx bxs-upvote"></i></a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.teacherRankDown', ['id' => $user->id]) }}"><i
                                                class="bx bxs-downvote"></i></a>
                                    </td>

                                    <!-- Toggle Status -->
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="status-toggle" data-id="{{ $user->id }}"
                                                {{ $user->status == 'inactive' ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                        {{-- </td>

                                <!-- Visible Toggle -->
                                <td> --}}
                                        <label class="switch">
                                            <input type="checkbox" class="visible-toggle" data-id="{{ $user->id }}"
                                                {{ $user->visible ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- =================    Stuff          =============== --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Staff Table</h5>
                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Service ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Up - Down</th>
                                <th> Leave - Visible</th>
                                {{-- <th scope="col">Leave</th> --}}
                                {{-- <th scope="col">Visible</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff as $user)
                                <tr>
                                    <th scope="row">{{ $user->rank ?? 'NULL' }}</th>
                                    <td>{{ $user->user_id ?? 'NULL' }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->controller_role ?? 'NULL' }}</td>

                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('admin.StaffRankUp', ['id' => $user->id]) }}"><i
                                                class="bx bxs-upvote"></i></a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.StaffRankDown', ['id' => $user->id]) }}"><i
                                                class="bx bxs-downvote"></i></a>
                                    </td>

                                    <!-- Toggle Status -->
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="status-toggle" data-id="{{ $user->id }}"
                                                {{ $user->status == 'inactive' ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                        {{-- </td>

                                <!-- Visible Toggle -->
                                <td> --}}
                                        <label class="switch">
                                            <input type="checkbox" class="visible-toggle" data-id="{{ $user->id }}"
                                                {{ $user->visible ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Status Toggle
            $('.status-toggle').change(function() {
                var status = $(this).prop('checked') ? 'inactive' : 'active';
                var userId = $(this).data('id');

                $.ajax({
                    url: '{{ route('admin.activeStatus') }}',
                    method: 'GET',
                    data: {
                        status: status,
                        id: userId
                    },
                    success: function(response) {
                        console.log('Success:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            });

            // Visible Toggle
            $('.visible-toggle').change(function() {
                var visible = $(this).prop('checked') ? 1 : 0; // Send 1 if checked, 0 if unchecked
                var userId = $(this).data('id');

                $.ajax({
                    url: '{{ route('admin.changeVisible') }}', // This will be a new route for handling visible status
                    method: 'GET',
                    data: {
                        visible: visible,
                        id: userId
                    },
                    success: function(response) {
                        console.log('Success:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            });

        });
    </script>


@endsection
