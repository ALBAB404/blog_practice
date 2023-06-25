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
        $sub_categories =  sub_category::orderBy('order_by')->get();
        return view('Backend.modules.sub_category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('Backend.modules.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:255',
            'slug'=>'required|min:3|max:255|unique:sub_categories',
            'order_by'=>'required|numeric',
            'status'=>'required',
            'category_id'=>'required',
        ]);

        $sub_category_data =  $request->all();

        $sub_category_data['slug'] = Str::slug($request->input('slug', '-'));

        sub_category::create($sub_category_data);
        return view('Backend.modules.sub_category.index');
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
        $categories = Category::pluck('name', 'id');
        return view('Backend.modules.sub_category.edit', compact('sub_category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sub_category $sub_category)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:255',
            'slug'=>'required|min:3|max:255|unique:sub_categories',
            'order_by'=>'required|numeric',
            'status'=>'required',
            'category_id'=>'required',
        ]);

        $sub_category_data =  $request->all();

        $sub_category_data['slug'] = Str::slug($request->input('slug', '-'));

        $sub_category->update($sub_category_data);

        return redirect()->route('sub_category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sub_category $sub_category)
    {
        $sub_category->delete();
        return redirect()->route('sub_category.index');
    }
}