@extends('adminlte::page')

@section('title', 'Galería')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Sección galería
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Páginas</a></li>
                        <li class="breadcrumb-item active">GALERÍA</li>
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
                        <form action="" id="frm-gallery" enctype="multipart/form-data">
                               {{-- contenido --}}
                
                               <div class="form-group">
                                <label for="InputWidget">Orden</label>
                                <input type="text" class="form-control" name="order" id="gallery-order">
                            </div>
        
                            <h5>Sección galería</h5>
                            <div class="form-group">
                                <label for="InputWidget">Imagen1</label>
                                <input type="file" class="form-control" name="imagen1">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen1</label>
                                <input type="text" class="form-control" name="data[linkimagen1]" value="{{ isset($query->linkimagen1) ? $query->linkimagen1 : null }}">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Imagen2</label>
                                <input type="file" class="form-control" name="imagen2">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen2</label>
                                <input type="text" class="form-control" name="data[linkimagen2]" value="{{ isset($query->linkimagen2) ? $query->linkimagen2 : null }}">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Imagen3</label>
                                <input type="file" class="form-control" name="imagen3">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen3</label>
                                <input type="text" class="form-control" name="data[linkimagen3]" value="{{ isset($query->linkimagen3) ? $query->linkimagen3 : null }}">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Imagen4</label>
                                <input type="file" class="form-control" name="imagen4">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen4</label>
                                <input type="text" class="form-control" name="data[linkimagen4]" value="{{ isset($query->linkimagen4) ? $query->linkimagen4 : null }}">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Imagen5</label>
                                <input type="file" class="form-control" name="imagen5">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen5</label>
                                <input type="text" class="form-control" name="data[linkimagen5]" value="{{ isset($query->linkimagen5) ? $query->linkimagen5 : null }}">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Imagen6</label>
                                <input type="file" class="form-control" name="imagen6">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen6</label>
                                <input type="text" class="form-control" name="data[linkimagen6]" value="{{ isset($query->linkimagen6) ? $query->linkimagen6 : null }}">
                            </div>
                            
                            <div class="row" style="display: none" id="loading-gallery">
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
                                    <input type="hidden" name="widget_id" id="modal-gallery-section_id" value="{{ $section_id }}">
                                    <input type="hidden" name="gallery_id" id="modal-gallery-widget_id" value="{{ (isset($query->id))? $query->id : 'null' }}">
                                    <input type="hidden" name="page_actual" id="modal-gallery-page_actual" value="{{$page}}">
                                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-gallery')">Cerrar</button>
                                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
