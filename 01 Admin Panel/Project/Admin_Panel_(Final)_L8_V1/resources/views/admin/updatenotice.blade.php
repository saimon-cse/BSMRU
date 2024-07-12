@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">All Notices</h5>
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
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Notice Type</th>
                            <th scope="col">Date</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($notices as $notice)
                            <tr>
                                {{-- cse.bsmru.ac.bd/assets/   notice/notic.pdf--}}
                                <th scope="row">{{ $notice->rank }}</th>
                                <td>{{ $notice->not_title }}</td>
                                <td>{{ $notice->not_type }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $notice->not_date)->format('j M Y') }}</td>
                                <td><a href="{{ $dept->dept_url.'/assets/Files/'.$notice->not_file }}"><strong>[view]</strong></a> </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.editnotice', ['id' => $notice->id]) }}"><i
                                            class="bx bxs-edit"></i></a>
                                    <a class="btn btn-success"
                                        href="{{ route('admin.noticeRankup', ['id' => $notice->id]) }}"><i
                                            class="bx bxs-upvote"></i></a>
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.noticeRankDown', ['id' => $notice->id]) }}"><i
                                            class="bx bxs-downvote"></i></a>
                                    <a class="delete-link btn btn-danger"
                                        href="{{ route('admin.noticedelete', ['id' => $notice->id]) }}"><i
                                            class="bx bxs-trash"></i></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{-- pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $notices->links() !!}
                </div>
                <!-- End Table with hoverable rows -->

            </div>
        </div>
    </main>
@endsection
