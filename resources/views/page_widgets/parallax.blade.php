@extends('adminlte::page')

@section('title', 'Parallax')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Sección parallax
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Páginas</a></li>
                        <li class="breadcrumb-item active">PARALLAX</li>
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
                        <form action="" id="frm-parallax" enctype="multipart/form-data">
                                {{-- contenido --}}
                
                                <h5>Sección parallax</h5>
                
                                <div class="form-group">
                                    <label for="InputWidget">Orden</label>
                                    <input type="text" class="form-control" name="data[order]" id="parallax-order">
                                </div>
            
                                <div class="form-group">
                                    <label for="InputWidget">Imagen</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                               
            
                                <div class="row" style="display: none" id="loading-parallax">
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
                                    <input type="hidden" name="data[widget_id]" id="modal-parallax-section_id" value="{{ $section_id }}">
                                    <input type="hidden" name="parallax_id" id="modal-parallax-widget_id" value="{{ (isset($query->id))? $query->id : 'null' }}">
                                    <input type="hidden" name="page_actual" id="modal-parallax-page_actual" value="{{$page}}">
                                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-parallax')">Cerrar</button>
                                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        
@stop