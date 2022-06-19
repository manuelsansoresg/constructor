@extends('adminlte::page')

@section('title', 'Carusel')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Sección carusel
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Páginas</a></li>
                        <li class="breadcrumb-item active">Carusel</li>
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
                        <form action="" id="frm-carusel" enctype="multipart/form-data">
                            {{-- contenido --}}

                            <h5>Sección carusel</h5>
                            <div class="form-group">
                                <label for="InputWidget">Orden</label>
                                <input type="text" class="form-control" name="order" id="carusel-order">
                            </div>

                            <div class="form-group">
                                <label for="InputWidget">Imagen1</label>
                                <input type="file" class="form-control" name="imagen1">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Imagen2</label>
                                <input type="file" class="form-control" name="imagen2">
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Imagen3</label>
                                <input type="file" class="form-control" name="imagen3">
                            </div>


                            <div class="row" style="display: none" id="loading-carusel">
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
                                <input type="hidden" name="widget_id" id="modal-carusel-section_id"
                                    value="{{ $section_id }}">
                                <input type="hidden" name="carusel_id" id="modal-carusel-widget_id"
                                    value="{{ (isset($query->id))? $query->id : 'null' }}">
                                <input type="hidden" name="page_actual" id="modal-carusel-page_actual"
                                    value="{{ $page }}">
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="closeModalSection('modal-widget-carusel')">Cerrar</button>
                                <button type="submit" class="btn btn-outline-primary">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
