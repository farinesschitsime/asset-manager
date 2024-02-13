<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get the institution of the user accessing the system
        $institution_id = \request()->user()->institution_id;

        // get all the departments belonging to that institution
        $department_ids = Department::where('institution_id', $institution_id)->pluck('id');

        // get all the assets belonging to those departments
        $data = Asset::whereIn('department_id', $department_ids)->get();

        return view('assets.index')->with([
            'assets' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('institution_id', \request()->user()->institution_id)->get();
        return view("assets.create")->with([
            'department_id' => \request()->user()->department_id,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => ["required", "string"],
            'code' => ["required", "string"],
            'value' => ["required", "numeric"],
            'department_id' => ["required", "numeric"],
            "category_id" => ["required", "numeric", Rule::exists('categories', 'id')],
            'description' => ["required", "string"],
            'useful_life' => ["required", "numeric"],
            'depreciation_method' => ["required", "string", Rule::in(['declining balance', 'straight line'])]
        ];

        $this->validate($request, $rules);

        // retrieve data
        $data = $request->all();
        $data['user_id'] = \request()->user()->id;

        Asset::create($data);

        // set a success message
        session()->flash('success-status', "Asset created successfully!");

        return redirect()->route("assets.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        return view('assets.show')->with([
            'asset' => $asset,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $categories = Category::where('institution_id', \request()->user()->institution_id)->get();

        return view('assets.edit')->with([
            'asset' => $asset,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $rules = [
            'name' => ["required", "string"],
            'code' => ["required", "string"],
            'value' => ["required", "numeric"],
            'department_id' => ["required", "numeric"],
            "category_id" => ["required", "numeric", Rule::exists('categories', 'id')],
            'description' => ["required", "string"],
            'useful_life' => ["required", "numeric"],
            'depreciation_method' => ["required", "string", Rule::in(['declining balance', 'straight line'])]
        ];

        $this->validate($request, $rules);

        // retrieve data
        $updates = $request->all();

        $asset->update($updates);

        // set a success message
        session()->flash('success-status', "Asset updated successfully!");

        return redirect()->route("assets.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        session()->flash('success-status', "Asset successfully deleted");
        return redirect()->route("assets.index");
    }
}
