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
                <th scope="col">Trip</th>
                <th scope="col">Date</th>
                <th scope="col">Fare</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($schedule as $key=>$data )
              <tr>
                <th scope="row">{{++$key }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->location }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->fare }}</td>

                <td><a href="{{ route("schedule.delete",$data->id) }}"><button onclick="return confirm('Are you sure to delet this Bass')" class="btn btn-danger">Delete</button></a></td>
            </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <div class="container mt-4">

        <form action="{{ route("schedule.create") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="exampleDataList" class="form-label">Buss name</label>
                <input class="form-control" name="name" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                <datalist id="datalistOptions">
                    @foreach ($bus_name as $buss)
                    <option>{{ $buss->name }}</option>
                    @endforeach
                </datalist>
              @error("name")
              <p class="text-danger">{{ $message }}</p>

              @enderror
            </div>
            <div class="mb-3">
                <label for="exampleDataList" class="form-label">Location Name</label>
                <input class="form-control" name="location" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                <datalist id="datalistOptions">
                    @foreach ($locations as $location)
                         <option>{{ $location->name }}</option>
                     @endforeach
                </datalist>
              @error("location")
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-3 form-group">
                <label for="dateInput">Select a Date:</label>
               <input type="date" id="dateInput" name="dateInput" required>
                @error("dateInput")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <div class="form-group">
                    <label for="numberInput">Number Input:</label>
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
