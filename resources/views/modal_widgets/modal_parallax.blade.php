<div id="modal-widget-parallax" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="overflow-y: auto; display: block;">
        <form action="" id="frm-parallax" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-body"  >
                    {{-- contenido --}}

                    <h5>Sección parallax</h5>
                    <div class="form-group">
                        <label for="InputWidget">Imagen</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                   

                    <div class="row" style="display: none" id="loading-parallax">
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
                    <input type="hidden" name="data[widget_id]" id="modal-parallax-section_id">
                    <input type="hidden" name="parallax_id" id="modal-parallax-widget_id">
                    <input type="hidden" name="page_actual" id="modal-parallax-page_actual">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-parallax')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
        </form>
    </div>
</div>
</div>