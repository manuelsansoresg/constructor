@extends('adminlte::page')

@section('title', 'Dominios')

@section('content_header')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1>Dominios</h1>
            </div>
        </div>
    @stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="col-12" id="create-domain">
                        <a href="/admin/domains/create" class="btn btn-primary float-right">Crear un dominio</a>
                    </div>
                    <div class="col-12 py-4"> &nbsp;
                    </div>
                    <table id="dt-domains" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($domains as $domain)
                          <tr>
                            <td>{{ $domain->name }}</td>
                            <td>
                                <a href="/admin/domains/{{ $domain->id }}/edit" class="btn btn-primary btn-sm text-white"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="deleteDomain({{ $domain->id }})" class="btn btn-danger btn-sm text-white"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {{-- <form action="" method="post" id="frm-domains" enctype="multipart/form-data">
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
    @include('modal_select_domain')
@stop