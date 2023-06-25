@extends('Backend.layout.master')
@section('page_title', 'Sub Category')
@section('page_sub_title', 'Create')
@section('contant')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Create Sub Category</h4>
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
