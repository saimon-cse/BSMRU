@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Education</h5>
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
                <a href="{{ route('addEducation') }}" class="btn btn-success"
                    style="width: 150px; margin-left:20px; margin-bottom:20px">Add Education
                </a>

                <br>

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Degree</th>
                            <th scope="col">University</th>
                            <th scope="col">Passing Year</th>
                            {{-- <th scope="col">To Date</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($educations as $education)
                            <tr>
                                <th scope="row">{{ $education->rank }}</th>
                                <td>{{ $education->degree }}</td>
                                <td>{{ $education->institution }}</td>
                                <td>{{ $education->passYear }}</td>
                                {{-- <td>{{$education->to_date}}</td> --}}


                                <td>
                                    <a class="btn btn-info" href="{{ route('EditEducation', ['id' => $education->id]) }}"><i
                                            class="bx bxs-edit"></i></a>
                                    <a  class="delete-link btn btn-danger" href="{{ route('DeleteEducation', ['id' => $education->id]) }}"><i
                                            class="bx bxs-trash"></i></a>
                                    <a class="btn btn-success" href="{{ route('admin.EducationRankup', ['id' => $education->id]) }}"><i
                                            class="bx bxs-upvote"></i></a>
                                    <a class="btn btn-primary" href="{{ route('admin.EducationRankDown', ['id' => $education->id]) }} "><i
                                            class="bx bxs-downvote"></i></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{-- pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $educations->links() !!}
                </div>
                <!-- End Table with hoverable rows -->

            </div>
        </div>
    </main>
@endsection
