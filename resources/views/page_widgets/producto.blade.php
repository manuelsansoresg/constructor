@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        Sección producto
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/home">Páginas</a></li>
                        <li class="breadcrumb-item active">PRODUCTO</li>
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
                        <form action="" id="frm-product">
                            <h5>Sección Producto</h5>

                            <div class="form-group">
                                <label for="InputWidget">Orden</label>
                                <input type="text" class="form-control" name="data[order]" id="product-order">
                            </div>
                                    
                            <div class="form-group">
                                <label for="InputWidget">Nombre</label>
                                <input type="text" class="form-control" name="data[name]" id="product-name">
                                <small>Este nombre solo servira para identificar al contenedor donde se agregaran los productos</small>
                            </div>

                            <div class="row" style="display: none" id="loading-product">
                                <div class="col-12 text-center">
                                    <div>
                                        <div class="fa-3x">
                                            <i class="fas fa-circle-notch fa-spin"></i>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="data[widget_id]" id="modal-product-section_id" value="{{ $section_id }}">
                                <input type="hidden" name="product_id" id="modal-product-widget_id" value="{{ (isset($query->id))? $query->id : 'null' }}">
                                <input type="hidden" name="page_actual" id="modal-product-page_actual" value="{{$page}}">
                                <a type="button" href="/admin/home" class="btn btn-outline-secondary" >Cerrar</a>
                                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        
@stop

