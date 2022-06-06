<div id="modal-widget-header" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" id="frm-encabezado" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- contenido --}}

                    <h5>Sección encabezado</h5>

                    <div class="form-group">
                        <label for="InputWidget">Orden</label>
                        <input type="text" class="form-control" name="data[order]" id="encabezado-order">
                    </div>
                    
                    <div class="form-group">
                        <label for="InputWidget">Imagen</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                   
                    <div class="form-group">
                        <label for="InputWidget">*Título</label>
                        <input type="text" class="form-control" name="data[title]" id="encabezado-title">
                    </div>
                    <div class="form-group">
                        <label for="InputWidget">Teléfono 1</label>
                        <input type="text" class="form-control" name="data[phone]" id="encabezado-phone">
                    </div>
                    <div class="form-group">
                        <label for="InputWidget">Teléfono 2</label>
                        <input type="text" class="form-control" name="data[phone2]" id="encabezado-phone2">
                    </div>

                    <div class="row" style="display: none" id="loading-encabezado">
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
                    <input type="hidden" name="data[widget_id]" id="modal-encabezado-section_id">
                    <input type="hidden" name="header_id" id="modal-encabezado-widget_id">
                    <input type="hidden" name="page_actual" id="modal-encabezado-page_actual">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-header')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
        </form>
    </div>
</div>
</div>