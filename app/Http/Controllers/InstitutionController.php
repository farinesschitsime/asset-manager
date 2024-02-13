<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\Models\Institution;
use  \App\Models\User;

class InstitutionController extends Controller
{
    public function index(){
        $data = Institution::all();

        return view('institutions.index')->with([
            'institutions'=>$data
        ]);
    }

    public function show(Institution $institution){
        return view('institutions.show')->with([
            'institution'=>$institution
        ]);
    }

    public function create(){
        return view('institutions.create');
    }

    public function store(Request $request){
        $rules = [
            'name'=>"required",
            'email'=>"required|email",
            'phone'=>"required|numeric",
            'description'=>"required",
            'address'=>"required",
            'location'=>"required"
        ];

        $this->validate($request,$rules);

        // retrieve data from the request
        $data = $request->all();

        // create an institution record in the DB
        Institution::create($data);

        // push a message of notification
        session()->flash('success-status',"Created an institution");

        // return back to the page
        return redirect()->to('institutions');
    }


    public function edit(Institution $institution){
        return view("institutions.edit")->with([
            'institution'=>$institution
        ]);
    }


    public function update(Request $request,Institution $institution){
        $updates = $request->all();

        $institution->update($updates);

        session()->flash('success-status',"Update successful");

        return redirect()->to("institutions");

    }

    public function destroy(Institution $institution){

       // delete the model
        $institution->delete();

        session()->flash('success-status',"Institution successfully deleted");

        return back();
    }

    public function getInstitutions(){
        $data = Institution::all();

        // 200 -> ok 
        return response()->json($data,200);
    }
}
