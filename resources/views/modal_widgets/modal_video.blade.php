<div id="modal-widget-video" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="overflow-y: auto; display: block;">
        <form action="" id="frm-video" enctype="multipart/form-data" wire:ignore>
            <div class="modal-content">
                <div class="modal-body"  >
                    {{-- contenido --}}

                    <h5>Sección Video</h5>
                    
                    <div class="form-group">
                        <label for="InputWidget">Orden</label>
                        <input type="text" class="form-control" name="data[order]" id="video-order">
                    </div>

                    <div class="form-group">
                        <label for="InputWidget">*Título</label>
                        <textarea name="data[title]" id="video-title" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="InputWidget">Subtítulo</label>
                        <textarea name="data[subtitle]" id="video-subtitle" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="InputWidget">Descripción</label>
                        <textarea name="data[description]" id="video-description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="InputWidget">Video(Colocar solo la url de youtube)</label>
                        <textarea name="data[video]" id="video-url" cols="30" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="row" style="display: none" id="loading-video">
                        <div class="col-12 text-center">
                            <div>
                                <div class="fa-3x">
                                    <i class="fas fa-circle-notch fa-spin"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- contenido --}}
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="data[widget_id]" id="modal-video-section_id">
                    <input type="hidden" name="video_id" id="modal-video-widget_id">
                    <input type="hidden" name="page_actual" id="modal-video-page_actual">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-video')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
        </form>
    </div>
</div>
</div>