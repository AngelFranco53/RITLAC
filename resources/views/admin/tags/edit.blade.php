@extends('adminlte::page')

@section('title', 'RITLAC - Admin')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! html()->modelForm($tag, 'PUT', route('admin.tags.update', $tag))->open() !!}
            <div class="form-group
            {!! html()->label('Nombre', 'name') !!}
            {!! html()->text('name')->id('name')->class('form-control')->placeholder('Ingrese el nombre de la etiqueta') !!}
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! html()->label('Slug', 'slug') !!}
            {!! html()->text('slug')->id('slug')->class('form-control')->placeholder('Ingrese el nombre de la etiqueta')->isReadonly() !!}
            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! html()->label('Color', 'color') !!}
            {!! html()->input('color', 'color')->id('color_hex')->class('form-control')->value('#000000') !!}

            @error('color')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! html()->submit('Guardar')->class('btn btn-primary') !!}
        </div>
        {!! html()->form()->close() !!}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

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