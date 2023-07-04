@extends('Backend.layout.master')
@section('page_title', 'Sub Category')
<<<<<<< HEAD
@section('page_sub_title', 'Update')
=======
@section('page_sub_title', 'Create')
>>>>>>> 0240729808d1d28ed1ec4840e74e38e19108a209
@section('contant')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
<<<<<<< HEAD
                    <h4>Update Sub Category</h4>
=======
                    <h4>Create Sub Category</h4>
>>>>>>> 0240729808d1d28ed1ec4840e74e38e19108a209
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

<<<<<<< HEAD
                    {!! Form::model($subCategory, ['method' => 'PUT', 'route' => ['sub_category.update', $subCategory->id]]) !!}
                    @include('Backend.modules.sub_category.form')
                    {!! Form::button('Update Sub_sub_category', ['type' => 'submit', 'class' => 'btn btn-success mt-2']) !!}
                    {!! Form::close() !!}
                </div>
                <a href="{{ route('sub_category.index') }}" class="btn btn-danger text-light"> Back </a>
=======
                    {!! Form::open(['method' => 'POST', 'route' => 'sub_category.store']) !!}
                    {!! Form::label('name', 'Name', ['class' => 'my-2']) !!}
                    {!! Form::text('name', null, [
                        'id' => 'name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Sub Category Name',
                    ]) !!}
                    {!! Form::label('slug', 'Slug', ['class' => 'my-2']) !!}
                    {!! Form::text('slug', null, [
                        'id' => 'slug',
                        'class' => 'form-control ',
                        'placeholder' => 'Enter Sub Category Slug',
                    ]) !!}

                   {!! Form::label('category_id', 'Select Sub  Category', ['class' => 'my-2']) !!}
                   {{-- {!! Form::select($name, $list, $selected, [$options]) !!} --}}
                   {!! Form::select('category_id', $categories, null, [
                        'class' => 'form-select ',
                        'placeholder' => 'Select Parent Category',
                    ]) !!}
                    {!! Form::label('order_by', 'Sub Category Serial', ['class' => 'my-2']) !!}
                    {!! Form::number('order_by', null, ['class' => 'form-control ', 'placeholder' => 'Select Sub Category Serial']) !!}
                    {!! Form::label('status', 'Sub Category Serial', ['class' => 'my-2']) !!}
                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
                        'class' => 'form-control ',
                        'placeholder' => 'Enter Sub Category status',
                    ]) !!}
                    {!! Form::button('Create Sub Category', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) !!}
                    {!! Form::close() !!}
                </div>
>>>>>>> 0240729808d1d28ed1ec4840e74e38e19108a209
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $('#name').on('input', function() {
                let name = $(this).val()
                let slug = name.replaceAll(' ', '-')
                $('#slug').val(slug.toLowerCase());
            })
        </script>
    @endpush

@endsection
