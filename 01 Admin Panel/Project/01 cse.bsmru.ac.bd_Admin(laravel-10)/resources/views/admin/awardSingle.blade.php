@extends('admin.dashboard')
@section('admin')
    <main id="main" class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Award</h5>

                    <form action="{{route('EditedAward',['id'=>$award->id])}}" >
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="type" value="{{$award->type}}">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="{{$award->title}}">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Country </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="country" value="{{$award->country}}">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" value="{{$award->description}}">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Year</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="year" value="{{$award->year}}">
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
