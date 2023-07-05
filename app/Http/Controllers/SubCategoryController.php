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
        $sub_categories = sub_category::with('category')->orderBy('order_by')->get();
       $sub_categories =   sub_category::with('category')->get();
    //    dd($sub_categories);
        return view('Backend.modules.sub_category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
         $categories =  Category::pluck('name', 'id');
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

        $sub_category_data = $request->all();
        $sub_category_data['slug'] = Str::slug($request->input('slug', '-'));
        sub_category::create($sub_category_data);
        session()->flash('cls','success');
        session()->flash('msg','Category Created Successfully');
        return redirect()->route('sub_category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(sub_category $subCategory)
    {
        $subCategory->load('category');
        return view('Backend.modules.sub_category.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sub_category $subCategory)
    {
        $categories = Category::pluck('name', 'id');
        return view('Backend.modules.sub_category.edit', compact('subCategory','categories'));

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sub_category $subCategory)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:255',
            'slug'=>'required|min:3|max:255|unique:categories,slug,'.$subCategory->id,
            'order_by'=>'required|numeric',
            'status'=>'required',
        ]);

        $sub_category_data = $request->all();
        $sub_category_data['slug'] = Str::slug($request->input('slug', '-'));
        $subCategory->update($sub_category_data);
        session()->flash('cls','info');
        session()->flash('msg','Sub Category Updated Successfully');
        return redirect()->route('sub_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sub_category $subCategory)
    {
        $subCategory->delete();
        session()->flash('cls','danger');
        session()->flash('msg','Sub Category Deleted Successfully');
        return redirect()->route('sub_category.index');
    }

    public function getsub_categoryIdByCategoryId ($id)
    {
        // $sub_category = sub_category::select('name','id')->where('status', 1)->where('category_id', $id)->get();
        // return response()->json($sub_category);
       $sub_categories =   sub_category::select('name','id')->where('status', 1)->where('category_id', $id)->get();
       return response()->json($sub_categories);
    }
}