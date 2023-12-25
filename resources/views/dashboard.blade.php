<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                              @foreach ($book as $booking )
                              <tr>
                                <td>{{ $booking->destination }}</td>
                                <td>{{ $booking->buss }}</td>
                                <td>{{ $booking->seat }}</td>
                                <td>{{ $booking->amount }}</td>
                                <td><a href="{{ route("booking.delete",$booking
                                ->id) }}"><button onclick="return confirm('Are you sure to delet this Bass')" class="btn btn-danger">Delete</button></a></td>
                            </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
