@extends('adminlte::page')

@section('title', 'Encabezado')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Sección encabezado
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Páginas</a></li>
                        <li class="breadcrumb-item active">ENCABEZADO</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="" id="frm-encabezado" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="InputWidget">Orden</label>
                                <input type="text" class="form-control" name="data[order]" id="encabezado-order">
                            </div>
        
                            <div class="form-group">
                                <label for="InputWidget">Imagen</label>
                                <input type="file" class="form-control" name="image">
                            </div>
        
        
                            <div class="form-group">
                                <label for="InputWidget">*Título</label>
                                <input type="text" class="form-control ckeditor" name="data[title]" id="encabezado-title" required>
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Teléfono 1</label>
                                <input type="text" class="form-control" name="data[phone]" id="encabezado-phone">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Teléfono 2</label>
                                <input type="text" class="form-control" name="data[phone2]" id="encabezado-phone2">
                            </div>
        
                            <div class="row" style="display: none" id="loading-encabezado">
                                <div class="col-12 text-center">
                                    <div>
                                        <div class="fa-3x">
                                            <i class="fas fa-circle-notch fa-spin"></i>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                            {{-- contenido --}}
                            <div class="modal-footer">
                                <input type="hidden" name="data[widget_id]" id="modal-encabezado-section_id" value="{{ $section_id }}">
                                <input type="hidden" name="header_id" id="modal-encabezado-widget_id" value="{{ (isset($query->id))? $query->id : 'null' }}">
                                <input type="hidden" name="page_actual" value="{{$page}}">
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="closeModalSection('modal-widget-header')">Cerrar</button>
                                <button type="submit" class="btn btn-outline-primary">Agregar</button>
                            </div>
        
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    @stop
