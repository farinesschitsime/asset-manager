<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderByDesc('created_at')->get();

        activity()->useLog("RESOURCE-ACCESS")->log('User accessed users index page');

        return view("users.index")->with([
            'users' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = [];

        activity()->useLog("RESOURCE-ACCESS")->log('User accessed page for create users.');

        
        // if the user is institution admin, they may need the departments
        // so load them up
        if(\request()->user()->role === "instadmin"){
            $departments = Department::where('institution_id',\request()->user()->institution_id)->get();
        }

        return view("users.create")->with([
            'institutions' => Institution::all(),
            'departments'=>$departments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'fname' => "required|string",
            'sname' => "required|string",
            'password' => "required|string",
            'email' => "required|email|unique:users,email",
            'role' => "required|string",
            'institution_id' => "required_if:role,instadmin",
            'department_id' => "required_if:role,deptadmin",
        ];

        $this->validate($request, $rules);

        // retrieve user
        $data = $request->all();

        // hash the password
        $data['password'] = bcrypt($data['password']);

        // save the user
        User::create($data);

        // set a success message
        session()->flash('success-status', "User created successfully!");

        activity()->useLog("RESOURCE-ACCESS")->log('User create a new user');


        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show')->with([
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit')->with([
            'user' => $user,
            'institutions'=>Institution::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $updates = collect($request->post())->except(['password'])->toArray();


        $rules = [
            'fname' => "required|string",
            'sname' => "required|string",
            'password' => "nullable|string",
            'email' => "required|email|unique:users,email,{$user->id}",
            'role' => "required|string",
            'institution_id' => "required_if:role,instadmin"
        ];

        $this->validate($request, $rules);


        if ($request->post('password')) {
            $updates['password'] = bcrypt($request->post('password'));
        }

        $user->update($updates);

        // set a success message
        session()->flash('success-status', "User updated successfully!");

        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        activity()->useLog("RESOURCE-ACCESS")->log('User deleted another user.');

        session()->flash('success-status', "User successfully deleted");
        return redirect()->route("users.index");
    }


    public function getUsers(){
        // retrieve all users
        $users = User::all();

        // return an ok response with the data
        return response()->json($users,200);
    }
}