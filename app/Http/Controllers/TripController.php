<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function trip(){
        $location=Location::all();
        return view("backend.pages.trip.create",compact("location"));
    }

    public function delete_data($id){
        $location=Location::find($id);
        $location->delete();
        return redirect()->back()->with("danger","Trip Delete successfully");
    }
    public function store(Request $request){
        $validator = [
            'name' => 'required|max:25',
        ];
        $this->validate($request,$validator);
        $buss=new Location;
        $buss->name = $request->name;
        $buss->save();

        return redirect()->back()->with("success","Bass add successfully");

       }
}
