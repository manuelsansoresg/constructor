@extends('adminlte::page')

@section('title', 'Dominio')

@section('content_header')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1>Dominio</h1>
            </div>
        </div>
    @stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="frm-domains" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="InputWidget">Dominio</label>
                            <input type="text" class="form-control" name="data[name]" value="{{ $domain!= null ? $domain->name : null }}" required>
                            <small>Introduce tu nombre de dominio sin usar http:// <br> Ejemplo: google.com</small>
                        </div>
                        <div class="row" style="display: none" id="loading">
                            <div class="col-12 text-center">
                                <div>
                                    <div class="fa-3x">
                                        <i class="fas fa-circle-notch fa-spin"></i>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                        <input type="hidden" name="domain_id" value="{{ $domain!= null ? $domain->id : null }}">
                        <div class="col-12 pb-5">
                            <a href="/admin/domains" class="btn btn-outline-danger float-right ml-md-2">Cancelar</a>
                            <button type="submit" class="btn btn-outline-primary float-right ">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop