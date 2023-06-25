@extends('Backend.layout.master')
@section('page_title', 'sub_category')
@section('page_sub_title', 'Create')
@section('contant')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Create sub_category</h4>
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
                        'placeholder' => 'Enter sub_category Name',
                    ]) !!}
                    {!! Form::label('slug', 'Slug', ['class' => 'my-2']) !!}
                    {!! Form::text('slug', null, [
                        'id' => 'slug',
                        'class' => 'form-control ',
                        'placeholder' => 'Enter sub_category Slug',
                    ]) !!}

                    {!! Form::label('category_id', 'Parent Category', ['class'=> 'my-2']) !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-select', 'placeholder'=> 'please Select Sub Category']) !!}

                    {!! Form::label('order_by', 'sub_category Serial', ['class' => 'my-2']) !!}
                    {!! Form::number('order_by', null, ['class' => 'form-control ', 'placeholder' => 'Select sub_category Serial']) !!}
                    {!! Form::label('status', 'sub_category Serial', ['class' => 'my-2']) !!}
                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
                        'class' => 'form-control ',
                        'placeholder' => 'Enter sub_category status',
                    ]) !!}
                    {!! Form::button('Create sub_category', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) !!}
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
