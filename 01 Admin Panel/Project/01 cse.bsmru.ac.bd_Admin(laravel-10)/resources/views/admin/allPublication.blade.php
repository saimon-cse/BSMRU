@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card" style="padding: 15px">
                <h5 class="card-title">All Publication</h5>
                <br>
                <div class="d-inline-flex">
                    <a href="{{ route('admin.newPublication') }}" class="btn btn-success"
                    style="width: 130px; margin-left:20px">Add Article
                    </a>


                </div>


                <div class="card-body">
                    <h5 class="card-title">Journal Article</h5>

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
                            @php
                                $sl = 1;
                            @endphp
                            @foreach ($publications as $publication)
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

                </div>
                {{-- end journel --}}

                {{--=== Conference=== --}}
                <div class="card-body">
                    <h5 class="card-title">Conference Proceedings</h5>

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

                </div>
            </div>
        </div>
    </main>
@endsection
