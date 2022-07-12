<div id="modal-widget-element_contact" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="overflow-y: auto; display: block;">
        <form action="" id="frm-element_contact" enctype="multipart/form-data" wire:ignore>
            <div class="modal-content">
                <div class="modal-body"  >
                    {{-- contenido --}}
                    <h5>Agregar elemento</h5>
                    <div class="form-group">
                        <label for="InputWidget"> Nombre  </label>
                        <input type="text" name="data[name]" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="InputWidget"> Leyenda </label>
                        <input type="text" name="data[placeholder]" class="form-control" value="">
                    </div>
                    
                    <div class="form-group">
                        <label for="InputWidget"> Requerido </label>
                        <input type="checkbox" name="data[required]" value="1">
                    </div>

                    <div class="row" style="display: none" id="loading-element_contact">
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
                    <input type="hidden" name="section_id" id="modal-element_contact-section_id">
                    <input type="hidden" name="data[widget_contact_id]" id="modal-element_contact-widget_id">
                    <input type="hidden" name="page_actual" id="modal-element_contact-page_actual">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-element_contact')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
        </form>
    </div>
</div>
</div>