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
                                        <li data-jstree='{ "selected" : {{ $selected }}}' > <a href="#" onclick="setPage('{{ $page->name }}')"> {{ $page->name }} </a>   </li>
                                    @endforeach
                                </ul>
                            </li>
                            </ul>
                        </div>

                        <div class="tree d-none">
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
                                        <a href="{{ $link_preview }}" target="_blank" class="btn btn-outline-primary"><i class="fas fa-eye"></i> Vista previa</a>
                                        <a href="#" data-toggle="modal" data-target="#pageModal" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Agregar página</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{-- tabs --}}
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link {{ $section_tab == '' || $section_tab == 1 ? 'active' : '' }}"  wire:click="setTab('1')"  id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Contenido</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link {{ $section_tab == '' || $section_tab == 2 ? 'active' : '' }}"  wire:click="setTab('2')"  id="fondo-tab" data-toggle="tab" href="#fondo" role="tab" aria-controls="fondo" aria-selected="false">Fondo</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                          <a class="nav-link {{ $section_tab == '' || $section_tab == 3 ? 'active' : '' }}"  wire:click="setTab('3')"  id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">SEO</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link {{ $section_tab == '' || $section_tab == 4 ? 'active' : '' }}"  wire:click="setTab('4')"  id="conf-tab" data-toggle="tab" href="#conf" role="tab" aria-controls="conf" aria-selected="false">Configuración</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade {{ $section_tab == '' || $section_tab == 1 ? 'show active' : '' }}" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                                                           <div class="text-center">
                                                                                <img src="{{ asset('files/' . $header->image) }}" alt="Profiler"
                                                                                class="preview_admin">
                                                                           </div>
                                                                            <div class="d-block mt-3">
                                                                                <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$header->id}}, 'Encabezado')">Borrar</button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-12 col-md-6 text-center">
                                                                        {!! $header->title !!}
                                                                    </div>
                                                                    <div class="col-12 col-md-2">
                                                                        <p>{!! $header->phone !!}</p>
                                                                        <p>{!! $header->phone2 !!}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mt-3 float-right">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-outline-primary" href="/admin/encabezado/{{$page_actual->id}}/{{ $header->id }}/edit">Editar</a>
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $header->id }}, 'Encabezado')">Borrar</button>
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
                                                                <div class="container">
                                                                    <div class="row">
                                                                        @if ($carusel_image->imagen1 != '')
                                                                        <div class="col-12 col-md-4">
                                                                            <img class="img-fluid" src="{{ asset('files/' . $carusel_image->imagen1) }}" alt="" />
                                                                            <div class="d-block mt-3">
                                                                                <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$carusel_image->id}}, 'Slider', 'imagen1')">Borrar</button>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        @if ($carusel_image->imagen2 != '')
                                                                        <div class="col-12 col-md-4">
                                                                            <img class="img-fluid" src="{{ asset('files/' . $carusel_image->imagen2) }}" alt="" />
                                                                            <div class="d-block mt-3">
                                                                                <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$carusel_image->id}}, 'Slider', 'imagen2')">Borrar</button>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        @if ($carusel_image->imagen3 != '')
                                                                        <div class="col-12 col-md-4">
                                                                            <img class="img-fluid" src="{{ asset('files/' . $carusel_image->imagen3) }}" alt="" />
                                                                            <div class="d-block mt-3">
                                                                                <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$carusel_image->id}}, 'Slider', 'imagen3')">Borrar</button>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                    </div>
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
                                                                <div class="form-group mt-5 float-right">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-outline-primary" href="/admin/carusel/{{$page_actual->id}}/{{ $carusel_image->id }}/edit">Editar</a>
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $carusel_image->id }}, 'Slider')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{-- carusel --}}

                                                {{-- title --}}
                                                @if ($my_widget['id_rel'] == 3)
                                                <?php $titles = $widget_builder->pageTitle($my_widget['widget_id'], 3) ?>
                                                    @foreach ($titles as $title)
                                                        <div class="card mt-5 shadow">
                                                            <div class="card-header">
                                                                <h5>Sección texto</h5>
                                                            </div>
                                                            <div class="card-body">
                                                                {!! $title->content !!}
                                                                <div class="form-group mt-5 float-right">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-outline-primary" href="/admin/texto/{{$page_actual->id}}/{{ $title->id }}/edit">Editar</a>
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $title->id }}, 'Texto')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{-- title --}}

                                                {{-- Two-columns --}}
                                                @if ($my_widget['id_rel'] == 4)
                                                <?php $two_columns = $widget_builder->pageTwoColumns($my_widget['widget_id'], 4) ?>
                                                    @foreach ($two_columns as $query)
                                                        <div class="card mt-5 shadow">
                                                            <div class="card-header">
                                                                <h5>Sección 2 columnas </h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                          <p>
                                                                           {!! $query->title !!}
                                                                        </p>
                                                                        <p>
                                                                           {!! $query->subtitle !!}
                                                                        </p>
