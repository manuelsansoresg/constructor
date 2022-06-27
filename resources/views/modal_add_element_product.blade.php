<div id="modal-widget-element_product" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document" style="overflow-y: auto; display: block;">
        <form action="" id="frm-element_product" enctype="multipart/form-data" wire:ignore>
            <div class="modal-content">
                <div class="modal-body"  >
                    {{-- contenido --}}

                    <h5>Agregar elemento</h5>
                    <div class="form-group">
                        <label for="InputWidget"> Título  </label>
                        <input type="text" name="data[title]" id="product-title" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label for="InputWidget"> Imagen </label>
                        <input type="file" name="imagen">
                    </div>
                    <div class="form-group">
                        <label for="InputWidget"> Precio </label>
                        <input type="text" name="data[price]" id="product-price" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="InputWidget"> Descuento </label>
                        <input type="text" name="data[discount]" id="product-discount" class="form-control" value="">
                    </div>
                    
                    <div class="form-group">
                        <label for="InputWidget"> Descripción </label>
                        <input type="text" class="form-control" id="product-element-description">
                        <input type="hidden" name="data[description]" class="form-control" id="product-description">
                    </div>
                    
                   

                    <div class="row" style="display: none" id="loading-element_product">
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
                    <input type="hidden" name="section_id" id="modal-element_product-section_id">
                    <input type="hidden" name="data[content_product_id]" id="modal-element_product-widget_id">
                    <input type="hidden" name="product_id" id="modal-element_product-id" value="null">
                    <input type="hidden" name="page_actual" id="modal-element_product-page_actual">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModalSection('modal-widget-element_contact')">Cerrar</button>
                    <button type="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
        </form>
    </div>
</div>
</div>