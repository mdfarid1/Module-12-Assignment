@extends("backend.layouts.admin")
@section("header","trip-create")
@section("content")
    <div class="container mt-4">
        @if (Session::has("success"))
        <p class="alert alert-success">{{ Session::get("success") }}</p>
    @endif
    @if (Session::has("danger"))
    <p class="alert alert-danger">{{ Session::get("danger") }}</p>
    @endif
    <div class="col-lg-3 mb-4 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Dashboard/Create</h4>
    </div>
        <form action="{{ route("trip.create") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Location</label>
              <input type="text" name="name" class="form-control">
              @error("name")
              <p class="text-danger">{{ $message }}</p>
              @enderror

            </div>
            <button type="submit" class="btn btn-primary">Add Trip</button>
          </form>
    </div>
    <div class="container mt-3">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Location</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($location as $key=>$data )
              <tr>
                <th scope="row">{{++$key }}</th>
                <td>{{ $data->name }}</td>

                <td><a href="{{ route("trip.delete",$data->id) }}"><button onclick="return confirm('Are you sure to delet this Bass')" class="btn btn-danger">Delete</button></a></td>
            </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
