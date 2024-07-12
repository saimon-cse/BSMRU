@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Experiences</h5>

                    <form action="{{route('EditedExperience',['id'=>$experience->id])}}" >
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="{{$experience->title}}">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Organization</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="org" value="{{$experience->organization}}">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">From date </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="from" value="{{$experience->from_date}}">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">To Date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="to" value="{{$experience->to_date}}">
                            </div>
                          </div>
{{--
                        <input type="text" name="org" value="{{$experience->organization}}">
                        <input type="text" name="from" value="{{$experience->from_date}}">
                        <input type="text" name="to" value="{{$experience->to_date}}"> --}}

                        <input type="submit" class="btn btn-primary" value="Submit">

                    </form>



            </div>
        </div>
    </main>
@endsection
