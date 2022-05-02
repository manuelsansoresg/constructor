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
                            <div class="col-12 col-md-3">
                                <img src="{{ asset('files/' . $header->image) }}" alt="Profiler"
                                    class="preview_admin">
                            </div>
                        @endif
                        <div class="col-12 col-md-6 text-center">
                            {{ $header->title }}
                        </div>
                        <div class="col-12 col-md-2">
                            <p>{{ $header->phone }}</p>
                            <p>{{ $header->phone2 }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endforeach
    {{-- widgets --}}
</div>
