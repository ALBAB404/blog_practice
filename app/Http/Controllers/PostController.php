<?php

namespace App\Http\Controllers;
use App\Http\Requests\postUpdateRequest;
use App\Models\sub_category;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =  Category::pluck('name','id');
        $tags = Tag::select('id','name')->where('status', 1)->get();
        return view('Backend.modules.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dd($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}