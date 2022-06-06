<div id="modal-widget-two-columns" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="overflow-y: auto; display: block;">
        <form action="" id="frm-two-columns" enctype="multipart/form-data" wire:ignore>
            <div class="modal-content">
                <div class="modal-body"  >
                    {{-- contenido --}}

                    <h5>Sección 2 columnas</h5>

                    <div class="form-group">
                        <label for="InputWidget">Orden</label>
                        <input type="text" class="form-control" name="data[order]" id="two-columns-order">
                    </div>

                    <div class="form-group">
                        <label for="InputWidget">Imagen</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="form-group">
                        <label for="InputWidget">*Título</label>
                        <textarea name="data[title]" id="two-columns-title" cols="30" rows="5" class="form-control summernote"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="InputWidget">Subtítulo</label>
                        <textarea name="data[subtitle]" id="two-columns-subtitle" cols="30" rows="5" class="form-control summernote"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="InputWidget">Descripción</label>
                        <textarea name="data[description]" id="two-columns-description" cols="30" rows="10" class="form-control summernote"></textarea>
                    </div>

                    <div class="row" style="display: none" id="loading-two-columns">
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
                    <input type="hidden" name="data[widget_id]" id="modal-two-columns-section_id">
                    <input type="hidden" name="two_columns_id" id="modal-two-columns-widget_id">
                    <input type="hidden" name="page_actual" id="modal-two-columns-page_actual">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-two-columns')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
        </form>
    </div>
</div>
</div>