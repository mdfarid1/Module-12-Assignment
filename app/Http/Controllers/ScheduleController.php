<?php

namespace App\Http\Controllers;

use App\Models\Buss;
use App\Models\Location;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function schedule(){
        $bus_name=Buss::all();
        $locations=Location::all();
        $schedule=Schedule::all();
        return view("backend.pages.schedule.create",compact('bus_name','locations','schedule'));
    }

    public function store(Request $request){
        $validator = [
            'name' => 'required',
            'location' => 'required',
            'dateInput' => 'required',
            'numberInput' => 'required|max:10000000',
        ];
        // dd($request);
        $this->validate($request,$validator);
        $schedule=new Schedule;
        $schedule->name = $request->name;
        $schedule->location = $request->location;
        $schedule->date = $request->dateInput;
        $schedule->fare = $request->numberInput;
        $schedule->save();

        return redirect("admin/schedule/create")->with("success","Schedule add successfully");

       }

       public function delete_data($id){

        $deleteschedule = Schedule::find($id);
        $deleteschedule->delete();
        return redirect()->back()->with("danger","Bass Delete successfully");

       }

}
