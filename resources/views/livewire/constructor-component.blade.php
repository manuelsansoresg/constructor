@inject('widget_builder', 'App\Models\WidgetBuilder')
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="tree">
                            <ul>
                            <li  data-jstree='{"opened" : true }'> Páginas
                                <ul>
                                    <?php $cont = 0; ?>
                                    @foreach ($pages as $page)
                                        <?php $cont = $cont +1; ?>
                                        <?php $selected = ($page->name == $page_actual) ? 'true' : 'false'; ?>
                                        <li data-jstree='{ "selected" : {{ $selected }}}'> {{ $page->name }} </li>
                                    @endforeach
                                </ul>
                            </li>
                            </ul>
                        </div>
                        
                        <div class="tree">
                            <ul>
                            <li  data-jstree='{"opened" : true }'> Templates
                                <ul>
                                    <li>
                                       
                                    </li>
                                </ul>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="row mb-2">
                                <div class="col-12 col-md-5">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                                        <li class="breadcrumb-item active">Editar</li>
                                    </ol>
                                </div>
                                <div class="col-12 col-md-7 py-3 py-md-0 align-self-center">
                                    <div class="float-right">
                                        <a href="" class="btn btn-outline-primary"><i class="fas fa-eye"></i> Vista previa</a>
                                        <a href="#" data-toggle="modal" data-target="#pageModal" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Agregar página</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{-- tabs --}}
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Contenido</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link" id="fondo-tab" data-toggle="tab" href="#fondo" role="tab" aria-controls="fondo" aria-selected="false">Fondo</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">SEO</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link" id="configuracion-tab" data-toggle="tab" href="#configuracion" role="tab" aria-controls="configuracion" aria-selected="false">Configuración</a>
                                        </li>
                                      </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            {{-- mywidgets --}}
                                            @foreach ($my_widgets as $my_widget)
                                                <?php $headers = $widget_builder->pageHeader($my_widget['widget_id'], 1) ?>
                                                @if ($headers != null)
                                                    @foreach ($headers as $header)
                                                        <div class="card mt-5 shadow">
                                                            <div class="card-header">
                                                                <h5>Sección encabezado</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-3">
                                                                        <img src="{{ asset('storage/files/' . $header->image) }}" alt="Profiler"
                                                                        class="img-fluid">
                                    
                                                                    </div>
                                                                    <div class="col-12 col-md-6 text-center">
                                                                        {{ $header->title}}
                                                                    </div>
                                                                    <div class="col-12 col-md-2">
                                                                        <p>{{ $header->phone}}</p>
                                                                        <p>{{ $header->phone2}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mt-3 float-right">
                                                                    <div class="col-12">
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $header->id }}, 1)">Borrar</button>
                                                                        <button class="btn btn-outline-primary" wire:click='storeHeader()'>Editar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            {{-- mywidgets --}}
                                            {{-- seccion Encabezado --}}
                                            @if ($widget == 1)
                                                <div id="widget-header"></div>
                                                <div class="card mt-5 shadow">
                                                    <div class="card-header">
                                                        <h5>Sección encabezado</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="InputWidget">Imagen</label>
                                                            <input type="file" class="form-control" wire:model='header_imagen'>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputWidget">*Título</label>
                                                            <input type="text" class="form-control" wire:model='header.title'>
                                                            @error('header.title')
                                                            <div class="row">
                                                                <span class="text-danger"> {{ $message }} </span>
                                                            </div>
                                                            @enderror
                    
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputWidget">Teléfono 1</label>
                                                            <input type="text" class="form-control" wire:model='header.phone'>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputWidget">Teléfono 2</label>
                                                            <input type="text" class="form-control" wire:model='header.phone2'>
                                                        </div>

                                                        <div class="row ">
                                                            <div class="col-12 text-center">
                                                                <div wire:loading wire:target="storeHeader">
                                                                    <div class="fa-3x">
                                                                        <i class="fas fa-circle-notch fa-spin"></i>
                                                                    </div>
                                                                </div>
                                
                                                            </div>
                                                        </div>
                                
                                                        <div class="form-group float-right">
                                                            <button class="btn btn-outline-danger" wire:click="resetWidget">Cancelar</button>
                                                            <button class="btn btn-outline-primary" wire:click='storeHeader()'>Guardar</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            @endif
                                            {{-- /seccion Encabezado --}}
                                            
                                        </div>
                                        <div class="tab-pane fade" id="fondo" role="tabpanel" aria-labelledby="fondo-tab">...</div>
                                        <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">...</div>
                                        <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="configuracion-tab">...</div>
                                    </div>
                                    {{-- tabs --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
@include('page_modal')
@include('section_modal')
    <a href="#" onclick="modalSection()" class="btn-flotante"><i class="fas fa-plus"></i>Agregar sección</a>
</div>
