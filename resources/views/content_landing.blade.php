@extends('layouts.app')

@section('title', $page_actual != null ? $page_actual->seo_title : '')
@section('description', $page_actual != null ? $page_actual->seo_description : '')
@section('keywords', $page_actual != null ? $page_actual->seo_keyword : '')
@section('image', $my_setting != null ? asset('files/' . $my_setting->image) : '')
@section('favicon', $my_setting != null ? asset('files/' . $my_setting->favicon) : '')

@section('content')

@section('background', 'background-color :' . $page_actual->color . ' !important')

@inject('widget_builder', 'App\Models\WidgetBuilder')
@inject('builder', 'App\Models\Builder')
@inject('setting', 'App\Models\Setting')
@if ($page_actual->show_menu == 1)
    {{-- landing --}}
    <nav class="navbar navbar-expand-sm bg-dark bg-default navbar-dark justify-content-end"
        style="background-color: {{ $page_actual->background_menu }} !important; color:{{ $page_actual->color_text_menu }} !important">
        <a class="navbar-brand" href="/">
            @if ($page_actual->show_logo_menu === 1)
                <img class="logo" src="{{ asset('files/' . $my_setting->image) }}" alt="">
            @endif
        </a>
        <div class="ml-auto mr-2"></div>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse flex-grow-0 collapse" id="navbarSupportedContent" style="">
            <ul class="navbar-nav text-center text-md-right">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Inicio</a>
                </li>
                @foreach ($pages as $get_page)
                    <li class="nav-item active">
                        <a class="nav-link" href="/{{ $get_page->slug }}"> {{ $get_page->name }} </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
    {{-- landing --}}
@endif

