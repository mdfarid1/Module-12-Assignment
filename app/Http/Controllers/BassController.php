<?php

namespace App\Http\Controllers;

use App\Models\Buss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BassController extends Controller
{
   public function bass(){
    $basslist=Buss::all();
    return view("backend.pages.bass.create",compact("basslist"));
   }



   public function store(Request $request){
    $validator = [
        'name' => 'required|max:15',
        'register' => 'required|min:8',
    ];
    $this->validate($request,$validator);
    $buss=new Buss;
    $buss->name = $request->name;
    $buss->register = $request->register;
    $buss->save();

    return redirect("admin/create")->with("success","Bass add successfully");

   }

   public function delete_data($id){

    $deletbuss = Buss::find($id);
    $deletbuss->delete();
    return redirect()->back()->with("danger","Bass Delete successfully");

   }
}
