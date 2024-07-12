@extends('admin.dashboard')
@section('admin')
<main id="main" class="main">
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Notices</h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Attachment</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($notices as $notice)
                  <tr>
                    <th scope="row">{{$notice->id}}</th>
                    <td>{{$notice->not_title}}</td>
                    <td>{{$notice->not_des}}</td>
                    <td>{{$notice->not_file}}</td>
                    <td>{{$notice->not_date}}</td>
                    <td>
                        <a href="{{route('admin.editnotice',['id' => $notice->id])}}"><i class="bx bxs-edit">Update</i></a>
                        <a href="{{route('admin.noticedelete', ['id' => $notice->id])}}"><i class="bx bxs-trash">Delete</i> </a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
    </div>
</main>
@endsection