<p>
                                                                           {!! $query->description !!}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <img src="{{ asset('files/'.$query->image) }}" class="img-fluid">
                                                                    </div>
                                                                </div>
                                                              <div class="form-group mt-5 float-right">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-outline-primary" href="/admin/two-columns/{{$page_actual->id}}/{{ $query->id }}/edit">Editar</a>
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $query->id }}, '2 columnas')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{-- Two-columns --}}

                                                {{-- patallax --}}
                                                @if ($my_widget['id_rel'] == 5)
                                                <?php $parallaxs = $widget_builder->pageParallax($my_widget['widget_id'], 5) ?>
                                                    @foreach ($parallaxs as $query)
                                                        <div class="card mt-5 shadow">
                                                            <div class="card-header">
                                                                <h5>Sección parallax </h5>
                                                            </div>
                                                            <div class="card-body">
                                                                @if ($query->image != '')
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-3 text-center">
                                                                            <img src="{{ asset('files/'.$query->image) }}" class="preview_admin">
                                                                            <div class="d-block mt-3">
                                                                                <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$query->id}}, 'Parallax', 'image')">Borrar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                              <div class="form-group mt-5 float-right">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-outline-primary" href="/admin/parallax/{{$page_actual->id}}/{{ $query->id }}/edit">Editar</a>
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $query->id }}, 'Parallax')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{-- /patallax --}}

                                                {{-- producto --}}
                                                @if ($my_widget['id_rel'] == 6)
                                                <?php $products = $widget_builder->pageProduct($my_widget['widget_id'], 6) ?>
                                                    @foreach ($products as $query)
                                                        <div class="card mt-5 shadow">
                                                            <div class="card-header">
                                                                <h5>Sección Producto </h5>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-12  text-center">
                                                                        <?php $get_elements = $widget_builder->elementsProduct($query->id) ?>
                                                               
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Imágen</th>
                                                                                        <th>Título</th>
                                                                                        <th>Precio</th>
                                                                                        <th>Descuento</th>
                                                                                        <th>Descripcion</th>
                                                                                        <th></th>
                                                                                    </th>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($get_elements as $element)
                                                                                    <tr>
                                                                                        <td>
                                                                                            @if ($element->image != '')
                                                                                                <img class="preview_admin" src="{{ asset('files/' . $element->image) }}" alt="" srcset="">
                                                                                            @endif
                                                                                        </td>
                                                                                        <td> <small>{{ $element->title }}</small> </td>
                                                                                        <td> <small>{{ $element->price }}</small> </td>
                                                                                        <td> <small>{{ $element->discount }}</small> </td>
                                                                                        <td> <small> {!! $element->description !!} </small> </td>
                                                                                        
                                                                                        <td>
                                                                                            <div class="col-12">
                                                                                                <a class="btn btn-outline-primary btn-block" onclick="editProduct(6, {{ $query->id }}, {{ $element->id }}, {{ $page_actual->id }})">Editar</a>
                                                                                            </div>
                                                                                            <div class="col-12 mt-3">
                                                                                                <button class="btn btn-outline-danger" wire:click="deleteElementProduct({{ $element->id }})">Borrar</button>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                    </div>
                                                                </div>
                                                              <div class="form-group mt-5 float-right">
                                                                    <div class="col-12">
                                                                        <button class="btn btn-outline-secondary" onclick="openModalAddElementProduct(6,{{ $query->id }}, {{ $page_actual->id }})">Agregar elemento</button>
                                                                        <a class="btn btn-outline-primary" href="/admin/producto/{{$page_actual->id}}/{{ $query->id }}/edit">Editar</a>
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $query->id }}, 'Productos')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{-- /producto --}}

                                                {{--  video --}}
                                                @if ($my_widget['id_rel'] == 7)
                                                <?php $video = $widget_builder->pageVideo($my_widget['widget_id'], 7) ?>
                                                    @foreach ($video as $query)
                                                        <div class="card mt-5 shadow">
                                                            <div class="card-header">
                                                                <h5>Sección video </h5>
                                                            </div>
                                                            <div class="card-body">
                                                               <div class="row">
                                                                   <div class="col-12">
                                                                    <p>
                                                                        {!! $query->title !!}
                                                                     </p>
                                                                    <p>
                                                                        {!! $query->subtitle !!}
                                                                     </p>
                                                                    <p>
                                                                        {!! $query->description !!}
                                                                     </p>
                                                                    <p>
                                                                        {!! $query->video !!}
                                                                     </p>
                                                                   </div>
                                                               </div>
                                                              <div class="form-group mt-5 float-right">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-outline-primary" href="/admin/video/{{$page_actual->id}}/{{ $query->id }}/edit">Editar</a>
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $query->id }}, 'Video')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{--  /video --}}
                                                {{--  galeria --}}
                                                @if ($my_widget['id_rel'] == 8)
                                                <?php $galeria = $widget_builder->pageGallery($my_widget['widget_id'], 8) ?>
                                                    @foreach ($galeria as $query)
                                                        <div class="card mt-5 shadow">
                                                            <div class="card-header">
                                                                <h5>Sección galería </h5>
                                                            </div>
                                                            <div class="card-body">
                                                               <div class="row">
                                                                @if ($query->imagen1 != '')
                                                                <div class="col-12 col-md-4">
                                                                    <img class="img-fluid" src="{{ asset('files/' . $query->imagen1) }}" alt="" />
                                                                    <div class="d-block mt-3">
                                                                        <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$query->id}}, 'Galería', 'imagen1')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($query->imagen2 != '')
                                                                <div class="col-12 col-md-4">
                                                                    <img class="img-fluid" src="{{ asset('files/' . $query->imagen2) }}" alt="" />
                                                                    <div class="d-block mt-3">
                                                                        <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$query->id}}, 'Galería', 'imagen2')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($query->imagen3 != '')
                                                                <div class="col-12 col-md-4">
                                                                    <img class="img-fluid" src="{{ asset('files/' . $query->imagen3) }}" alt="" />
                                                                    <div class="d-block mt-3">
                                                                        <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$query->id}}, 'Galería', 'imagen3')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($query->imagen4 != '')
                                                                <div class="col-12 col-md-4">
                                                                    <img class="img-fluid" src="{{ asset('files/' . $query->imagen4) }}" alt="" />
                                                                    <div class="d-block mt-3">
                                                                        <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$query->id}}, 'Galería', 'imagen4')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($query->imagen5 != '')
                                                                <div class="col-12 col-md-4">
                                                                    <img class="img-fluid" src="{{ asset('files/' . $query->imagen5) }}" alt="" />
                                                                    <div class="d-block mt-3">
                                                                        <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$query->id}}, 'Galería', 'imagen5')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if ($query->imagen6 != '')
                                                                <div class="col-12 col-md-4">
                                                                    <img class="img-fluid" src="{{ asset('files/' . $query->imagen6) }}" alt="" />
                                                                    <div class="d-block mt-3">
                                                                        <button class="btn btn-outline-danger btn-block" wire:click="deleteImage({{$query->id}}, 'Galería', 'imagen6')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                               </div>
                                                              <div class="form-group mt-5 float-right">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-outline-primary" href="/admin/galeria/{{$page_actual->id}}/{{ $query->id }}/edit">Editar</a>
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $query->id }}, 'Galería')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{--  /galeria --}}
                                                {{--  contacto --}}
                                                @if ($my_widget['id_rel'] == 9)
                                                <?php $contacto = $widget_builder->pageContact($my_widget['widget_id'], 9) ?>
                                                    @foreach ($contacto as $query)
                                                    <div class="card mt-5 shadow">
                                                        <div class="card-header">
                                                            <h5>Sección contacto </h5>
                                                        </div>
                                                        <div class="card-body">
                                                           <div class="row">
                                                               <?php $get_elements = $widget_builder->elementsContact($query->id) ?>
                                                               
                                                                   <table class="table">
                                                                       <thead>
                                                                           <tr>
                                                                               <th>Nombre</th>
                                                                               <th>Leyenda</th>
                                                                               <th>Requerido</th>
                                                                               <th></th>
                                                                           </th>
                                                                       </thead>
                                                                       <tbody>
                                                                        @foreach ($get_elements as $element)
                                                                        <tr>
                                                                            <td> {{ $element->name }} </td>
                                                                            <td> {{ $element->placeholder }} </td>
                                                                            <td> 
                                                                                @if ($element->required === 1)
                                                                                <span class="badge badge-success">Sí</span>
                                                                                @else
                                                                                <span class="badge badge-danger">No</span>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn btn-outline-danger" wire:click="deleteElementContact({{ $element->id }})">Borrar </button>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                       </tbody>
                                                                   </table>
                                                                </div>
                                                                <div class="form-group mt-5 float-right">
                                                                    <div class="col-12">
                                                                        <button class="btn btn-outline-secondary" onclick="openModalAddElementContact(9,{{ $query->id }}, {{ $page_actual->id }})">Agregar elemento</button>
                                                                        <a class="btn btn-outline-primary" href="/admin/contacto/{{$page_actual->id}}/{{ $query->id }}/edit">Editar</a>
                                                                        <button class="btn btn-outline-danger" wire:click="deleteWidget({{ $query->id }}, 'Contacto')">Borrar</button>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @endif
                                                {{--  contacto --}}

                                            @endforeach
                                            {{-- mywidgets --}}
                                        </div>
                                        <div class="tab-pane fade {{ $section_tab == '' || $section_tab == 2 ? 'show active' : '' }}" id="fondo" role="tabpanel" aria-labelledby="fondo-tab">fondo</div>
                                        <div class="tab-pane fade {{ $section_tab == '' || $section_tab == 3 ? 'show active' : '' }}" id="seo" role="tabpanel" aria-labelledby="seo-tab">seo</div>
                                        <div class="tab-pane fade {{ $section_tab == '' || $section_tab == 4 ? 'show active' : '' }}" id="conf" role="tabpanel" aria-labelledby="conf-tab">
                                            <div class="card mt-5">
                                                <div class="card-header"> <h5>Footer</h5></div>
                                                <div class="card-body">
                                                    <form action=""  wire:submit.prevent="storeConfig(2)">
                                                        <div class="form-group">
                                                            <label for="InputWidget">Color Letra</label>
                                                            <input type="color" wire:model="builder.color_footer">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputWidget">Color fondo</label>
                                                            <input type="color" wire:model="builder.background_footer">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputWidget">Mostrar footer</label>
                                                            <input type="checkbox" wire:model="builder.show_footer" value="1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputWidget">Mostrar fb</label>
                                                            <input type="checkbox" wire:model="builder.show_facebook" value="1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputWidget">Mostrar twitter</label>
                                                            <input type="checkbox" wire:model="builder.show_twitter" value="1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputWidget">Mostrar instagram</label>
                                                            <input type="checkbox" wire:model="builder.show_instagram" value="1">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputWidget">Mostrar youtube</label>
                                                            <input type="checkbox" wire:model="builder.show_youtube" value="1">
                                                        </div>
                                                       
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
    @include('modal_image')
    @include('modal_add_element_contact')
    @include('modal_add_element_product')
    <a href="#" onclick="modalSection()" class="btn-flotante btn btn-primary btn-circle mt-5"><i class="fas fa-plus"></i></a>
</div>
