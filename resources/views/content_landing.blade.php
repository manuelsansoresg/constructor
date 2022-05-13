@extends('layouts.app')

@section('title', 'Landing')
    
@section('content')
<div>
    {{-- widgets --}}
    @inject('widget_builder', 'App\Models\WidgetBuilder')

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
                <div class="row">
                    <div class="col-12 col-md-4">
                        @if ($query->imagen1 != '')
                            <img class="img-fluid" src="{{ asset('files/' . $query->imagen1) }}" alt="" />
                        @endif
                    </div>
                    <div class="col-12 col-md-4">
                        @if ($query->imagen2 != '')
                            <img class="img-fluid" src="{{ asset('files/' . $query->imagen2) }}" alt="" />
                        @endif
                    </div>
                    <div class="col-12 col-md-4">
                        @if ($query->imagen3 != '')
                            <img class="img-fluid" src="{{ asset('files/' . $query->imagen3) }}" alt="" />
                        @endif
                    </div>
                    
                </div>
                
            </div>
            @endforeach
        @endif
    @endforeach
    
    
    {{-- widgets --}}
</div>

@endsection