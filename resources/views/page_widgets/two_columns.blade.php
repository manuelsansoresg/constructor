@extends('adminlte::page')

@section('title', '2 columnas')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Sección 2 columnas
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Páginas</a></li>
                        <li class="breadcrumb-item active">2 COLUMNAS</li>
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
                        <form action="" id="frm-two-columns" enctype="multipart/form-data" wire:ignore>
                               {{-- contenido --}}
                
                               <h5>Sección 2 columnas</h5>
                
                               <div class="form-group">
                                   <label for="InputWidget">Orden</label>
                                   <input type="text" class="form-control" name="data[order]" id="two-columns-order">
                               </div>
           
                               @if ($query->image != null)
                                   <div class="col-12 col-md-3">
                                    <div class="text-center">
                                         <img src="{{ asset('files/' . $query->image) }}" alt="Profiler"
                                         class="preview_admin">
                                    </div>
                                     <div class="d-block mt-3">
                                         <button class="btn btn-outline-danger btn-block" onclick="deleteImage({{$query->id}}, '2 columnas', 'image')">Borrar</button>
                                     </div>
                                 </div>
                               @else
                               <div class="form-group">
                                    <label for="InputWidget">Imagen</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                               @endif
                              
           
                               <div class="form-group">
                                   <label for="InputWidget">*Título</label>
                                   <textarea name="data[title]" id="two-columns-title" cols="30" rows="5" class="form-control summernote"></textarea>
                               </div>
                               <div class="form-group">
                                   <label for="InputWidget">Subtítulo</label>
                                   <textarea name="data[subtitle]" id="two-columns-subtitle" cols="30" rows="5" class="form-control summernote"></textarea>
                               </div>
                               <div class="form-group">
                                   <label for="InputWidget">Descripción</label>
                                   <textarea name="data[description]" id="two-columns-description" cols="30" rows="10" class="form-control summernote"></textarea>
                               </div>
           
                               <div class="row" style="display: none" id="loading-two-columns">
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
                                    <input type="hidden" name="data[widget_id]" id="modal-two-columns-section_id" value="{{ $section_id }}">
                                    <input type="hidden" name="two_columns_id" id="modal-two-columns-widget_id" value="{{ (isset($query->id))? $query->id : 'null' }}">
                                    <input type="hidden" name="page_actual" id="modal-two-columns-page_actual" value="{{$page}}">
                                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-two-columns')">Cerrar</button>
                                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop