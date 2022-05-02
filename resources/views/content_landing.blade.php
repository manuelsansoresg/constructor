@extends('layouts.livewire-layout')

@section('title', 'Landing')
    
@section('content')
    @livewire('preview-component', ['page' =>  Request::segment(1)])
@endsection