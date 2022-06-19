@extends('adminlte::page')

@section('title', 'Video')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Sección video
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Páginas</a></li>
                        <li class="breadcrumb-item active">VIDEO</li>
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
                        <form action="" id="frm-video" enctype="multipart/form-data" wire:ignore>
                                 {{-- contenido --}}
                
                                 <h5>Sección Video</h5>
                                    
                                 <div class="form-group">
                                     <label for="InputWidget">Orden</label>
                                     <input type="text" class="form-control" name="data[order]" id="video-order">
                                 </div>
             
                                 <div class="form-group">
                                     <label for="InputWidget">*Título</label>
                                     <textarea name="data[title]" id="video-title" cols="30" rows="5" class="form-control"></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="InputWidget">Subtítulo</label>
                                     <textarea name="data[subtitle]" id="video-subtitle" cols="30" rows="5" class="form-control"></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="InputWidget">Descripción</label>
                                     <textarea name="data[description]" id="video-description" cols="30" rows="10" class="form-control"></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="InputWidget">Video(Colocar solo la url de youtube)</label>
                                     <textarea name="data[video]" id="video-url" cols="30" rows="3" class="form-control"></textarea>
                                 </div>
             
                                 <div class="row" style="display: none" id="loading-video">
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
                                    <input type="hidden" name="data[widget_id]" id="modal-video-section_id" value="{{ $section_id }}">
                                    <input type="hidden" name="video_id" id="modal-video-widget_id" value="{{ (isset($query->id))? $query->id : 'null' }}">
                                    <input type="hidden" name="page_actual" id="modal-video-page_actual" value="{{$page}}">
                                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-video')">Cerrar</button>
                                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop