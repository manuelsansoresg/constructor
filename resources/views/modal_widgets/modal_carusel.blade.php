<div id="modal-widget-carusel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" id="frm-carusel" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- contenido --}}

                    <h5>Sección carusel</h5>
                    <div class="form-group">
                        <label for="InputWidget">Orden</label>
                        <input type="text" class="form-control" name="order" id="carusel-order">
                    </div>

                    <div class="form-group">
                        <label for="InputWidget">Imagen1</label>
                        <input type="file" class="form-control" name="imagen1">
                    </div>
                    <div class="form-group">
                        <label for="InputWidget">Imagen2</label>
                        <input type="file" class="form-control" name="imagen2">
                    </div>
                    <div class="form-group">
                        <label for="InputWidget">Imagen3</label>
                        <input type="file" class="form-control" name="imagen3">
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
                    <input type="hidden" name="widget_id" id="modal-carusel-section_id">
                    <input type="hidden" name="carusel_id" id="modal-carusel-widget_id">
                    <input type="hidden" name="page_actual" id="modal-carusel-page_actual">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-carusel')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
        </form>
    </div>
</div>
</div>