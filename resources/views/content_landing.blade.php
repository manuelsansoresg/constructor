@extends('layouts.app')

@section('title', 'Landing')
    
@section('content')
<div>
    {{-- widgets --}}
    @inject('widget_builder', 'App\Models\WidgetBuilder')
    @inject('builder', 'App\Models\Builder')
    @inject('setting', 'App\Models\Setting')

    @foreach ($my_widgets as $my_widget)
        @if ($my_widget['id_rel'] == 1)
            <?php $headers = $widget_builder->pageHeader($my_widget['widget_id'], 1); ?>
            @foreach ($headers as $header)
                <div class="container">
                    <div class="row">
                        @if ($header->image != '')
                            <div class="col-12 col-md-3 text-center text-md-left">
                                <img src="{{ asset('files/' . $header->image) }}" alt="Profiler"
                                    class="preview_admin">
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
                </div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 1)
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
            <?php $titles = $widget_builder->pageTitle($my_widget['widget_id'], 3) ?>
            @foreach ($titles as $title)
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            {!! $title->content !!}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 4)
            <?php $two_columns = $widget_builder->pageTwoColumns($my_widget['widget_id'], 4) ?>
            @foreach ($two_columns as $two_column)
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            {!! $two_column->title !!}
                            {!! $two_column->subtitle !!}
                            {!! $two_column->description !!}
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="{{ asset('files/'.$two_column->image) }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 5)
            <?php $parallax = $widget_builder->pageParallax($my_widget['widget_id'], 5) ?>
            <input type="hidden" id="parallax" value="true">
            @foreach ($parallax as $parallax)
            <div class="parallax-window mt-5" data-parallax="scroll" data-image-src="{{ asset('files/'.$parallax->image) }}"></div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 7)
            <?php $video = $widget_builder->pageVideo($my_widget['widget_id'], 7) ?>
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
                            <x-embed url="{{ $query->video }}"/>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 8)
            <?php $gallery = $widget_builder->pageGallery($my_widget['widget_id'], 8) ?>
            {{-- <input type="hidden" id="gallery" value="true"> --}}
            @foreach ($gallery as $query)
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-2">
                        @if ($query->imagen1 != '')
                            <img class="img-fluid" src="{{ asset('files/' . $query->imagen1) }}" alt="" />
                        @endif
                    </div>
                    <div class="col-12 col-md-2">
                        @if ($query->imagen2 != '')
                            <img class="img-fluid" src="{{ asset('files/' . $query->imagen2) }}" alt="" />
                        @endif
                    </div>
                    <div class="col-12 col-md-2">
                        @if ($query->imagen3 != '')
                            <img class="img-fluid" src="{{ asset('files/' . $query->imagen3) }}" alt="" />
                        @endif
                    </div>
                    <div class="col-12 col-md-2">
                        @if ($query->imagen4 != '')
                            <img class="img-fluid" src="{{ asset('files/' . $query->imagen4) }}" alt="" />
                        @endif
                    </div>
                    <div class="col-12 col-md-2">
                        @if ($query->imagen5 != '')
                            <img class="img-fluid" src="{{ asset('files/' . $query->imagen5) }}" alt="" />
                        @endif
                    </div>
                    <div class="col-12 col-md-2">
                        @if ($query->imagen6 != '')
                            <img class="img-fluid" src="{{ asset('files/' . $query->imagen6) }}" alt="" />
                        @endif
                    </div>
                    
                </div>
                
            </div>
            @endforeach
        @endif
        @if ($my_widget['id_rel'] == 9)
        <?php $contacto = $widget_builder->pageContact($my_widget['widget_id'], 9) ?>
            {{-- <input type="hidden" id="gallery" value="true"> --}}
            @foreach ($contacto as $query)
            <?php $get_elements = $widget_builder->elementsContact($query->id) ?>
            <form method="post" action="" class="py-5">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>Contacto</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($get_elements as $element)
                        <?php $required = ($element->required == 1)? 'required' : '';?>
                            <div class="col-12 col-md-10">
                                <div class="form-group">
                                    <label for="InputWidget">{{ $element->name }}</label>
                                    <input type="text" class="form-control" name="name" {{ $required }} placeholder="{{ $element->placeholder }}">
                                </div>
                            </div>
                            @endforeach
                            
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
        $config  = $builder->getByPageName($page);
        $setting = $setting->get();
    ?>
    @if ($config->show_footer == true)
    <div style="background-color:{{ $config->background_footer }}; color: {{ $config->color_footer }}">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-4 text-center">
                    <p class="py-0 my-0 h6">{{ $setting->telefono}}</p>
                    <p class="py-0 my-0 h6">{{ $setting->telefono2}}</p>
                    <p class="py-0 my-0 h6">{{ $setting->correo}}</p>
                    <p class="py-0 my-0 h6">{{ $setting->correo2}}</p>
                </div>
                <div class="col-12 col-md-4 align-self-center text-center">
                    {!! $setting->leyenda_footer !!}
                </div>
                <div class="col-12 col-md-4 text-center">
                    <ul class="list-inline">
                        @if ($config->show_facebook == true)
                            <li class="list-inline-item">
                                <a href="{{ $setting->fb }}" target="_blank">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                        @endif
                        @if ($config->show_twitter == true)
                            <li class="list-inline-item">
                                <a href="{{ $setting->twitter }}" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                        @endif
                        @if ($config->show_instagram == true)
                            <li class="list-inline-item">
                                <a href="{{ $setting->instagram }}" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        @endif
                        @if ($config->show_youtube == true)
                            <li class="list-inline-item">
                                <a href="{{ $setting->youtube }}" target="_blank">
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

@endsection