<div>
    {{-- widgets --}}


    @foreach ($my_widgets as $my_widget)
        @if ($my_widget['id_rel'] == 1)
            <?php $headers = $widget_builder->pageHeader($my_widget['widget_id'], 1); ?>
            @foreach ($headers as $header)
            <div class="container py-3">
                <div class="row">
                    <div class="col-12 ">
                        <div class="col-12 d-flex justify-content-center flex-wrap">
                            @if ($header->image != '')
                                <div class="col-12 col-md-3 text-center text-md-left">
                                    <img src="{{ asset('files/' . $header->image) }}" alt="Profiler"
                                        class="img-fluid">
                                </div>
                                <div class="col-12 col-md-6 text-center title-header">
                                    {!! $header->title !!}
                                </div>
                                <div class="col-12 col-md-2 text-center text-md-left title-header">
                                    <p>{!! $header->phone !!}</p>
                                    <p>{!! $header->phone2 !!}</p>
                                </div>
                             @endif
                        </div>
                    </div>
                </div>
            </div>
                {{-- <div class="container">
                    <div class="row">
                        @if ($header->image != '')
                            <div class="col-12 col-md-3 text-center text-md-left">
                                <img src="{{ asset('files/' . $header->image) }}" alt="Profiler"
                                    class="img-fluid">
                            </div>
                        @endif
                        <div class="col-12 col-md-6 text-center">
                            {!! $header->title !!}
                        </div>
                        <div class="col-12 col-md-2 text-center text-md-left">
                            <p>{!! $header->phone !!}</p>
                            <p>{!! $header->phone2 !!}</p>
                        </div>
                    </div>
                </div> --}}
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 2)
            <?php $carusel_images = $widget_builder->pageCarusel($my_widget['widget_id'], 2); ?>
            @foreach ($carusel_images as $carusel_image)
                <div class="owl-carousel owl-theme owl-loaded owl-drag">

                    <div class="item">
                        <img src="{{ asset('files/' . $carusel_image->imagen1) }}" alt="" />
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
                    @endif
                    @if ($carusel_image->imagen3 != '')
                        <div class="item">
                            <img src="{{ asset('files/' . $carusel_image->imagen3) }}" alt="" />
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
                    @endif
                </div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 3)
            <?php $titles = $widget_builder->pageTitle($my_widget['widget_id'], 3); ?>
            @foreach ($titles as $title)
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 text-left">
                            {!! $title->content !!}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 4)
            <?php $two_columns = $widget_builder->pageTwoColumns($my_widget['widget_id'], 4); ?>
            @foreach ($two_columns as $two_column)
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            {!! $two_column->title !!}
                            {!! $two_column->subtitle !!}
                            {!! $two_column->description !!}
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="{{ asset('files/' . $two_column->image) }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 5)
            <?php $parallax = $widget_builder->pageParallax($my_widget['widget_id'], 5); ?>
            <input type="hidden" id="parallax" value="true">
            @foreach ($parallax as $parallax)
                <div class="parallax-window mt-5" data-parallax="scroll"
                    data-image-src="{{ asset('files/' . $parallax->image) }}"></div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 6)
            <?php $products = $widget_builder->pageProduct($my_widget['widget_id'], 6); ?>

            <div class="container mt-5">
                <div class="row">
                    {{-- <input type="hidden" id="gallery" value="true"> --}}
                    @foreach ($products as $query)
                        <?php $get_elements = $widget_builder->elementsProduct($query->id); ?>
                        @foreach ($get_elements as $element)
                            <div class="col-12 col-md-3 py-4 offset-md-1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="content-product">
                                            <img class="img-product" src="{{ asset('files/' . $element->image) }}"
                                                alt="" srcset="">
                                        </div>
                                        <p class="card-text text-center mt-3 h5 text-body"> {{ $element->title }}
                                        </p>
                                        @if ($element->discount > 0)
                                            <p class="text-center h3"> <del>{{ $element->price }}</del> </p>
                                            <p class="text-center h3">{{ $element->discount }}</p>
                                        @else
                                            <p class="text-center h3"> &nbsp; </p>
                                            <p class="text-center h3">{{ $element->price }}</p>
                                        @endif

                                        <div class="content-description mt-3">
                                            {!! \Str::of($element->description)->limit(50) !!}
                                        </div>
                                        <a onclick="openModalProduct('{{ asset('files') }}', '{{ $element->image }}', '{{ $element->title }}', '{{ $element->price }}', '{{ $element->discount }}', '{{ $element->description }}')"
                                            class="pointer float-right">Ver m??s</a>

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        @endif
        @if ($my_widget['id_rel'] == 7)
            <?php $video = $widget_builder->pageVideo($my_widget['widget_id'], 7); ?>
            {{-- <input type="hidden" id="video" value="true"> --}}
            @foreach ($video as $query)
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12">
                            {!! $query->title !!}
                        </div>
                        <div class="col-12">
                            {!! $query->subtitle !!}
                        </div>
                        <div class="col-12">
                            {!! $query->description !!}
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-5 text-center">
                            <div class="video-responsive">
                                <x-embed url="{{ $query->video }}" />
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 8)
            <?php $gallery = $widget_builder->pageGallery($my_widget['widget_id'], 8); ?>
            {{-- <input type="hidden" id="gallery" value="true"> --}}
            @foreach ($gallery as $query)
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="col-12 d-flex justify-content-center flex-wrap">
                                @if ($query->imagen1 != '')
                                    <div class="col-12 col-md-3 mt-4 offset-md-1">
                                        <img class="img-fluid" src="{{ asset('files/' . $query->imagen1) }}"
                                            alt="" />
                                    </div>
                                @endif
                                @if ($query->imagen2 != '')
                                    <div class="col-12 col-md-3 mt-4 offset-md-1">
                                        <img class="img-fluid" src="{{ asset('files/' . $query->imagen2) }}"
                                            alt="" />
                                    </div>
                                @endif
                                @if ($query->imagen3 != '')
                                    <div class="col-12 col-md-3 mt-4 offset-md-1">
                                        <img class="img-fluid" src="{{ asset('files/' . $query->imagen3) }}"
                                            alt="" />
                                    </div>
                                @endif
                                @if ($query->imagen4 != '')
                                    <div class="col-12 col-md-3 mt-4 offset-md-1">
                                        <img class="img-fluid" src="{{ asset('files/' . $query->imagen4) }}"
                                            alt="" />
                                    </div>
                                @endif
                                @if ($query->imagen5 != '')
                                    <div class="col-12 col-md-3 mt-4 offset-md-1">
                                        <img class="img-fluid" src="{{ asset('files/' . $query->imagen5) }}"
                                            alt="" />
                                    </div>
                                @endif
                                @if ($query->imagen6 != '')
                                    <div class="col-12 col-md-3 mt-4 offset-md-1">
                                        <img class="img-fluid" src="{{ asset('files/' . $query->imagen6) }}"
                                            alt="" />
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 9)
            <?php $contacto = $widget_builder->pageContact($my_widget['widget_id'], 9); ?>
            {{-- <input type="hidden" id="gallery" value="true"> --}}
            @foreach ($contacto as $query)
                <?php $get_elements = $widget_builder->elementsContact($query->id); ?>
                <form method="post" action="" class="py-5" id="frm-contact-landing">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h2>Contacto</h2>
                            </div>
                        </div>
                      
                        <div class="row justify-content-center">
                            @foreach ($get_elements as $element)
                                <?php $required = $element->required == 1 ? 'required' : ''; ?>
                                <div class="col-12 col-md-10">
                                    <div class="form-group">
                                        <label for="InputWidget">{{ $element->name }}</label>
                                      
                                        
                                        @if ($element->name !== 'Nombre' && $element->name !== 'Correo' && $element->name !== 'Mensaje')
                                            <input type="email" class="form-control"
                                            name="data[{{ \Str::slug($element->name) }}]" {{ $required }}
                                            placeholder="{{ $element->placeholder }}">
                                            @else 
                                                @if ($element->name === 'Nombre')
                                                <input type="text" class="form-control"
                                                    name="data[{{ \Str::slug($element->name) }}]" {{ $required }}
                                                    placeholder="{{ $element->placeholder }}">
                                            @endif

                                            @if ($element->name === 'Correo')
                                                <input type="email" class="form-control"
                                                    name="data[{{ \Str::slug($element->name) }}]" {{ $required }}
                                                    placeholder="{{ $element->placeholder }}">
                                            @endif

                                            @if ($element->name === 'Mensaje')
                                                <textarea id="" cols="30" rows="4" name="data[{{ \Str::slug($element->name) }}]"
                                                    placeholder="{{ $element->placeholder }}" class="form-control"></textarea>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="id" value="{{ $query->id }}">

                        <div class="row" style="display: none" id="loading-contacto">
                            <div class="col-12 text-center">
                                <div>
                                    <div class="fa-3x">
                                        <i class="fas fa-circle-notch fa-spin"></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10">
                                <div class="form-group">
                                    <label for="InputWidget"></label>

                                    <button type="submit" class="btn btn-outline-primary float-right">Enviar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            @endforeach
        @endif
    @endforeach

    {{-- footer --}}
    <?php
    $config = $builder->getByPageName($page_actual->name);
    $setting = $setting->get();
    ?>
    @if ($config->show_footer == true)
        <div
            style="background-color:{{ $config->background_footer }} !important; color: {{ $config->color_footer }} !important">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 col-md-4 text-center">
                        <p class="py-0 my-0 h6">{{ $setting->telefono }}</p>
                        <p class="py-0 my-0 h6">{{ $setting->telefono2 }}</p>
                        <p class="py-0 my-0 h6">{{ $setting->correo }}</p>
                        <p class="py-0 my-0 h6">{{ $setting->correo2 }}</p>
                    </div>
                    <div class="col-12 col-md-4 align-self-center text-center">
                        {!! $setting->leyenda_footer !!}
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <ul class="list-inline">
                            @if ($config->show_facebook == true)
                                <li class="list-inline-item">
                                    <a style="color:{{ $page_actual->color_footer }}" href="{{ $setting->fb }}"
                                        target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($config->show_twitter == true)
                                <li class="list-inline-item">
                                    <a style="color:{{ $page_actual->color_footer }}"
                                        href="{{ $setting->twitter }}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($config->show_instagram == true)
                                <li class="list-inline-item">
                                    <a style="color:{{ $page_actual->color_footer }}"
                                        href="{{ $setting->instagram }}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            @endif
                            @if ($config->show_youtube == true)
                                <li class="list-inline-item">
                                    <a style="color:{{ $page_actual->color_footer }}"
                                        href="{{ $setting->youtube }}" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- footer --}}

    {{-- widgets --}}
</div>

<!-- Modal producto -->
<div class="modal fade" id="modal-product" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-product-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-product-body">
                <div class="content-product">
                    <img class="img-product" alt="" id="modal-product-img">
                </div>
                <p class="card-text text-center mt-3 h5" id="modal-product-title"> </p>
                <p class="text-center h3" id="modal-product-price"> </p>
                <p class="text-center h3" id="modal-product-discount"></p>

                <div class="content-description mt-3 text-right" id="modal-product-description">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cerrarModal()">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@if ($page_actual != null && $page_actual->show_btn_whatsapp == 1)
    <div class="btn-whatsapp">
        <a href="https://api.whatsapp.com/send?phone={{ $my_setting != null ? $my_setting->telefono : '' }}&text={{ $page_actual != null ? $page_actual->whatsapp_title : '' }}"
            target="_blank">
            <img src="{{ asset('image/btn_whatsapp.png') }}" alt="">
        </a>
    </div>
@endif
@endsection
