<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $sub_categories =   sub_category::with('category')->get();
    //    dd($sub_categories);
        return view('Backend.modules.sub_category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $categories =  Category::pluck('name', 'id');
        return view('Backend.modules.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:20',
            'slug' => 'required|min:5|max:20|unique:sub_categories',
            'order_by'=>'required|numeric',
            'status'=>'required',
        ]);

        $sub_category_data = $request->all();
        $sub_category_data['slug'] = Str::slug($request->input('slug', '-'));
        sub_category::create($sub_category_data);
        session()->flash('cls','success');
        session()->flash('msg','Category Insert Successfully');
        return redirect()->route('sub_category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(sub_category $sub_category)
    {
        return view('Backend.modules.sub_category.show', compact('sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sub_category $sub_category)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sub_category $sub_category)
    {


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sub_category $sub_category)
    {

    }
}