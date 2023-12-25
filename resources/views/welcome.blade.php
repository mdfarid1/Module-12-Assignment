<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Bus Ticket Booking Form</title>
</head>
<body>
<div class="m-5">
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endauth
    </div>
@endif
</div>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Bus Ticket Booking</h2>
                        <form action="{{ route("booking.create") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="source">Destination Location:</label>
                                <select class="form-control" id="source" name="name" required>
                                    @foreach ($schedule as $location)
                                    <option>{{ $location->location }}</option>
                                    @endforeach
                                </select>
                                @error("name")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="destination">Select Buss:</label>
                                <select class="form-control" id="destination" name="buss" required>
                                    @foreach ($bus_name as $data)
                                    <option>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error("buss")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="destination">Select Seat:</label>
                                <select class="form-control" id="destination" name="numberInput" required>
                                    @foreach ($tikit as $tikit)
                                    <option>{{ $tikit->seat_numver }}</option>
                                    @endforeach
                                </select>
                                @error("numberInput")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="destination">Select Seat:</label>
                                <select class="form-control" id="destination" name="amount" required>
                                    @foreach ($schedule as $schedule)
                                    <option>{{ $schedule->fare }}</option>
                                    @endforeach
                                </select>
                                @error("amount")
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">Book Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>






