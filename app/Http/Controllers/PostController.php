<?php

namespace App\Http\Controllers;
use App\Http\Requests\Postrequest;
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
    public function store(Postrequest $request)
    {

        $post_data = $request->except('photo','slug','tag_ids');
        $post_data['slug'] = Str::slug($request->input('slug'));
        $post_data['user_id'] = Auth::user()?->id;
        $post_data['is_approved'] = 1;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = Str::slug($request->input('slug'));
            $height = 400;
            $width = 1000;
            $thumb_height = 150;
            $thumb_width = 300;
            $path = 'image/post/Original/';
            $thumbnail_path = 'image/post/Thumbnail/';

            $post_data['photo'] =  PhotoUploadController::imageUpload($name,$height,$width,$path,$file);
                                   PhotoUploadController::imageUpload($name,$thumb_height,$thumb_width,$thumbnail_path,$file);
        }

        $post = Post::create($post_data);

        $post->tag()->attach($request->input('tag_ids'));

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