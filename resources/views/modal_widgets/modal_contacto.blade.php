<div id="modal-widget-contacto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="overflow-y: auto; display: block;">
        <form action="" id="frm-contacto" enctype="multipart/form-data" wire:ignore>
            <div class="modal-content">
                <div class="modal-body"  >
                    {{-- contenido --}}

                    <h5>Sección Contacto</h5>
                  

                    <div class="form-group">
                        <label for="InputWidget">*Nombre contacto</label>
                        <input type="text" class="form-control" name="data[name]" id="contacto-name">
                    </div>
                    <h5 class="text-center">Elementos del formulario</h5>
                    <div id="elementsForm">

                    </div>

                    <div class="row" style="display: none" id="loading-contacto">
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
                    <input type="hidden" name="data[widget_id]" id="modal-contacto-section_id">
                    <input type="hidden" name="contacto_id" id="modal-contacto-widget_id">
                    <input type="hidden" name="page_actual" id="modal-contacto-page_actual">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-contacto')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
        </form>
    </div>
</div>
</div>