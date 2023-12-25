@extends("backend.layouts.admin")
@section("header","bass-create")
{{-- @section("head","Dashboard/Create") --}}
@section("content")



    <div class="container m-auto pt-3">
        @if (Session::has("success"))
        <p class="alert alert-success">{{ Session::get("success") }}</p>
    @endif
    @if (Session::has("danger"))
    <p class="alert alert-danger">{{ Session::get("danger") }}</p>
    @endif
    <div class="col-lg-3 mb-4 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Dashboard/Create</h4>
    </div>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Bass Name</th>
                <th scope="col">Registration</th>
                <th scope="col">Created AT</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($basslist as $key=>$data )
              <tr>
                <th scope="row">{{++$key }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->register }}</td>
                <td>{{ $data->created_at }}</td>
                <td><a href="{{ route("bass.delete",$data->id) }}"><button onclick="return confirm('Are you sure to delet this Bass')" class="btn btn-danger">Delete</button></a></td>
            </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <div class="container mt-4">

        <form action="{{ route("bass.create") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Bass Name</label>
              <input type="text" name="name" class="form-control">
              @error("name")
              <p class="text-danger">{{ $message }}</p>

              @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">Register Number</label>
                <input type="number" name="register" class="form-control">
                @error("register")
                    <p class="text-danger">{{ $message }}</p>
                @enderror

              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
