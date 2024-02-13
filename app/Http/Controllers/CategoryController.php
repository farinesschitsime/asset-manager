<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institution_id = \request()->user()->institution_id;

        $data = Category::where('institution_id', $institution_id)->get();

        return view("categories.index")->with([
            'categories' => $data
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create")->with([
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
            'code' => "required|string",
            'description' => "required|string",
            'institution_id' => "required|numeric"
        ];

        $this->validate($request, $rules);

        // retrieve data
        $data = $request->all();

        Category::create($data);

        // set a success message
        session()->flash('success-status', "Category created successfully!");

        return redirect()->route("categories.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show')->with([
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with([
            'category' => $category,
            'institution_id' => \request()->user()->institution_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => "required|string",
            'code' => "required|string",
            'description' => "required|string",
            'institution_id' => "required|numeric"
        ];

        $this->validate($request, $rules);

        // retrieve data
        $updates = $request->all();

        $category->update($updates);

        // set a success message
        session()->flash('success-status', "Category updated successfully!");

        return redirect()->route("categories.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success-status', "Category successfully deleted");
        return redirect()->route("categories.index");
    }
}
