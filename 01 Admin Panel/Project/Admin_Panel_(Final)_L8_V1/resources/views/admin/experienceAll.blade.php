@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Experiences</h5>
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

                <a href="{{ route('addExperience') }}" class="btn btn-success"
                    style="width: 210px; margin-left:20px; margin-bottom:20px">Add general Experience
                </a>
                <a href="{{ route('addOtherExperience') }}" class="btn btn-success"
                    style="width: 240px;margin-left:20px; margin-bottom:20px">Add Professional Experience
                </a>

                <br>

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Organization</th>
                            <th scope="col">From Date</th>
                            <th scope="col">To Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($experiences as $experience)
                            <tr>
                                <th scope="row">{{ $experience->rank }}</th>
                                <td>{{ $experience->title }}</td>
                                <td>{{ $experience->organization }}</td>
                                <td>{{ $experience->from_date }}</td>
                                <td>{{ $experience->to_date }}</td>


                                <td>
                                    <a class="btn btn-info"
                                        href="{{ route('EditExperience', ['id' => $experience->id]) }}"><i
                                            class="bx bxs-edit"></i></a>
                                    <a class="btn btn-success"
                                        href="{{ route('ExperienceRankup', ['id' => $experience->id]) }}"><i
                                            class="bx bxs-upvote"></i></a>
                                    <a class="btn btn-primary"
                                        href="{{ route('ExperienceRankDown', ['id' => $experience->id]) }}"><i
                                            class="bx bxs-downvote"></i></a>
                                    <a class="delete-link btn btn-danger"
                                        href="{{ route('DeleteExperience', ['id' => $experience->id]) }}"><i
                                            class="bx bxs-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {!! $experiences->links() !!}
                </div>

                <br>

                @if ($otherExperiences)
                    {{-- ============ Other Experience ============ --}}
                    <br><br>
                    <h5 class="card-title">Professional Experiences</h5>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                {{-- <th scope="col">Organization</th>
                            <th scope="col">From Date</th>
                            <th scope="col">To Date</th> --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($otherExperiences as $experience)
                                <tr>
                                    @php
                                        $data = $experience->experience;
                                    @endphp
                                    <th scope="row">{{ $experience->rank }}</th>
                                    <td>
                                        @php
                                            echo $data;
                                        @endphp
                                    </td>
                                    {{-- <td>{{ $experience->organization }}</td>
                                <td>{{ $experience->from_date }}</td>
                                <td>{{ $experience->to_date }}</td> --}}


                                    <td>
                                        <a class="btn btn-info"
                                            href="{{ route('singleOtherExperience', ['id' => $experience->id]) }}"><i
                                                class="bx bxs-edit"></i></a>
                                        <a class="btn btn-success"
                                            href="{{ route('OtherExperienceRankup', ['id' => $experience->id]) }}"><i
                                                class="bx bxs-upvote"></i></a>
                                        <a class="btn btn-primary"
                                            href="{{ route('OtherExperienceRankDown', ['id' => $experience->id]) }}"><i
                                                class="bx bxs-downvote"></i></a>
                                        <a class="delete-link btn btn-danger"
                                            href="{{ route('OtherExperiencedelete', ['id' => $experience->id]) }}"><i
                                                class="bx bxs-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                @endif
                {{-- pagination --}}
                <div class="d-flex justify-content-center">
                {!! $otherExperiences->links() !!}
            </div>
                <!-- End Table with hoverable rows -->

            </div>
        </div>
    </main>
@endsection
