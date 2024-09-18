@extends('adminlte::page')

@section('title', 'RITLAC - Admin')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! html()->form('POST', route('admin.posts.store'))->autocomplete(false)->open() !!}

            {!! html()->hidden('publisher_id', auth()->user()->id) !!}
            {!! html()->hidden('carreer_id', auth()->user()->carreer_id) !!}

            <div class="form-group">
                {!! html()->label('Nombre', 'name') !!}
                {!! html()->text('name')->id('name')->class('form-control')->placeholder('Ingrese el nombre del post') !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! html()->label('Slug', 'slug') !!}
                {!! html()->text('slug')->id('slug')->class('form-control')->placeholder('Ingrese el nombre del post')->isReadonly() !!}

                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

             <div class="form-group">
                {!! html()->label('Categoría', 'category_id') !!}
                {!! html()->select('category_id', $categories)->id('category_id')->class('form-control') !!}

                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

           <div class="form-group">
                <p class="font-weight-bold">
                    Etiquetas:
                </p>

                @foreach ($tags as $tag)
                    <label class="mr-2">
                        {!! html()->checkbox('tags[]', false, $tag->id)->unchecked()->id('tag-'.$tag->id) !!}
                        {{ $tag->name }}
                    </label>
                @endforeach

                @error('tags')
                    <br/>
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! html()->label('Extracto', 'extract') !!}
                {!! html()->textarea('extract')->id('extract')->class('form-control')->placeholder('Ingrese el extracto del post') !!}

                @error('extract')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! html()->label('Cuerpo', 'body') !!}
                {!! html()->textarea('body')->id('body')->class('form-control')->placeholder('Ingrese el cuerpo del post') !!}

                @error('body')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="from-group" >
                <p class="font-weight-bold">
                    Estado:
                </p>

                <label class="mr-2">
                    {!! html()->radio('status', true, 5) !!}
                    Publicado
                </label>

                <label class="mr-2">
                    {!! html()->radio('status', false, 1)->unchecked() !!}
                    Borrador
                </label>

                @error('status')
                    <br/>
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                {!! html()->submit('Guardar')->class('btn btn-primary') !!}
            </div>
            {!! html()->form()->close() !!}

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function(){
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            });

        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            });
    </script>

<script>
    $(document).ready(function(){
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });
</script>
@stop