@extends('admin.dashboard')
@section('admin')
<main id="main" class="main">
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Awards</h5>
              <a href="{{ route('addAward') }}" class="btn btn-success"
              style="width: 150px; margin-left:20px; margin-bottom:20px">Add Award
              </a>

              <br>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Award Type</th>
                    <th scope="col">Title</th>
                    <th scope="col">Year</th>
                    <th scope="col">Country</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($awards as $award)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$award->type}}</td>
                    <td>{{$award->title}}</td>
                    <td>{{$award->year}}</td>
                    <td>{{$award->country}}</td>
                    <td>{{$award->description}}</td>
                    {{-- <td>{{$education->to_date}}</td> --}}


                        <td>
                        <a href="{{ route('EditAward', ['id' => $award->id]) }}"><i class="bx bxs-edit">Update</i></a>
                        <a href="{{ route('DeleteAward', ['id' => $award->id]) }}"><i class="bx bxs-trash">Delete</i></a>

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
