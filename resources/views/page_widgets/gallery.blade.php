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
                                <div class="alert alert-warning" role="alert">
                                    <small>Los campos de alineacion solo serviran para pantallas que no sean de celular. la pantalla de columnas totales de la pantalla son 12
                                        
                                        <br>
                                        Ejemplo: si elije que la imagen contenta 2 equivaldra al ancho de 2 columnas.
                                    </small>
                                </div>
                               <div class="form-group">
                                <label for="InputWidget">Orden</label>
                                <input type="text" class="form-control" name="order" id="gallery-order">
                            </div>
        
                            <h5>Sección galería</h5>
                            @if ($query->imagen1 != '')
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{ asset('files/' . $query->imagen1) }}" alt="" />
                                <div class="d-block mt-3">
                                    <button type="button" class="btn btn-outline-danger btn-block" onclick="deleteImage({{$query->id}}, 'Galería', 'imagen1')">Borrar</button>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <label for="InputWidget">Imagen1</label>
                                <input type="file" class="form-control" name="imagen1">
                            </div>
                            @endif
                           
                            <div class="form-group">
                                <label for="InputWidget">Tamaño de columna Imagen1</label>
                                <select name="data[size_col_image1]" id="gallery-size_col_image1" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    <option value="col-md-1">1</option>
                                    <option value="col-md-2">2</option>
                                    <option value="col-md-3">3</option>
                                    <option value="col-md-4">4</option>
                                    <option value="col-md-5">5</option>
                                    <option value="col-md-6">6</option>
                                    <option value="col-md-7">7</option>
                                    <option value="col-md-8">8</option>
                                    <option value="col-md-9">9</option>
                                    <option value="col-md-10">10</option>
                                    <option value="col-md-11">11</option>
                                    <option value="col-md-12">12</option>
                                </select>
                            </div>
                                
                            
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen1</label>
                                <input type="text" class="form-control" name="data[linkimagen1]" value="{{ isset($query->linkimagen1) ? $query->linkimagen1 : null }}">
                            </div>
                            @if ($query->imagen2 != '')
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{ asset('files/' . $query->imagen2) }}" alt="" />
                                <div class="d-block mt-3">
                                    <button type="button" class="btn btn-outline-danger btn-block" onclick="deleteImage({{$query->id}}, 'Galería', 'imagen2')">Borrar</button>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <label for="InputWidget">Imagen2</label>
                                <input type="file" class="form-control" name="imagen2">
                            </div>
                            @endif
                            
                            <div class="form-group">
                                <label for="InputWidget">Tamaño de columna Imagen1</label>
                                <select name="data[size_col_image2]" id="gallery-size_col_image2" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    <option value="col-md-1">1</option>
                                    <option value="col-md-2">2</option>
                                    <option value="col-md-3">3</option>
                                    <option value="col-md-4">4</option>
                                    <option value="col-md-5">5</option>
                                    <option value="col-md-6">6</option>
                                    <option value="col-md-7">7</option>
                                    <option value="col-md-8">8</option>
                                    <option value="col-md-9">9</option>
                                    <option value="col-md-10">10</option>
                                    <option value="col-md-11">11</option>
                                    <option value="col-md-12">12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen2</label>
                                <input type="text" class="form-control" name="data[linkimagen2]" value="{{ isset($query->linkimagen2) ? $query->linkimagen2 : null }}">
                            </div>
                            @if ($query->imagen3 != '')
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{ asset('files/' . $query->imagen3) }}" alt="" />
                                <div class="d-block mt-3">
                                    <button type="button" class="btn btn-outline-danger btn-block" onclick="deleteImage({{$query->id}}, 'Galería', 'imagen3')">Borrar</button>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <label for="InputWidget">Imagen3</label>
                                <input type="file" class="form-control" name="imagen3">
                            </div>
                            @endif
                           
                            <div class="form-group">
                                <label for="InputWidget">Tamaño de columna Imagen1</label>
                                <select name="data[size_col_image3]" id="gallery-size_col_image3" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    <option value="col-md-1">1</option>
                                    <option value="col-md-2">2</option>
                                    <option value="col-md-3">3</option>
                                    <option value="col-md-4">4</option>
                                    <option value="col-md-5">5</option>
                                    <option value="col-md-6">6</option>
                                    <option value="col-md-7">7</option>
                                    <option value="col-md-8">8</option>
                                    <option value="col-md-9">9</option>
                                    <option value="col-md-10">10</option>
                                    <option value="col-md-11">11</option>
                                    <option value="col-md-12">12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen3</label>
                                <input type="text" class="form-control" name="data[linkimagen3]" value="{{ isset($query->linkimagen3) ? $query->linkimagen3 : null }}">
                            </div>
                            @if ($query->imagen4 != '')
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{ asset('files/' . $query->imagen4) }}" alt="" />
                                <div class="d-block mt-3">
                                    <button type="button" class="btn btn-outline-danger btn-block" onclick="deleteImage({{$query->id}}, 'Galería', 'imagen4')">Borrar</button>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <label for="InputWidget">Imagen4</label>
                                <input type="file" class="form-control" name="imagen4">
                            </div>
                            @endif
                           
                            <div class="form-group">
                                <label for="InputWidget">Tamaño de columna Imagen1</label>
                                <select name="data[size_col_image4]" id="gallery-size_col_image4" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    <option value="col-md-1">1</option>
                                    <option value="col-md-2">2</option>
                                    <option value="col-md-3">3</option>
                                    <option value="col-md-4">4</option>
                                    <option value="col-md-5">5</option>
                                    <option value="col-md-6">6</option>
                                    <option value="col-md-7">7</option>
                                    <option value="col-md-8">8</option>
                                    <option value="col-md-9">9</option>
                                    <option value="col-md-10">10</option>
                                    <option value="col-md-11">11</option>
                                    <option value="col-md-12">12</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen4</label>
                                <input type="text" class="form-control" name="data[linkimagen4]" value="{{ isset($query->linkimagen4) ? $query->linkimagen4 : null }}">
                            </div>
                            @if ($query->imagen5 != '')
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{ asset('files/' . $query->imagen5) }}" alt="" />
                                <div class="d-block mt-3">
                                    <button type="button" class="btn btn-outline-danger btn-block" onclick="deleteImage({{$query->id}}, 'Galería', 'imagen5')">Borrar</button>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <label for="InputWidget">Imagen5</label>
                                <input type="file" class="form-control" name="imagen5">
                            </div>
                            @endif
                            
                            <div class="form-group">
                                <label for="InputWidget">Tamaño de columna Imagen1</label>
                                <select name="data[size_col_image5]" id="gallery-size_col_image5" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    <option value="col-md-1">1</option>
                                    <option value="col-md-2">2</option>
                                    <option value="col-md-3">3</option>
                                    <option value="col-md-4">4</option>
                                    <option value="col-md-5">5</option>
                                    <option value="col-md-6">6</option>
                                    <option value="col-md-7">7</option>
                                    <option value="col-md-8">8</option>
                                    <option value="col-md-9">9</option>
                                    <option value="col-md-10">10</option>
                                    <option value="col-md-11">11</option>
                                    <option value="col-md-12">12</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="InputWidget">Enlace imagen5</label>
                                <input type="text" class="form-control" name="data[linkimagen5]" value="{{ isset($query->linkimagen5) ? $query->linkimagen5 : null }}">
                            </div>
                            @if ($query->imagen6 != '')
                            <div class="col-12 col-md-4">
                                <img class="img-fluid" src="{{ asset('files/' . $query->imagen6) }}" alt="" />
                                <div class="d-block mt-3">
                                    <button type="button" class="btn btn-outline-danger btn-block" onclick="deleteImage({{$query->id}}, 'Galería', 'imagen6')">Borrar</button>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <label for="InputWidget">Imagen6</label>
                                <input type="file" class="form-control" name="imagen6">
                            </div>
                            @endif
                           
                            <div class="form-group">
                                <label for="InputWidget">Tamaño de columna Imagen1</label>
                                <select name="data[size_col_image6]" id="gallery-size_col_image6" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    <option value="col-md-1">1</option>
                                    <option value="col-md-2">2</option>
                                    <option value="col-md-3">3</option>
                                    <option value="col-md-4">4</option>
                                    <option value="col-md-5">5</option>
                                    <option value="col-md-6">6</option>
                                    <option value="col-md-7">7</option>
                                    <option value="col-md-8">8</option>
                                    <option value="col-md-9">9</option>
                                    <option value="col-md-10">10</option>
                                    <option value="col-md-11">11</option>
                                    <option value="col-md-12">12</option>
                                </select>
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
