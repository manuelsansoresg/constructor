<div id="modal-widget-texto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" id="frm-texto" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- contenido --}}

                    <h5>Sección Texto</h5>
                    <div class="form-group" wire:ignore>
                        <label for="InputWidget">Texto</label>
                        <textarea name="data[content]" id="texto-content" cols="30" rows="10" class="form-control summernote"></textarea>
                    </div>
                    <div class="row" style="display: none" id="loading-carusel">
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
                    <input type="hidden" name="data[widget_id]" id="modal-texto-section_id">
                    <input type="hidden" name="texto_id" id="modal-texto-widget_id">
                    <input type="hidden" name="page_actual" id="modal-texto-page_actual">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-texto')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
        </form>
    </div>
</div>
</div>