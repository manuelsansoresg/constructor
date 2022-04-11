@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Constructor de sitios</h1>
@stop

@section('content')
    @livewire('constructor-component')
@stop



@section('js')
    <script> console.log('Hi!'); </script>
@stop
