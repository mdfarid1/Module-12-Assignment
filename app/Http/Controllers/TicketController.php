<?php

namespace App\Http\Controllers;

use App\Models\Buss;
use App\Models\Tikit;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function seat(){
        $bus_name=Buss::all();
        $enatikit=Tikit::where('bass_name', 'like', '%ENA%')
        ->orderBy('seat_numver', 'asc')
        ->get();
        $haniftikit=Tikit::where('bass_name', 'like', '%Hanif%')
        ->orderBy('seat_numver', 'asc')
        ->get();
        return view("backend.pages.seat.create",compact('bus_name','haniftikit','enatikit'));
    }

    public function store(Request $request){
        $validator = [
            'name' => 'required',
            'numberInput' => 'required|max:10000000',
        ];
        // dd($request);
        $this->validate($request,$validator);
        $seat=new Tikit;
        $seat->bass_name = $request->name;
        $seat->seat_numver = $request->numberInput;
        $seat->save();

        return redirect("admin/seat/create")->with("success","Seat add successfully");

       }

       public function delete_data($id){
        $deleteseat = Tikit::find($id);
        $deleteseat->delete();
        return redirect()->back()->with("danger","Seat Delete successfully");

       }
}
