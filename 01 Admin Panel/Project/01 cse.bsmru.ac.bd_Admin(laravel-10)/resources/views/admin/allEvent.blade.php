@extends('admin.dashboard')
@section('admin')
<main id="main" class="main">
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Events</h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($events as $event)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$event->title}}</td>
                    <td>{{$event->description}}</td>
                    <td>{{$event->file}}</td>
                    <td>{{$event->date}}</td>
                    <td>
                        <a href="{{route('editEvent',['id' => $event->id])}}"><i class="bx bxs-edit">Update</i></a>
                        <a href="{{route('deleteEvent', ['id' => $event->id])}}"><i class="bx bxs-trash">Delete</i> </a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>

              <div class="d-flex justify-content-center">
              {{-- pagination  --}}
              {{$events->links()}} {{-- end  --}}
              </div>


              <!-- End Table with hoverable rows -->

            </div>
    </div>
</main>
@endsection
