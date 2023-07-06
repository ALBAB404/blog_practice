@extends('Backend.layout.master')
@section('page_title', 'Post')
@section('page_sub_title', 'Details')
@section('contant')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Post Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>{{ $post->id }}</th>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $post->slug }}</td>>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $post->status == 1 ? 'Active': 'Inactive' }}</td>
                            </tr>
                            <tr>
                                <th>Is Admin</th>
                                <td>{{ $post->is_approved == 1 ? 'Published': 'Not Published' }}</td>
                            </tr>
                            <tr>
                                <th>Discription</th>
                                <td>{!! $post->discribtion !!}</td>
                            </tr>
                            <tr>
                                <th>Admin Comment</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $post->created_at->toDayDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <th>Uploadted At</th>
                                <td>{{ $post->created_at != $post->updated_at ? $post->updated_at->toDayDateTimeString() : 'Not Updated' }}
                                </td>
                            </tr>
                            <tr>
                                <th>Deleted At</th>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                           <td>
                            <img class="img-thumbnail image_show" data-src="{{ url('image/post/original/'.$post->photo) }}" src="{{ url('image/post/Thumbnail/'.$post->photo) }}" alt="{{ $post->title }}">
                            </td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>
                                    @php
                                    $classes = ['btn-primary', 'btn-success', 'btn-dark', 'btn-warning', 'btn-danger']
                                    @endphp
                                    @foreach ($post->tag as $tag)
                                    <a href=""><button class="btn btn-sm {{ $classes[random_int(0,4)] }} mb-2">{{ $tag->name }}</button></a>
                                    @endforeach
                             </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('post.index') }}" class="btn btn-info btn-sm text-light"> Back </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Category Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $post->category->id }}</td>
                            </tr>
                            <tr>
                                <th>Category Name</th>
                                <td>{{ $post->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Category Slug</th>
                                <td>{{ $post->category->slug }}</td>
                            </tr>
                            <tr>
                                <th>Ordder By</th>
                                <td>{{ $post->category->order_by }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $post->category->status == 1 ? 'Active' :'Inactive'  }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('category.show', $post->category->id) }}" class="btn btn-success">Show Category</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Sub Category Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $post->sub_category->id }}</td>
                            </tr>
                            <tr>
                                <th>Sub Category Name</th>
                                <td>{{ $post->sub_category->name }}</td>
                            </tr>
                            <tr>
                                <th>Sub Category Slug</th>
                                <td>{{ $post->sub_category->slug }}</td>
                            </tr>
                            <tr>
                                <th>Ordder By</th>
                                <td>{{ $post->sub_category->order_by }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $post->sub_category->status ==1 ? 'Active' : 'Inactive' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="" class="btn btn-success">Show Sub Category</a>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h4>User Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $post->user->id }}</td>
                            </tr>
                            <tr>
                                <th>User Name</th>
                                <td>{{ $post->user->name }}</td>
                            </tr>
                            <tr>
                                <th>User Email</th>
                                <td>{{ $post->user->email }}</td>
                            </tr>
                            <tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $post->user->status == 1 ? 'Active' : 'Inactive' }}</td>
                            </tr>
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
@endsection
