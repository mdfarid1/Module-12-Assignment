<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Buss;
use App\Models\Schedule;
use App\Models\Tikit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function welcome(){
        $bus_name=Buss::all();
        $tikit=Tikit::all();
        $schedule=Schedule::all();
        $welcome=book::all();
        return view("welcome",compact('bus_name','tikit','schedule','welcome'));
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
        if($request==$validator){
            return redirect("/login");
        };
        $book=new book();
        $book->destination = $request->name;
        $book->buss = $request->buss;
        $book->seat = $request->numberInput;
        $book->amount = $request->amount;
        $book->save();

        return redirect("admin/booking/create")->with("success","Seat add successfully");

       }

    public function dashboard(){
        return view("backend.pages.dashboard");
    }
    public function login(){
        return view("backend.pages.login");
    }
    public function index(Request $request){
        //
        $email=$request->email;
        $pass=$request->password;
        if ($email=="mfaridhossain24@gmail.com" && $pass=="123456" ) {
            return view("backend.pages.dashboard");
        }else{
            return redirect()->back();
        }
    }

}
