@extends('admin.dashboard')
@section('admin')
<main id="main" class="main">
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Education</h5>

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
                    @php
                        $i=1;
                    @endphp
                    @foreach($educations as $education)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$education->degree}}</td>
                    <td>{{$education->institution}}</td>
                    <td>{{$education->passYear}}</td>
                    {{-- <td>{{$education->to_date}}</td> --}}


                        <td>
                        <a href="{{ route('EditEducation', ['id' => $education->id]) }}"><i class="bx bxs-edit">Update</i></a>
                        <a href="{{ route('DeleteEducation', ['id' => $education->id]) }}"><i class="bx bxs-trash">Delete</i></a>
                        </td>
                  </tr>

                  @endforeach

                </tbody>
              </table>

              {{-- pagination --}}
               <div class="d-flex justify-content-center">
                {{-- {!! $notices->links() !!} --}}
            </div>
              <!-- End Table with hoverable rows -->

            </div>
    </div>
</main>
@endsection
