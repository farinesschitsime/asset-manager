<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();

        $institution_id = $user->institution_id;

        $data = Department::where([
            'institution_id'=>$institution_id
        ])->get();
      
        return view("departments.index")->with([
            'departments' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("departments.create")->with([
            'institution_id' => \request()->user()->institution_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => "required|string",
            'institution_id' => "required|numeric"
        ];

        $this->validate($request, $rules);

        // retrieve data
        $data = $request->all();

        Department::create($data);

        // set a success message
        session()->flash('success-status', "Department created successfully!");

        return redirect()->route("departments.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('departments.show')->with([
            'department' => $department
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit')->with([
            'department' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $rules = [
            'name' => "required|string",
            'institution_id' => "required|numeric"
        ];

        $this->validate($request, $rules);

        $updates = $request->post();

        $department->update($updates);

        session()->flash('success-status', "Department updated successfully!");

        return redirect()->route("departments.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        session()->flash('success-status', "Department successfully deleted");
        return redirect()->route("departments.index");
    }
}
