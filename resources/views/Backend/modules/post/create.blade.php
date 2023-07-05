@extends('Backend.layout.master')
@section('page_title', 'Post')
@section('page_sub_title', 'Create')
@section('contant')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Create Post</h4>
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

                    {!! Form::open(['method' => 'Post', 'route' => 'post.store', 'files'=>'true']) !!}
                    {!! Form::label('title', 'Title', ['class' => 'my-2']) !!}
                    {!! Form::text('title', null, [
                        'id' => 'name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Post Name',
                    ]) !!}
                    {!! Form::label('slug', 'Slug', ['class' => 'my-2']) !!}
                    {!! Form::text('slug', null, [
                        'id' => 'slug',
                        'class' => 'form-control ',
                        'placeholder' => 'Enter Post Slug',
                    ]) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('category_id', 'Select Category', ['class' => 'my-2']) !!}
                            {!! Form::select('category_id', $categories, null, [
                                'id' => 'category_id',
                                'class' => 'form-select ',
                                'placeholder' => 'Select Parent Category',
                            ]) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('sub_category_id', 'Select Sub Category', ['class' => 'my-2']) !!}
                            <select name="sub_category_id" id="SubCategory" class="form-select">
                                <option class="form-select">Select Sub Category</option>
                            </select>
                        </div>
                    </div>
                    {!! Form::label('status', 'Post Serial', ['class' => 'my-2']) !!}
                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
                        'class' => 'form-control ',
                        'placeholder' => 'Enter Post status',
                    ]) !!}
                    <div class="row">
                        {!! Form::label('tag', 'Tags', ['class' => 'my-2']) !!}
                        @foreach ($tags as $tag)
                        <div class="col-md-3">
                           {!! Form::checkbox('tag_ids[]', $tag->id, false) !!} <span>{{ $tag->name }}</span>
                        </div>
                           @endforeach
                    </div>
                    {!! Form::label('discribtion', 'Discribtion',['class'=>'my-3']) !!}
                    {!! Form::textarea('discribtion', null, ['class'=>'TextDiscribtion','id'=>'discribtion']) !!}
                    {!! Form::file('photo', ['class' => 'form-control my-2']) !!}
                    {!! Form::button('Create Post', ['type' => 'submit', 'class' => 'btn btn-success mt-3']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
<style>
    .ck.ck-editor__main>.ck-editor__editable{
        min-height: 200px;
        border-color: var(--ck-color-base-border);
    }
</style>
@endpush
@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>

    <script>

        $('#category_id').on('change', function (){
            let categoryValue =  $(this).val()
            axios(window.location.origin+'/dashboard/get-subcategory/'+categoryValue).then((res)=>{
                let sub_category = res.data
                $('#SubCategory').empty()
                sub_category.map((SubCategory)=>{
                    $('#SubCategory').append(`<option value="${SubCategory.id}" class="form-select">${SubCategory.name}</option>`)
                })
            })
        })

        $('#name').on('input', function() {
                let name = $(this).val()
                let slug = name.replaceAll(' ', '-')
                $('#slug').val(slug.toLowerCase());
            })


    ClassicEditor
        .create( document.querySelector( '#discribtion' ) )
        .catch( error => {
            console.error( error );
        } );

    </script>
@endpush
