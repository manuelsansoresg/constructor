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
                        <form action="" id="frm-contacto" enctype="multipart/form-data" wire:ignore>
                                {{-- contenido --}}
                
                                <h5>Sección Contacto</h5>
                                  
                                <div class="form-group">
                                    <label for="InputWidget">Orden</label>
                                    <input type="text" class="form-control" name="data[order]" id="contacto-order">
                                </div>
            
                                <div class="form-group">
                                    <label for="InputWidget">*Nombre contacto</label>
                                    <input type="text" class="form-control" name="data[name]" id="contacto-name" required>
                                </div>
                                <h5 class="text-center">Elementos del formulario</h5>
                                <div id="elementsForm">
                                    
                                </div>
            
                                <div class="row" style="display: none" id="loading-contacto">
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
                                    <input type="hidden" name="data[widget_id]" id="modal-contacto-section_id" value="{{ $section_id }}">
                                    <input type="hidden" name="contacto_id" id="modal-contacto-widget_id" value="{{ (isset($query->id))? $query->id : 'null' }}">
                                    <input type="hidden" name="page_actual" id="modal-contacto-page_actual" value="{{$page}}">
                                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-contacto')">Cerrar</button>
                                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
