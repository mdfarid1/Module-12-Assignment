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
    <div class="col-md-12 row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Bass Name</th>
                    <th scope="col">Seat</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($haniftikit as $key=>$data )
                  <tr>
                    <td>{{ $data->bass_name }}</td>
                    <td>{{ $data->seat_numver }}</td>
                    <td><a href="{{ route("seat.delete",$data->id) }}"><button onclick="return confirm('Are you sure to delet this Bass')" class="btn btn-danger">Delete</button></a></td>
                </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Bass Name</th>
                    <th scope="col">Seat</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($enatikit as $key=>$data )
                  <tr>
                    <td>{{ $data->bass_name }}</td>
                    <td>{{ $data->seat_numver }}</td>
                    <td><a href="{{ route("seat.delete",$data->id) }}"><button onclick="return confirm('Are you sure to delet this Bass')" class="btn btn-danger">Delete</button></a></td>
                </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <div class="container mt-4">

        <form action="{{ route("seat.create") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <select class="form-select" name="name" aria-label="Default select example">
                    @foreach ($bus_name as $buss)
                    <option>{{ $buss->name }}</option>
                    @endforeach
                  </select>

              @error("name")
              <p class="text-danger">{{ $message }}</p>

              @enderror
            </div>

              <div class="mb-3">
                <div class="form-group">
                    <label for="numberInput">Seat Number</label>
                    <input type="number" class="form-control" id="numberInput" name="numberInput" placeholder="Enter a number" required>
                </div>
                @error("numberInput")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
