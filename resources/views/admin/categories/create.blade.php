@extends('adminlte::page')

@section('title', 'RITLAC - Admin')

@section('content_header')
    <h1>Crear categoria</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            {!! html()->form('POST', route('admin.categories.store'))->open() !!}
            <div class="form-group">
                {!! html()->label('Nombre', 'name') !!}
                {!! html()->text('name')->id('name')->class('form-control')->placeholder('Ingrese el nombre de la categoría') !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! html()->label('Slug', 'slug') !!}
                {!! html()->text('slug')->id('slug')->class('form-control')->placeholder('Ingrese el nombre de la categoría')->isReadonly() !!}

                @error('slug')
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