@extends('Backend.layout.master')
@section('page_title', 'Sub_Category')
@section('page_title', 'Tag')
@section('page_sub_title', 'List')
@section('contant')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="col-6">
                        <h4>Sub_Category List</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session('msg'))
                        <div class=" alert alert-{{ session('cls') }}">
                            {!! session('msg') !!}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Order By</th>
                                <th>Created At</th>
                                <th>Uploadted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php  $sl = 1  @endphp
                            @foreach ($sub_categories as $sub_category)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $sub_category->name }}</td>
                                    <td>{{ $sub_category->category->name }}</td>
                                    <td>{{ $sub_category->slug }}</td>
                                    <td>{{ $sub_category->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td><{{ $sub_category->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $sub_category->order_by }}</td>
                                    <td>{{ $sub_category->created_at->toDayDateTimeString() }}</td>
                                    <td>{{ $sub_category->created_at != $sub_category->updated_at ? $sub_category->updated_at->toDayDateTimeString() : 'Not Updated' }}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('sub_category.show', $sub_category->id) }}"><button
                                                    class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
                                            <a href="{{ route('sub_category.edit', $sub_category->id) }}"><button
                                                    class="btn btn-warning btn-sm mx-1"><i
                                                        class="fa-solid fa-edit"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'delete',
                                                'id' => 'form_' . $sub_category->id,
                                                'route' => ['sub_category.destroy', $sub_category->id],
                                            ]) !!}
                                            {!! Form::button('<i class="fa-solid fa-trash"></i>', [
                                                'type' => 'button',
                                                'class' => ' delete btn btn-danger btn-sm',
                                            ]) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $('.delete').on('click', function() {
                let id = $(this).attr('data-id')
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#form_${id}`).submit()
                    }
                })
            })
        </script>
    @endpush

@endsection
