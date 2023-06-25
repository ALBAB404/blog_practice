@extends('Backend.layout.master')
@section('page_title', 'sub_category')
@section('page_sub_title', 'Details')
@section('contant')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>sub_category Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>{{ $sub_category->id }}</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $sub_category->name }}</td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $sub_category->slug }}</td>>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $sub_category->status == 1 ? 'Active' : 'Inactive' }}</td>
                            </tr>
                            <tr>
                                <th>Order By</th>
                                <td>{{ $sub_category->order_by }}</td>
                            </tr>
                            <tr>
                                <th>Category Name</th>
                                <td>{{ $sub_category->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $sub_category->created_at->toDayDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <th>Uploadted At</th>
                                <td>{{ $sub_category->created_at != $sub_category->updated_at ? $sub_category->updated_at->toDayDateTimeString() : 'Not Updated' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('sub_category.index') }}" class="btn btn-info btn-md text-light"> Back </a>
                </div>
            </div>
        </div>
    </div>
@endsection
