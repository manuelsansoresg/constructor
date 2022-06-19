@extends('adminlte::page')

@section('title', 'Texto')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Sección texto
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Páginas</a></li>
                        <li class="breadcrumb-item active">TEXTO</li>
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
                        <form action="" id="frm-texto" enctype="multipart/form-data">
                                {{-- contenido --}}
                
                                <h5>Sección Texto</h5>
                                    
                                <div class="form-group">
                                    <label for="InputWidget">Orden</label>
                                    <input type="text" class="form-control" name="data[order]" id="texto-order">
                                </div>
            
                                <div class="form-group" wire:ignore>
                                    <label for="InputWidget">Texto</label>
                                    <textarea name="data[content]" id="texto-content" cols="30" rows="10" class="form-control summernote"></textarea>
                                </div>
                                <div class="row" style="display: none" id="loading-texto">
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
                                    <input type="hidden" name="data[widget_id]" id="modal-texto-section_id" value="{{ $section_id }}">
                                    <input type="hidden" name="texto_id" id="modal-texto-widget_id" value="{{ (isset($query->id))? $query->id : 'null' }}">
                                    <input type="hidden" name="page_actual" id="modal-texto-page_actual" value="{{$page}}">
                                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-texto')">Cerrar</button>
                                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop