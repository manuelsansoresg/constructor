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
                                           
                                            @if ($my_widget['id_rel'] == 1)
                                                <?php $headers = $widget_builder->pageHeader($my_widget['widget_id'], 1) ?>
                                                    @foreach ($headers as $header)
                                                        <div class="card mt-5 shadow">
                                                            <div class="card-header">
                                                                <h5>Sección encabezado</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @if ($header->image != '')
                                                                        <div class="col-12 col-md-3">
                                                                            <img src="{{ asset('files/' . $header->image) }}" alt="Profiler"
                                                                            class="preview_admin">
                                        
                                                                        </div>
                                                                    @endif
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
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $header->id }}, 'Encabezado')">Borrar</button>
                                                                        <button class="btn btn-outline-primary" wire:click='editWidget({{ $header->id }}, "Encabezado")'>Editar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{-- carusel --}}
                                                @if ($my_widget['id_rel'] == 2)
                                                    <?php $carusel_images = $widget_builder->pageCarusel($my_widget['widget_id'], 2) ?>
                                                    
                                                    @foreach ($carusel_images as $carusel_image)
                                                        <div class="card mt-5 shadow">
                                                            <div class="card-header">
                                                                <h5>Sección carusel</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    @if ($carusel_image->imagen1 != '')
                                                                    <div class="col-12 col-md-3">
                                                                        <img class="img-fluid" src="{{ asset('files/' . $carusel_image->imagen1) }}" alt="" />
                                                                    </div>
                                                                    @endif
                                                                    @if ($carusel_image->imagen2 != '')
                                                                    <div class="col-12 col-md-3">
                                                                        <img class="img-fluid" src="{{ asset('files/' . $carusel_image->imagen2) }}" alt="" />
                                                                    </div>
                                                                    @endif
                                                                    @if ($carusel_image->imagen3 != '')
                                                                    <div class="col-12 col-md-3">
                                                                        <img class="img-fluid" src="{{ asset('files/' . $carusel_image->imagen3) }}" alt="" />
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                
                                                                <div class="owl-carousel owl-theme owl-loaded owl-drag d-none">
                                                                    
                                                                        <div class="item">
                                                                            
                                                                            <div class="inner">
                                                                                <div class="row row-content">
                                                                                    <div class="col-md-12">
                                                                                        <div class="headline-wrap">
                                                                                            {{-- <h1><span class="reveal-text">H1 TITLE</span></h1>
                                                                                            <h2><span class="reveal-text">H2 TITLE</span></h2> --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row row-cta">
                                                                                    <div class="col-md-12 cta-wrap">
                                                                                        {{-- <a class="cta-main"><span class="cta-text reveal-text">CTA-MAIN</span></a> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                    @if ($carusel_image->imagen2 != '')
                                                                        <div class="item">
                                                                            <img src="{{ asset('files/' . $carusel_image->imagen2) }}" alt="" />
                                                                            <div class="inner">
                                                                                <div class="row row-content">
                                                                                    <div class="col-md-12">
                                                                                        <div class="headline-wrap">
                                                                                           {{--  <h1><span class="reveal-text">H1 TITLE</span></h1>
                                                                                            <h2><span class="reveal-text">H2 TITLE</span></h2> --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row row-cta">
                                                                                    <div class="col-md-12 cta-wrap">
                                                                                        {{-- <a class="cta-main"><span class="cta-text reveal-text">CTA-MAIN</span></a> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($carusel_image->imagen3 != '')
                                                                        <div class="item">
                                                                            <img src="{{ asset('files/' . $carusel_image->imagen3) }}" alt="" />
                                                                            <div class="inner">
                                                                                <div class="row row-content">
                                                                                    <div class="col-md-12">
                                                                                        <div class="headline-wrap">
                                                                                           {{--  <h1><span class="reveal-text">H1 TITLE</span></h1>
                                                                                            <h2><span class="reveal-text">H2 TITLE</span></h2> --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row row-cta">
                                                                                    <div class="col-md-12 cta-wrap">
                                                                                        {{-- <a class="cta-main"><span class="cta-text reveal-text">CTA-MAIN</span></a> --}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group mt-3 float-right">
                                                                    <div class="col-12">
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $carusel_image->id }}, 'Slider')">Borrar</button>
                                                                        <button class="btn btn-outline-primary" wire:click='editWidget({{ $carusel_image->id }}, "Slider")'>Editar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{-- carusel --}}
                                                
                                            @endforeach
                                            {{-- mywidgets --}}
                                            {{-- -------------------------- seccion para editar  --------------------- --}}
                                            {{-- seccion Encabezado --}}
                                            @if ($widget == 1)
                                                <div id="widget-header"></div>
                                                <div class="card mt-5 shadow">
                                                    <div class="card-header">
                                                        <h5>Sección encabezado</h5>
                                                    </div>
                                                    <div class="card-body">

                                                        @if ($header['image'] != null)
                                                           <div class="row justify-content-center">
                                                               <div class="col-12 col-md-3">
                                                                    <img src="{{ asset('files/' . $header['image']) }}" alt="Profiler"
                                                                    class="preview_admin">
                                                                    
                                                               </div>
                                                           </div>
                                                           <div class="row justify-content-center">
                                                                <div class="col-12 mt-3 text-right">
                                                                    <button class="btn btn-danger text-center" wire:click="deleteImage({{ $header['id'] }}, 'Encabezado' )">Borrar</button>
                                                                </div>
                                                           </div>
                                                           @else
                                                            <div class="form-group">
                                                                <label for="InputWidget">Imagen</label>
                                                                <input type="file" class="form-control" wire:model='header_imagen'>
                                                            </div>
                                                        @endif
                                                        
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

                                            {{-- seccion carrusel --}}
                                            @if ($widget == 2)
                                            <div id="widget-carusel"></div>
                                            <div class="card mt-5 shadow">
                                                <div class="card-header">
                                                    <h5>Sección encabezado</h5>
                                                </div>
                                                <div class="card-body">
                                                    @if ($carusel['imagen1'] != null)
                                                        <div class="row justify-content-center">
                                                            <div class="col-12 col-md-3">
                                                                <img src="{{ asset('files/' . $carusel['imagen1']) }}" alt="Profiler"
                                                                class="preview_admin">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center">
                                                            <div class="col-12 mt-3 text-right">
                                                                <button class="btn btn-danger text-center" wire:click="deleteImage({{ $carusel['id'] }}, 'Slider', 'imagen1')">Borrar</button>
                                                            </div>
                                                       </div>
                                                        @else 
                                                            <div class="form-group">
                                                                <label for="InputWidget">Imagen1</label>
                                                                <input type="file" class="form-control" wire:model='carusel_imagen1'>
                                                            </div>
                                                    @endif
                                                    
                                                    @if ($carusel['imagen2'] != null)
                                                        <div class="row justify-content-center">
                                                            <div class="col-12 col-md-3">
                                                                <img src="{{ asset('files/' . $carusel['imagen2']) }}" alt="Profiler"
                                                                class="preview_admin">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center">
                                                            <div class="col-12 mt-3 text-right">
                                                                <button class="btn btn-danger text-center" wire:click="deleteImage({{ $carusel['id'] }}, 'Slider', 'imagen2')">Borrar</button>
                                                            </div>
                                                       </div>
                                                        @else 
                                                            <div class="form-group">
                                                                <label for="InputWidget">Imagen2</label>
                                                                <input type="file" class="form-control" wire:model='carusel_imagen2'>
                                                            </div>
                                                    @endif
                                                    
                                                    @if ($carusel['imagen3'] != null)
                                                        <div class="row justify-content-center">
                                                            <div class="col-12 col-md-3">
                                                                <img src="{{ asset('files/' . $carusel['imagen3']) }}" alt="Profiler"
                                                                class="preview_admin">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center">
                                                            <div class="col-12 mt-3 text-right">
                                                                <button class="btn btn-danger text-center" wire:click="deleteImage({{ $carusel['id'] }}, 'Slider', 'imagen3')">Borrar</button>
                                                            </div>
                                                       </div>
                                                        @else 
                                                            <div class="form-group">
                                                                <label for="InputWidget">Imagen3</label>
                                                                <input type="file" class="form-control" wire:model='carusel_imagen3'>
                                                            </div>
                                                    @endif
                                                   
                                                    
                                                   
                                                    <div class="row ">
                                                        <div class="col-12 text-center">
                                                            <div wire:loading wire:target="storeCarusel">
                                                                <div class="fa-3x">
                                                                    <i class="fas fa-circle-notch fa-spin"></i>
                                                                </div>
                                                            </div>
                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group float-right">
                                                        <button class="btn btn-outline-danger" wire:click="resetWidget">Cancelar</button>
                                                        <button class="btn btn-outline-primary" wire:click='storeCarusel()'>Guardar</button>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            @endif
                                            {{-- seccion carrusel --}}
                                            
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
    <a href="#" onclick="modalSection()" class="btn-flotante btn btn-primary btn-circle mt-5"><i class="fas fa-plus"></i></a>
</div>