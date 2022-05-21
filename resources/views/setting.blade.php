@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1>Configuración</h1>
            </div>
        </div>
    @stop

    @section('content')
        <div>
            <div class="container-fluid">
                <div class="row justify-content-center mt-3">
                    <div class="col-12 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" id="frm-settings">
                                    <div class="form-group">
                                        <label for="InputWidget">Correo</label>
                                        <input type="email" class="form-control" name="data[correo]" value="{{ $my_setting->correo }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputWidget">Teléfono 1</label>
                                        <input type="text" class="form-control" name="data[telefono]" value="{{ $my_setting->telefono }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputWidget">Teléfono 2</label>
                                        <input type="text" class="form-control" name="data[telefono2]" value="{{ $my_setting->telefono2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputWidget">Derechos reservados</label>
                                        <input type="text" class="form-control" name="data[leyenda_footer]" id="config-derechos" >
                                        <input type="hidden"  value="{!!  $my_setting->leyenda_footer !!}" id="content-config-derechos" >

                                    </div>
                                    <div class="form-group">
                                        <label for="InputWidget">Facebook</label>
                                        <input type="text" class="form-control" name="data[fb]" value="{{ $my_setting->fb }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputWidget">Instagram</label>
                                        <input type="text" class="form-control" name="data[instagram]" value="{{ $my_setting->instagram }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="InputWidget">Youtube</label>
                                        <input type="text" class="form-control" name="data[youtube]" value="{{ $my_setting->youtube }}">
                                    </div>

                                    <div class="row" style="display: none" id="loading-setting">
                                        <div class="col-12 text-center">
                                            <div>
                                                <div class="fa-3x">
                                                    <i class="fas fa-circle-notch fa-spin"></i>
                                                </div>
                                            </div>
                
                                        </div>
                                    </div>

                                    <div class="form-group mt-5 float-right">
                                        <div class="col-12">
                                            <button class="btn btn-outline-primary">Guardar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @stop



    @section('js')
    @stop
