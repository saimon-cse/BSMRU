@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card" style="padding: 15px">
                <h5 class="card-title">All Publication</h5>
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
                <br>
                <div class="d-inline-flex">
                    <a href="{{ route('admin.newPublication') }}" class="btn btn-success"
                        style="width: 170px; margin-left:20px">Add Publications
                    </a>


                </div>

                @foreach ($types as $type)
                    @php
                        $flag = 0;
                    @endphp
                    @foreach ($publications as $publication)
                        @if ($publication->type == $type->title)
                            @php
                                $flag = 1;
                            @endphp
                        @endif
                    @endforeach
                    @if ($flag == 0)
                        @continue;
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $type->title }}</h5>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sl = 1; @endphp

                                @foreach ($publications as $publication)
                                    {{-- {{$publication->type}} <br> --}}
                                    @if ($publication->type == $type->title)
                                        <tr>
                                            @php $print = $publication->description; @endphp
                                            <th scope="row"> {{$publication->rank}} </th>
                                            <td>
                                                @php  echo $print;  @endphp
                                            </td>
                                            <td>
                                                <a class="btn btn-info"
                                                    href="{{ route('admin.publication.edit', ['id' => $publication->id]) }}"><i
                                                        class="bx bxs-edit"></i></a>
                                                <a class="btn btn-success"
                                                    href="{{ route('admin.PublicationRankup', ['id' => $publication->id]) }}"><i
                                                        class="bx bxs-upvote"></i></a>
                                                <a class="btn btn-primary   "
                                                    href="{{ route('admin.PublicationRankDown', ['id' => $publication->id]) }}"><i
                                                        class="bx bxs-downvote"></i></a>
                                                <a class="delete-link btn btn-danger"
                                                    href="{{ route('admin.publication.delete', ['id' => $publication->id]) }}"><i
                                                        class="bx bxs-trash"></i> </a>
                                                {{-- route('admin.noticeRankup', ['id' => $notice->id]) --}}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $publications->links() }}
                        </div>
                        <!-- End Table with hoverable rows -->

                    </div>
                @endforeach




                {{-- end journel --}}

                {{-- === Conference=== --}}
                {{-- <div class="card-body">
                    <h5 class="card-title">Conference Proceedings</h5>

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($conferences as $publication)
                                <tr>
                                    @php
                                        $str = $publication->description;

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
                                    <td>
                                        <a href="{{ route('admin.publication.edit', ['id' => $publication->id]) }}"><i
                                                class="bx bxs-edit">Update</i></a>
                                        <a href="{{ route('admin.publication.delete', ['id' => $publication->id]) }}"><i
                                                class="bx bxs-trash">Delete</i> </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $publications->links() }}
                    </div>
                    <!-- End Table with hoverable rows -->

                </div> --}}
            </div>
        </div>
    </main>
@endsection
