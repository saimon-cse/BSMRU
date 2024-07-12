@extends('admin.dashboard')
@section('admin')
<main id="main" class="main">
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Experiences</h5>

              <a href="{{ route('addExperience') }}" class="btn btn-success"
              style="width: 150px; margin-left:20px; margin-bottom:20px">Add Experience
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
                    @php
                        $i=1;
                    @endphp
                    @foreach($experiencess as $experience)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$experience->title}}</td>
                    <td>{{$experience->organization}}</td>
                    <td>{{$experience->from_date}}</td>
                    <td>{{$experience->to_date}}</td>


                    <td>
                        <a href="{{ route('EditExperience', ['id' => $experience->id]) }}"><i class="bx bxs-edit">Update</i></a>
                        <a href="{{ route('DeleteExperience', ['id' => $experience->id]) }}"><i class="bx bxs-trash">Delete</i></a>
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
