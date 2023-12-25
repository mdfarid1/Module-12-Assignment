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

        <div class="container mt-3">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Destination</th>
                    <th scope="col">Buss</th>
                    <th scope="col">Seat</th>
                    <th scope="col">Ticket Amount</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($book as $key=>$data )
                  <tr>
                    <td>{{ $data->destination }}</td>
                    <td>{{ $data->buss }}</td>
                    <td>{{ $data->seat }}</td>
                    <td>{{ $data->amount }}</td>
                    <td><a href="{{ route("booking.delete",$data->id) }}"><button onclick="return confirm('Are you sure to delet this Bass')" class="btn btn-danger">Delete</button></a></td>
                </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <div class="container mt-4">

        <form action="{{ route("booking.create") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="numberInput">Select Location</label>
                <select class="form-select" name="name" aria-label="Default select example">
                    @foreach ($schedule as $location)
                    <option>{{ $location->location }}</option>
                    @endforeach
                  </select>
              @error("name")
              <p class="text-danger">{{ $message }}</p>

              @enderror
            </div>
            <div class="mb-3">
                <label for="numberInput">Select Buss</label>
                <select class="form-select" name="buss" aria-label="Default select example">
                    @foreach ($bus_name as $data)
                    <option>{{ $data->name }}</option>
                    @endforeach
                  </select>
              @error("name")
              <p class="text-danger">{{ $message }}</p>

              @enderror
            </div>
            <div class="mb-3">
                <label for="numberInput">Select Seat</label>
                <select class="form-select" name="numberInput" aria-label="Default select example">
                    @foreach ($tikit as $tikit)
                    <option>{{ $tikit->seat_numver }}</option>
                    @endforeach
                  </select>

              @error("numberInput")
              <p class="text-danger">{{ $message }}</p>

              @enderror
            </div>
            <div class="mb-3">
                <label for="numberInput">Select Amount</label>
                <select class="form-select" name="amount" aria-label="Default select example">
                    @foreach ($schedule as $schedule)
                    <option>{{ $schedule->fare }}</option>
                    @endforeach
                  </select>

              @error("amount")
              <p class="text-danger">{{ $message }}</p>

              @enderror
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
