<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Buss;
use App\Models\Location;
use App\Models\Schedule;
use App\Models\Tikit;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function booking(){
        $bus_name=Buss::all();
        $tikit=Tikit::all();
        $schedule=Schedule::all();
        $book=book::all();
        return view("backend.pages.booking.booking",compact('bus_name','tikit','schedule','book'));
    }

    public function store(Request $request){
        $validator = [
            'name' => 'required',
            'buss' => 'required',
            'numberInput' => 'required|max:10000000',
            'amount' => 'required',

        ];
        // dd($request);
        $this->validate($request,$validator);
        $book=new book();
        $book->destination = $request->name;
        $book->buss = $request->buss;
        $book->seat = $request->numberInput;
        $book->amount = $request->amount;
        $book->save();

        return redirect("admin/booking/create")->with("success","Seat add successfully");

       }

       public function delete_data($id){
        $deleteseat = book::find($id);
        $deleteseat->delete();
        return redirect()->back()->with("danger","Booking Delete successfully");

       }
}
