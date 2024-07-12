@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users Table</h5>
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
                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Name</th>
                            {{-- <th scope="col">Email</th> --}}
                            <th scope="col">Type</th>
                            <th scope="col">Role</th>
                            {{-- <th scope="col">Status</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">
                                    @if ($user->rank )
                                    {{ $user->rank}}
                                    @else
                                        NULL
                                    @endif
                                </th>
                                <td>
                                    @if ($user->user_id )
                                    {{ $user->user_id}}
                                    @else
                                        NULL
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                {{-- <td>{{ $user->email }}</td> --}}
                                <td>
                                    @if ($user->type)
                                        {{ $user->type }}
                                    @else
                                        NULL
                                    @endif
                                </td>
                                <td>
                                    @if ($user->controller_role)
                                        {{ $user->controller_role }}
                                    @else
                                        NULL
                                    @endif
                                </td>

                                {{-- <td>
                                    @if ($user->role == 'admin')
                                        Active
                                    @else
                                        Disable
                                    @endif

                                </td> --}}

                                <td>
                                    {{-- <a href="{{ route('admin.ControlUserEdit', ['id' => $user->id]) }}"><i class="bx bxs-edit">Update</i></a>
                                    <a href="{{ route('admin.ControlUserDelete', ['id' => $user->id]) }}"><i class="bx bxs-trash">Delete</i></a> --}}
                                    <a class="btn btn-success" href="{{ route('admin.ControlUserRankUp', ['id' => $user->id]) }}"><i class="bx bxs-upvote"></i></a>
                                    <a class="btn btn-primary" href="{{ route('admin.ControlUserRankDown', ['id' => $user->id]) }}"><i class="bx bxs-downvote"></i></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{-- pagination --}}
                {{-- <div class="d-flex justify-content-center">
                    {!! $notices->links() !!}
                </div> --}}
                <!-- End Table with hoverable rows -->

            </div>
        </div>
    </main>
@endsection
